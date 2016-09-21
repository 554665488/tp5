<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/21
 * Time: 17:41
 */

namespace app\index\controller;


use app\common;
use think\Db;
use think\Request;

class Data extends common
{
    //添加数据
   public function index(){
       $result=Db::execute("insert into tp_user (user_id,name) VALUES  (5,'殷凡良')");
       dump($result);//返回影响的行数
   }
   //修改数据
   public function modify(Request $request){
         $id=$request->param('id');
         $request=Db::execute("update tp_user set user_id=10,name='还好' WHERE id=$id");
        dump($request);//返回影响的行数
   }
   //查询数据
    //query方法返回的结果是一个数据集（数组），如果没有查询到数据则返回空数组
   public function read(){
       $request=Db::query("select * from tp_user");
       dump($request);
   }
   //删除数据
    public function del($id=''){
        $request=Db::execute("delete from tp_user where id=$id");
        dump($request);//返回影响的行数
    }
    //显示数据库列表
    public function  listData(){
        $res=Db::query("show tables from tp5");
        dump($res);
    }
    //query方法用于查询，默认情况下返回的是数据集（二维数组），execute方法的返回值是影响的行数。
}