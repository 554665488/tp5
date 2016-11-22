<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/15
 * Time: 10:04
 */
namespace app\index\behavior;
use think\Loader;

class CheckAuth
{
    public function run(&$params)
    {
//       dump(request()->server());
//      Loader::action('index/index/index');//直接执行某一个方法
    }

    //行为类需要绑定到多个标签
    public function app_init(&$params)
    {
        echo '用户登录判断的behaciodddddd';

    }

    public function app_end(&$params)
    {
        echo '用判断的behacior';
    }

    public function Auth(&$params)
    {
        echo $params;
    }
}