<?php
namespace app\index\controller\layer;
use think\Controller;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 17:40
 */
class Layer extends Controller
{
    public function index()
    {
        echo 'layer';
        echo url('index/layer.layer/index');
    }
}