<?php
/**
 * Created by PhpStorm.
 * User: JnToo
 * Date: 2016/11/11
 * Time: 22:57
 */
namespace app\common;
use think\Config;
use think\Hook as thinkHook;
use think\Cache;



class Hook
{
    /**
     * 编译钩子时使用计数器
     * @var int
     */
    static protected $index = 0;

    /**
     * 添加引用计数
     * @var int
     */
    static protected $indexAdd = 1;

    /**
     * 已编译好的钩子列表
     * @var array
     */
    static protected $hookList = array();

    /**
     * application/config.php 文件中加入如下的配置信息
     * @var array
     */
    static protected $default =[
        // 是否开启钩子编译缓存，开启后只需要编译一次，以后都将成为惰性加载，如果安装了新的钩子，需要先调用Hook::clearCache() 清除缓存
        'jntoo_hook_cache'=>false,
        // 钩子是否使用think钩子系统
        'jntoo_hook_call'=>false ,
        /**
         * 某个文件夹下hook加载，配置文件方法实现
         * jntoo_hook_path => [
         *     [
         *          'path'=>'你的路径', // 路径尾部必须加斜杠 "/"
         *          'pattern'=> '规则,类的匹配规则' 例如：'/plugin\\\\module\\\\hook\\\\([0-9a-zA-Z_]+)/'
         *     ],
         *     ....
         * ]
         */
        'jntoo_hook_plugin'=>[],
        /**
         *  多模块目录下自动搜索，配置文件方法实现
         * 'jntoo_hook_plugin' => [
         *     [
         *          'path'=>'你的app模块路径',
         *          'pattern'=> '规则,类的匹配规则' 例如：'/plugin\\\\([0-9a-zA-Z_]+)\\\\hook\\\\([0-9a-zA-Z_]+)/'
         *     ],
         *     ....
         * ]
         */
        'jntoo_hook_plugin'=>[],
    ];

    /**
     * 提供行为调用
     */
    public function run()
    {
        self::init();
    }

    /**
     * 注册钩子
     * @param $type 钩子类型
     * @param $name 钩子名称
     * @param $param \Closure|array
     */
    static public function add($type , $name , $param , $listorder = 1)
    {
        $key = strtolower($type .'_'.$name);
        isset(self::$hookList[$key]) or self::$hookList[$key] = [];
        self::$hookList[$key][$listorder.'_'.self::$indexAdd++] = $param;
        ksort(self::$hookList[$key]);
        // 兼容
        if(Config::get('jntoo_hook_call'))
        {
            thinkHook::add($name , $param);
        }
        return;
    }

    /**
     * 清除编译钩子的缓存
     */
    static public function clearCache()
    {
        // 清楚编译钩子缓存
        if(Config::get('jntoo_hook_cache')){
            cache('jntoo_hook_cache' , null);
        }
    }

    /**
     * 执行钩子
     * @param $type string
     * @param $name string
     * @param array $array
     * @param mixe
     */
    static public function call($type , $name , &$array = array())
    {
        static $_cls = array();

        $ret = '';
        if(Config::get('jntoo_hook_call')){
            return thinkHook::listen($name , $array);
        }else{
            $key = strtolower($type.'_'.$name);
            // 自有的调用方案
            if(isset(self::$hookList[$key]))
            {
                foreach(self::$hookList[$key] as $r){
                    // 闭包处理
                    $result = '';
                    if(is_callable($r)){
                        $result = call_user_func_array($r, $array);
                    }elseif(is_object($r)){
                        // 自己定义对象钩子
                        if(method_exists($r , $name)){
                            $result = call_user_func_array(array($r , $name), $array);
                        }
                    }else{
                        // 自动搜索出来的钩子
                        $class = $r['class'];
                        if(class_exists($class , false)){
                            // 如果不存在
                            if($r['filename'])require_once($r['filename']);
                        }
                        if(class_exists($class , false)){
                            if(!isset($_cls[$class])){
                                $_cls[$class] = new $class();
                            }
                            $func = $r['func'];
                            $result = call_user_func_array(array($_cls[$class] , $func), $array);
                        }
                    }
                    if($result)$ret.=$result;
                }
            }
        }
    }

