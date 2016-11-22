<?php
namespace app\demo\behavior;
use app\index\model\User;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 12:53
 */
class ReadInfo
{
    public function run()
    {
       $id=request()->route('id');
        request()->user= User::get($id);
        request()->user= User::get($id);
//        dump(request());

    }
}