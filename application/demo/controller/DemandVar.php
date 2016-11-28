<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/25
 * Time: 10:44
 */

namespace app\demo\controller;


use app\index\hook\User;
use think\Loader;
use think\Request;

class DemandVar
{
    public function index(Request $request)
    {
//        dump($request->has('id'));
//        dump($request->filter('htmlspecialchars'));
        dump($request->get('name/a'));
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
        /* dump(Loader::import('ase.AesCrypt',EXTEND_PATH));
         Loader::import('ase.AesCrypt',EXTEND_PATH);
         $ase=new \AesCrypt();
         dump($ase->encrypt('18246017461'));
         dump($ase->decrypt('7rsHSEHKZ81riyU95mUEAw'));

         echo EXTEND_PATH;//D:\phpStudy\WWW\tp5\extend\
         Loader::addClassMap('ase\AesCrypt',EXTEND_PATH.'ase\AesCrypt.php');
         dump(Loader::autoload('ase\AesCrypt'));
         $ase=new \AesCrypt();*/

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
        dump($request->user(1));

    }

    public static function bind($id=null,$uid=null)
    {

        dump(Request::instance());
        $user=new User();
        $request=Request::instance()->bind('user',$user);
        dump(Request::instance()->user);
        $objUser=Request::instance()->user;
//        dump($objUser::$info);
    }
}