<?php
namespace app\demo\service;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 14:30
 */
class Study
{
    public function go()
    {
        echo __FUNCTION__;
    }

    public static function up()
    {
        echo __NAMESPACE__;
    }
}