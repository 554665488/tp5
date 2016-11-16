<?php

namespace app\index\model;

use think\Model;

class Book extends Model
{
    // 定义类型转换
    protected $type = [
        'publish_time' => 'timestamp:Y-m-d',
    ];

    // 开启自动写入时间戳
    protected $autoWriteTimestamp = true;

    // 定义自动完成的属性
    protected $insert = ['status' => 1];
}
