<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 13:07
 */

namespace app\index\controller;


use think\Controller;
use think\Request;

class City
{
    public function index()
    {
        echo __FUNCTION__;
    }

    //空操作是指系统在找不到指定的操作方法的时候，会定位到空操作（_empty）方法来执行，利用这个机制，我们可以实现错误页面和一些URL的优化。
    public function _empty(Request $request)
    {
        return $this->showCity($request->action());
    }

//注意 showCity方法 本身是 protected 方法
    protected function showCity($name)
    {
        dump($name);
    }
}