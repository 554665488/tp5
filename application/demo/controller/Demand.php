<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/25
 * Time: 9:27
 * 请求实例
 */

namespace app\demo\controller;


use think\Request;

class Demand
{
    public function index(Request $request)
    {
        //当前的域名
        echo $request->domain();
        echo '</br>';
        //当前的的入口文件/index.php
        echo $request->baseFile();
        echo '</br>';
        // 获取当前URL地址 不含域名  /demo/demand/index
        echo $request->url();
        // 获取包含域名的完整URL地址  http://www.tp5.net/demo/demand/index
        echo '</br>';
        echo $request->url(true);
        echo '</br>';
        // 获取当前URL地址 不含QUERY_STRING   /demo/demand/index
        echo $request->baseUrl();
        echo '</br>';
        // 获取URL访问的ROOT地址  空
        echo 'root:' . $request->root() . '<br/>';
        //获取URL的地址中的PATH_INFO信息   demo/demand/index.html
        echo '</br>';
        echo $request->pathinfo();
        // 获取URL地址中的PATH_INFO信息 不含后缀  demo/demand/index
        echo '</br>';
        echo $request->path();
        echo $request->ext();
    }

    /**
     * 设置/获取 模块/控制器/操作名称
     */
    public function m()
    {
        //设置模块名称值需要像module方法中传入名称即可，同样使用于设置控制器名称和操作名称
        $request = Request::instance();
//        $request->module('modufy_module');
        echo $request->module();
        echo '</br>';
        echo $request->controller();
        echo '</br>';
        echo $request->action();

    }

    /**
     * 获取请求参数
     */
    public function getReqType(Request $request)
    {
        echo '请求方法：' . $request->method() . '<br/>';
        echo '资源类型：' . $request->type() . '<br/>';
        echo '访问地址：' . $request->ip() . '<br/>';
        //var_export可以通过将函数的第二个参数设置为 TRUE，从而返回变量的表示。
        echo '是否是AJAX：' . var_export($request->isAjax(), true) . '<br/>';
    }

    /**
     * 获取路由和调度信息
     */
    public function getRouteInfo()
    {
        $request = Request::instance();
        echo '路由信息：';
        dump($request->route());
        echo '调度信息：';
        dump($request->dispatch());
    }
}