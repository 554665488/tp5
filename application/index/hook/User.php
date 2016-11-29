<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/28
 * Time: 15:31
 */

namespace app\index\hook;


use think\Model;
use think\Request;

/**
 * Class User
 * @package app\index\hook
 * 方法注入
 * 在Request请求对象中添加自己的方法，可以使用Request对象的方法注入功能
 */
class User extends Model
{
    protected static $info = [];
    protected $id;
    protected $mobile = [];

    public static function getUserInfo(Request $request, $id)
    {
        return $id;
    }

    /**
     * @param Request $request
     * @return static
     * invoke方法自动调用（v5.0.2）
     * 5.0.2版本开始，如果依赖注入的类有定义一个可调用的静态invoke方法，则会自动调用invoke方法完成依赖注入的自动实例化。

    invoke方法的参数是当前请求对象实例，例如：
     */
    public static function invoke(Request $request)
    {

        $id = $request->param('id');
        return User::get($id);
    }
}