<?php
namespace app\index\widget;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 16:16
 * 定义控制器 的事件
 * 除了访问控制器外，我们还可以定义其他分层控制器类，这些分层控制器是不能够被URL访问直接调用到的，只能在访问控制器、模型类的内部，或者视图模板文件中进行调用。
 */
class Blog
{
    public function header()
    {
        return 'header';
    }

    public function left()
    {
        return 'left';
    }

    public function menu($name)
    {
        return 'menu:'.$name;
    }
}