    /**
     * 初始化钩子
     */
    static protected function init()
    {
        // 取钩子的缓存
        self::$hookList = self::getCache();
        if(!self::$hookList)
        {
            // 保存在当前变量中
            $saveArray = [];

            // 钩子不存在，先搜索app目录下的模块
            $result = self::searchDir(APP_PATH);
            // 先编译此模块
            self::compileHook($result , '/app\\\\([0-9a-zA-Z_]+)\\\\hook\\\\([0-9a-zA-Z_]+)/' , $saveArray);

            // 多模块实现搜索加载
            $jntooHook = Config::get('jntoo_hook_plugin');
            if($jntooHook){
                foreach($jntooHook as $t){
                    $result = self::searchDir($t['path']);
                    self::compileHook($result , $t['pattern'] , $saveArray);
                }
            }

            // 单个路径的模块搜索
            $jntooHook = Config::get('jntoo_hook_path');
            if($jntooHook){
                foreach($jntooHook as $t){
                    $result = [];
                    self::searchHook($t['path'] , $result);
                    self::compileHook($result , $saveArray);
                }
            }
            // 编译完成，现在进行一个权重排序
            foreach($saveArray as $k=>$t){
                ksort($saveArray[$k]);
            }
            self::setCache($saveArray);
            self::$hookList = $saveArray;
        }

        $calltype = Config::get('jntoo_hook_call');
        // 检测他的调用方法，是否需要注册到think中，不建议注册到 think 中，
        // 因为这个系统含有分类的形式，注册进去后将无法使用排序功能
        if($calltype){
            // 注册进think 钩子中
            self::registorThink();
        }
    }

    /**
     * 将钩子注册进thinkHook 钩子中
     */
    static protected function registorThink()
    {
        foreach(self::$hookList as $key=>$list)
        {
            foreach($list as $r){
                thinkHook::add($r['func'] , $r['class']);
            }
        }
    }
    /**
     * 搜索目录下的钩子文件
     * @param $path string
     * @param $saveArray array 保存的文件路径
     * @return null
     */
    static protected function searchHook( $path , &$saveArray)
    {
        $fp = opendir($path);
        if($fp){
            while($file = readdir($fp))
            {
                if(substr($file , -4) == '.php')
                {
                    $saveArray[] = $path.$file;
                }
            }
        }
    }

    /**
     * 编译钩子,编译后直接保存在静态成员变量 self::$hookList
     * @param $filelist array 文件路径
     * @param $namespace string 命名空间规则
     * @param $saveHook array 保存Hook
     * @return null
     */
    static protected function compileHook($filelist , $namespace , &$saveHook)
    {
        // 当前引用计数
        $index = self::$index;
        $indexAdd = self::$indexAdd;
        foreach ($filelist as $file)
        {
            require_once($file);
            // 获取已经加载的类
            $class_list = get_declared_classes();
            // 搜索计数器
            for($len = count($class_list);$index<$len;$index++)
            {
                $classname = $class_list[$index];
                if(preg_match($namespace , $classname))
                {
                    // 这个类满足我们的需求
                    $ec = new \ReflectionClass($classname);
                    // 钩子的类型
                    $type = basename($classname);
                    foreach($ec->getMethods() as $r){
                        if($r->name[0] != '_' && $r->class == $classname){
                            // 暂时还不知道怎么实现排序 方法名后面有
                            $name = $r->name;
                            $listorder = 1;
                            if(strpos($name , '_') !== false){
                                // 存在排序
                                $temp = explode('_',$name , 2);
                                $name = $temp[0];
                                $listorder = is_numeric($temp[1]) ? intval($temp[1]) : 1;
                            }
                            $typename = strtolower($type.'_'.$name);
                            !isset($saveHook[$typename]) AND $saveHook[$typename] = [];

                            $saveHook[$typename][$listorder.'_'.$indexAdd++] = [
                                'filename'=>$file, // 保存文件路径的好处是方便快速加载，无需在进行路径的查找
                                'class'=>$classname, // 保存类的名称
                                'func'=>$r->name,   // 保存方法名
                                'listorder'=>$listorder // 排序，编译完成后，进行一个权重的排序
                            ];
                        }
                    }
                }
            }
        }
        self::$index = $index;
        self::$indexAdd = $indexAdd;
    }

    /**
     * @param $path 搜索模块路径
     * @return array
     */
    static protected function searchDir( $path )
    {
        // 目录自动补全
        $char = substr($path,-1);
        if( $char != '/' || $char != '\\' ){
            $path .= '/';
        }
        $path .= '*';
        $dirs = glob($path, GLOB_ONLYDIR );
        $result = array();
        foreach($dirs as $dir){
            if(is_dir($dir .'/hook'))
            {
                self::searchHook($dir .'/hook/' , $result);
            }
        }
        return $result;
    }
    /**
     * 获取编译好的钩子
     * @return bool|array
     */
    static protected function getCache()
    {
        if(Config::get('jntoo_hook_cache')){
            // 获取缓存
            return cache('jntoo_hook_cache');
        }
        return false;
    }

    /**
     * 保存编译的缓存
     * @param $value array
     * @return bool
     */
    static protected function setCache( $value )
    {
        // 设置为永久缓存
        if(Config::get('jntoo_hook_cache')){
            cache('jntoo_hook_cache' , $value , null);
        }
        return true;
    }
}