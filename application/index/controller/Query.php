<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 12:42
 */

namespace app\index\controller;


use think\Controller;
use think\Db;

class Query extends  Controller
{
     public $res;

     public function index(){
         //查询表达式
         $classModel=Db::name('class');
         $res=$classModel->where('id','EQ','1')->find();//where ('字段','表达式','值')
         dump($res);
     }
}