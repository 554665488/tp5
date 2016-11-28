<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/28
 * Time: 15:31
 */

namespace app\index\hook;


use think\Request;

/**
 * Class User
 * @package app\index\hook
 * 方法注入
 * 在Request请求对象中添加自己的方法，可以使用Request对象的方法注入功能
 */
class User
{
    protected static $info=[];
    protected $id;
    protected $mobile=[];
    public static function getUserInfo(Request $request, $id)
    {
        return $id;
    }
}