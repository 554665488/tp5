<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/25
 * Time: 10:44
 */

namespace app\demo\controller;


use app\index\hook\User;

use think\Request;
use think\Route;

class DemandVar
{
    protected $name;

    /**
     * DemandVar constructor.
     * @param $name
     * 架构方法参数绑定（V5.0.1）
     */
//    public function __construct($name)
//    {
//        echo $this->$name = $name;
//    }

    public function index(Request $request)
    {
//        dump($request->has('id'));
//        dump($request->getCache());

        $request->filter('htmlspecialchars');
        $request->get('name/a', '');
//        dump($request->get('name/a'));//获取变量并转换数据类型
//        dump(input('server.'));
        return view();

    }

    public function type(Request $request)
    {
        /* dump($request->isGet());
         dump($request->ispost());
         dump($request->isMobile());
         dump($request->isPatch());
         dump($request->isCgi());
         dump($request->isHead());
         dump($request->isCli());
         dump($request->isAjax());
         echo 'delete';
         dump($request->isdelete());
         dump($request->isPut());
         dump($request->put());
         dump($request->route());*/
//        dump($request->server());

        dump($request->header());
        echo file_get_contents('php://input');


    }

    /**
     * Request 方法注入
     * 在Request请求对象中添加自己的方法，可以使用Request对象的方法注入功能
     */
    public function requestAdd()
    {
        $request = Request::instance();
        //call_user_func_array('\\think\\Log::record', $args);
        $request::hook('user', '\\app\\index\\hook\\User::getUserInfo');
        /* $user=new User();
         $request::hook('user', array($user,'getUserInfo'));*/
        dump($request->user(1));

    }

    /**
     * @param null $id
     * @param null $uid
     * 可以动态注入当前Request对象的属性，方法
     */
    public function bindObj($id = null, $uid = null)
    {


//        $request = Request::instance()->bind('user', new User);
        $request = Request::instance()->bind('user', new \app\index\hook\User);
        dump(Request::instance());
        dump(Request::instance()->user);
        $objUser = Request::instance()->user;
//        dump($objUser::$info);

    }

    /**
     * 其它对象自动注入
     * 如果没有事先在Request对象中进行对象绑定的话，调用 intoObj 方法的时候user参数会自动实例化，相当于完成了下面的绑定操作：
     * Request::instance()->bind('user', new app\index\hook\User);
     *
     * 对象自动注入不影响原来的参数绑定。
     */
    public static function intoObj(User $user)
    {
//        dump(Request::instance());
        dump($user);
    }
}