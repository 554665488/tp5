<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 16:06
 */

namespace app\index\controller;


use think\Config;
use think\Request;

/**
 * Class Error
 * @package app\index\controller
 * 空控制器
 */
class Error
{
    public function index(Request $request)
    {
        //根据当前控制器名来判断要执行那个城市的操作
        $cityName = $request->controller();
        return $this->city($cityName);
    }

//注意 city方法 本身是 protected 方法
    protected function city($cityName)
    {
        //和$name这个城市相关的处理
        return '当前城市' . $cityName;
    }

    public function miss()
    {
        /* dump(Config::get()) ;
         dump(config('base.aaa'));*/
        return "没有检测路由";

    }

}