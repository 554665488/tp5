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
        //build方法的第一个参数使用路由定义中的【完整路由地址】。
        echo Url::build('blog/get',['id'=>$id]);//生成URL地址 //demo/blog/get/id/1.html
        echo "</br>";
        echo url('blog/get',['id'=>$id]);  //demo/blog/get/id/1.html
        echo "</br>";
        //如果你的URL地址全部采用路由方式定义，可以直接使用【路由规则】来定义URL生成
        echo url("blog/$id");//demo/blog/1.html
        //return '查看id为'.$id;
    }
    public function read($name){
        return '当前的名字'.$name;
    }
    public function archive($year,$month){
         return '查看日期'.$year.'年'.$month.'月';
    }
}
