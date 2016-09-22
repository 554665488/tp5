<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 17:43
 */
namespace app\api\controller\v1;
use app\api\model\User as UserModel;
class User
{
   public function  read($id){
       $userInfo=UserModel::get($id);
       if($userInfo){
           return json($userInfo);
       }else{
           return json(['error'=>'用户不存在',404]);
       }
   }
}