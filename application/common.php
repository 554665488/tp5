<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/21
 * Time: 11:02
 */

namespace app;

// 增加一个新的table助手函数
use think\Db;

function table($table, $config=[]){
   Db::connect($config)->setTable($table);
}


// 替换框架内置的db助手函数
function db($name, $config = [])
{
    return Db::connect($config)->name($name);
}