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
        echo 'run';
    /*   dump(request()->server());
      Loader::action('index/index/arrayList');//直接执行某一个方法*/

    }

    //行为类需要绑定到多个标签
    public function app_init(&$params)
    {
        echo '应用初始化app_init';

    }
    public function action_begin(&$params)
    {
        echo '操作开始执行action_begin';

    }
    public function module_init(&$params)
    {
        echo '模块初始化module_init';

    }

    public function app_end(&$params)
    {
        echo '应用结束app_end';
    }

    public function Auth(&$params)
    {
        echo $params;
    }
}