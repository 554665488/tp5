<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 16:21
 * 分层控制器的调用
 * 除了访问控制器外，我们还可以定义其他分层控制器类，这些分层控制器是不能够被URL访问直接调用到的，只能在访问控制器、模型类的内部，或者视图模板文件中进行调用。
 */

namespace app\index\controller;


use think\Loader;

class Event
{
    public function index()
    {
//        $event=Loader::controller('Blog','event');
        $event = controller('Blog', 'event');//实例化控制器 格式：[模块/]控制器
//        echo $event->update(4);
        // 支持跨模块调用，例如：

        /*$event = controller('Admin/Blog', 'event');
        echo $event->update(5); // 输出 update:5*/
        //除了实例化分层控制器外，还可以直接调用分层控制器类的某个方法，例如
        echo Loader::action('Blog/update', ['id' => 2], 'event');
    }
}