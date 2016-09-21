<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/9/20
 * Time: 23:54
 */
namespace app\demo\controller;

use think\Controller;
use think\Url;

class Blog extends controller{
    public  function get($id){
//        echo Url::build('blog/get',['id'=>$id]);//生成URL地址
//        echo url('blog/get',['id'=>$id]);
        echo url("blog/$id");
        return '查看id为'.$id;
    }
    public function read($name){
        return '当前的名字'.$name;
    }
    public function archive($year,$month){
         return '查看日期'.$year.'年'.$month.'月';
    }
}
