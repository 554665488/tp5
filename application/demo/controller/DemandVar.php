<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/25
 * Time: 10:44
 */

namespace app\demo\controller;


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
        dump($request->isGet());
        dump($request->ispost());
        dump($request->isMobile());
        dump($request->isPatch());
        dump($request->isCgi());
        dump($request->isHead());
        dump($request->isCli());
        dump($request->isAjax());
        dump($request->delete());
        dump($request->isPut());
        dump($request->put());
        dump($request);
        echo file_get_contents('php://input');

    }
}