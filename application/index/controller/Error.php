<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/22
 * Time: 16:06
 */

namespace app\index\controller;


use think\Config;

class Error
{
    public function miss()
    {
       /* dump(Config::get()) ;
        dump(config('base.aaa'));*/
      return '没有检测路由';

    }
}