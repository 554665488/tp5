<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/23
 * Time: 16:35
 */

namespace app\index\controller;


use think\Controller;
use think\Request;

class Upload extends Controller
{

  public function index(){
      return $this->fetch();
  }

  public function up(Request $request){
      // 移动到框架应用根目录/public/uploads/ 目录下

      $file=$request->file('file');
      $result=$this->validate(['file'=>$file],['file'=>'require|image|fileExt:jpg'],['file.require'=>'请选择文件','file.image'=>'非法图片','file.fileExt'=>'后缀不正确']);
      if(empty($file)){
          $this->error($result);
      }
      // 移动到框架应用根目录/public/uploads/ 目录下
//      $info=$file->validate(['ext'=>'jpg'])->move(ROOT_PATH . 'public' . DS . 'uploads');
      $info=$file->move(ROOT_PATH . 'public' . DS . 'uploads');
      if($info){
          $this->success('上传成功'.$info->getRealPath());
      }else{
          $this->error($file->getError());
      }
  }
}