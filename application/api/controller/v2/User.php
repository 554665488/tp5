<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 17:59
 */
namespace app\api\controller\v2 ;
use app\api\model\User as UserModel;
class User
{
 public  function read($id){
     $data=UserModel::get($id,'profile');
     if($data){
         return json($data);
     }else{
         trace(['error'=>'404']);
//         return json(['error'=>'404']);
     }
 }

}