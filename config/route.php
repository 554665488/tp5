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
//如果希望在没有匹配到所有的路由规则后执行一条设定的路由，可以使用MISS路由功能
//Route::miss('public/miss');
//Route::domain('d','demo');
//模型绑定（V5.0.1）
/*Route::rule('user/:nickname/:id','index/index/index','GET',[
    'ext'                   =>  'html',
    'bind_model'    =>  [
        'user'  =>  function($param){
            $model = new \app\index\model\User;
            return $model->where($param)->find();
        }
    ],
]);*/
Route::rule('before','index/Bef/index');
Route::rule('home','index/index/index');
Route::resource('news','demo/News');
//路由别名可以指向任意一个有效的路由地址，例如下面指向一个类
//Route::alias('yfl','\app\index\controller\User\index');
Route::resource('news','demo/News',['only'=>['index','edit']]);//限制操作方法
Route::get('update/:id','demo/News/update');
//Route::any('new/:id', 'demo/News/read?uid=100', ['method' => 'get', 'after_behavior' => 'app\demo\behavior\ReadInfo']);//路由匹配成功后，执行的行为
//Route::any('new/index', '@demo/News/index', ['method' => 'get', 'domain' => 'www.tp5.net', 'before_behavior' => 'app\index\behavior\CheckAuth']);//路由匹配前执行的行为
//RESTFul模式配置路由
Route::resource('blogs', 'index/blog');
Route::resource('blogapi', 'api/blog');
//Route::resource('captcha','index/captcha');
//支持路由到动态的模块、控制器或者操作
Route::rule(':version/user/:id', 'api/:version.User/read');//版本号/控制器/id值      指向 api（分组）/版本号/控制器/操作方法 //http://www.tp5.net/v1/user/10
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]' => [
        ':id' => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    //约束url请求方式为get 后缀必须为html  $表示完全匹配
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

    //直接路由到某个空间下的某个类的方法

    'service/study' => '\app\demo\service\Study@go',
    'service/study_up' => '\app\demo\service\Study::up',

    //路由到重定向地址
    'bai/'=>'http://www.baidu.com/',

    //路由分组可以提高路由的检测效率

    '[blog]' => [
        ':year/:month' => ['demo/blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{2}']],
        ':id' => ['demo/blog/get', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['demo/blog/read', ['method' => 'get'], ['name' => '\w+']],
    ],

    //获得路由调度信息test
    'getRouteInfo/:id'=>['demo/Demand/getRouteInfo','[]',['id'=>'\d{2}']],
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


    // 全局变量规则定义 关联模型的路由的定义  //user控制器路由定义
    '__pattern__' => [
        'id' => '\d+',
    ],
    'user/index' => 'index/user/index',
    'user/create' => 'index/user/create',
    'user/add' => 'index/user/add',
    'user/add_list' => 'index/user/addList',
    'user/update/:id' => 'index/user/update',
    'user/delete/:id' => 'index/user/delete',
    'user/:id' => 'index/user/read',


];
