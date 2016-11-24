<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 17:03
 * 如果需要让你的控制器支持RESTful的话，可以使用Rest控制器，在定义访问控制器的时候直接继承think\controller\Rest即
 */

namespace app\index\controller;


use think\controller\Rest;
use think\Response;

class RestStudy extends Rest
{
    public function index()
    {
        echo $this->method;
//        echo url('index/Rest_Study');
        switch ($this->method) {
            case 'get':
                if ($this->type == 'html') {

                } elseif ($this->type = 'xml') {

                }
            case 'put': // put请求处理代码
                break;
            case 'post': // post请求处理代码
                break;
        }
        //restFul输出
        $data = [];
        $this->response($data, 'json', 200);
        //使用ResPonse类
        Response::create($data, 'json')->code(200);
        //使用助手函数
        json($data);
    }
    //可以使用$this->type获取当前访问的资源类型，用$this->method获取当前的请求类型

}