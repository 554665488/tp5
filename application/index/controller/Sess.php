<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/23
 * Time: 14:31
 */

namespace app\index\controller;


use think\Controller;
use think\Request;
use think\Session;

class Sess extends  Controller
{
    //Session 类操作session
   public function index(){
       //赋值（当前作用域）
//       Session::set('user_name','php');
////       echo Session::get('name');//php
//       // 判断（当前作用域）是否赋值
////        echo Session::has('name');//存在  返回  1
//
//       //赋值（think作用域）
//       Session::set('name','phpt','think');
////       echo Session::get('name');//php
//       // 判断think作用域下面是否赋值
//       Session::has('name','think');//存在  返回  1
//
//       //取值（当前作用域）
//       Session::get('name');//php
//       //取值（think作用域）
//        Session::get('name','think');//phpt    think作用域下的那么值
//       //指定其他的作用域（后缀）
////       echo Session::prefix('think');
//       //删除（当前作用域）
////       Session::delete('name');
//       //删除think 作用域下的值
////       Session::delete('name','think');
//       Session::get('name','think');//php
//       // 清除session（当前作用域）
////        Session::clear();
//       // 清除think作用域
////       Session::clear('think');
//       //赋值
//       Session::set('user.name','yfl');//二维的session数组
//       Session::has('user.name');
//       Session::get('user.name');

//       halt(Session::get('name'));
       return $this->fetch();
   }
   //通过Request 请求对象 session()  方法获取session值  通过Request对象读取Session数据支持默认值及过滤方法，因此也更加安全，并且支持多维数组的读取。
    public function get(Request $request){

        Session::set('name','php');
        $request->session('name');
//        // 读取二维数组
//        echo $request->session('user.name');
        return $this->fetch();
    }
    //助手函数操作session
    public function handel(){
        // 赋值（当前作用域）
        session('name','php');
        // 赋值think作用域
        session('name','phpt','think');
        //判断session值是否存在
        session('?name');
        //取值（当前作用域）
        session('name');
        //取值（think作用域）
        session('name','','think');
        //删除（当前作用域）
        session('name',null);
        // 清除session（当前作用域）
        session(null);
        // 清除think作用域
        session(null, 'think');

    }
    public function save($name=''){
       Session::set('user_name',$name);
        $this->success($name);
    }
}