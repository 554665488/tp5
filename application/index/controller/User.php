<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 15:01
 */

namespace app\index\controller;


use app\index\model\Class2 as classModel;
use think\Config;
use think\Controller;
use think\Log;

class User extends Controller
{
   public function index($page='1'){
     /*  $list=classModel::get($page);
       return view('',['list'=>$list],['__PUBLUIC__'=>'static']);
       exit;*/
       $list=classModel::all();//获取所有数据
       dump(Config::get('__PUBLIC__'));
       $list=classModel::paginate(3);
//       dump($list);
       $this->assign('list',$list);
       $this->assign('count',count($list));
       $this->assign('title','动态标题');
//      $this->view->engine->layout('layout','[__REPLACE__]');
       $this->view->replace(['__PUBLIC__'=>'/static']);
//       $this->display();
       trace([1,2,3]);
       return $this->fetch();
   }
   public function errorInfo(){
//       echo $_GET['id'];
       Log::error('错误信息');
   }
}