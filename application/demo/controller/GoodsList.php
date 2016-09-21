<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/9/20
 * Time: 22:23
 */

namespace app\demo\controller;

use think\Controller;
use think\Db;
//使用驼峰法命名控制器名字的时候访问该控制格式为goods_list
class GoodsList extends controller
{
    public function index()
    {
        $data=Db::name('auth_rule')->find();
        dump($data);
        $this->assign('data',$data);
        return $this->fetch();

    }
    public function demoStusy(){

    }
}
