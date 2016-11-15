<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/15
 * Time: 10:04
 */
namespace app\index\behavior;
class CheckAuth
{
//    public function run(){
//        echo '用户登录判断d的behacior';
//    }
    public function app_init(&$params)
    {
        echo '用户登录判断的behacior';
    }

    public function app_end(&$params)
    {
        echo '用end判断的behacior';
    }
}