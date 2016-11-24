<?php
namespace app\index\widget;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 16:38
 * 利用分层控制器的机制，我们可以用来实现Widget（其实就是在模板中调用分层控制器），例如：
   定义index\widget\Blog控制器类如下：装饰控件
 */
class Decorate
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