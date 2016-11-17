<?php
namespace app\index\controller;

use app\demo\model\User;
use app\index\model\Class2 as classModel;
use org\util\ArrayList;
use think\Session;
use app\common\Hook;
use think\Hook as B;
use think\helper\Time;
class Index
{
    public function index()
    {
//        $allList=classModel::all();
//        dump($allList);
//        Hook::call('Category' , 'index');
//        B::listen('app_init');
//        B::listen('app_end');



    }
    //array 扩展的使用
    public function arrayList(){
        $list=['thinkphp', 'thinkphp', 'topthink', 'topthink','topthink'];
        $arrObj=new ArrayList($list);
//        $arrObj->add('addelement');
//        $arrObj->unique();
//        halt($arrObj->toArray());

//        dump($arrObj->toArray());
        dump($arrObj->unshift('sss'));
        dump($arrObj->toArray());
        dump($arrObj->rsort());
        trace($arrObj);
    }
    public function session(){
        Session::set('name','php');
        halt(Session::get('name'));
    }

}
