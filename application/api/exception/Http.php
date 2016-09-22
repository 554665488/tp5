<?php
// 由API后台来处理异常，并且直接接管系统的所有异常信息输出json错误信息 自定义一个异常处理类
namespace  app\api\exception;
use think\exception\Handle;
use think\exception\HttpException;
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/9/22
 * Time: 21:41
 */
class Http extends  Handle
{
 public function render(\Exception $e){
     if($e instanceof HttpException){
         $statusCode=$e->getStatusCode();
     }
     if(!isset($statusCode)){
         $statusCode=500;
     }
     $result=[
         'code'=>$statusCode,
         'msg'=>$e->getMessage(),
         'time'=>$_SERVER['REQUEST_TIME'],
     ];
     return json($result);
 }
}