<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;


//Route::rule('hello/[:city]/[:name]',function($city='moren1',$name='moren2'){
//    return $city.'--'.$name;
//});
//动态的定义路由规则
//Route::rule('del/[:id]', 'demo/index/del');
Route::rule(['test', 'test/:name'], function ($name) {
    return $name;
});

Route::rule(':version/user/:id','api/:version.User/read');//版本号/控制器/id值      指向 api（分组）/版本号/控制器/操作方法 //http://www.tp5.net/v1/user/10
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]' => [
        ':id' => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    //约束url请求方式为get 后缀必须为html
    'hl/[:city]/[:name]$' => ['demo/index/hello', ['method' => 'get', 'ext' => 'html']],//定义hello到demo模块下的定额小控制器的hello方法 city和name为可选参数$代表完全匹配
//    'del/:id'=>['demo/index/del',['method'=>'get'],['id'=>'\d+']],//id为必须值

    /*   'hello/[:city]/[:name]'=>function($city,$name){//闭包定义hello到一个方法
          return $city.'--'.$name;
      },*/

    //定义路由的变量规则
    //    'blog-<year>-<month>'=>['demo/blog/archive',['method'=>'get'],['year'=>'\d{4}','mouth'=>'\d{2}']],//不好使

    /*
    'blog/:year/:month'=>['demo/blog/archive',['method'=>'get'],['year'=>'\d{4}','mouth'=>'\d{2}']],
    'blog/:id'=>['demo/blog/get',['method'=>'get'],['id'=>'\d+']],
    'blog/:name'=>['demo/blog/read',['method'=>'get'],['name'=>'\w+']],
    */

    //路由分组可以提高路由的检测效率

    '[blog]' => [
        ':year/:month' => ['demo/blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{2}']],
        ':id' => ['demo/blog/get', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['demo/blog/read', ['method' => 'get'], ['name' => '\w+']],
    ],


    //统一定义url变量的规则
    /* '__pattern__'=>[
          'name'=>'\w+',
          'id'=>'\d+',
          'year'=>'\d{4}',
          'month'=>'\d{2}',
      ],
      'blog/:id$'=>['demo/blog/get',['method'=>'get']],
      'blog/:year/:month'=>['demo/blog/archive',['method'=>'get']],
      'blog/:name'=>['demo/blog/read',['method'=>'get']],*/

];
