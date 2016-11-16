<?php

namespace app\api\model;

use think\Model;

class Blog extends Model
{
    //自动写入时间戳
    protected $autoWriteTimestamp = true;
    //写入库时自动写入的字段
    protected $insert = [
        'status' => 1,
    ];
    //数据库字段信息
    protected $field = [
        'id' => 'int',
        'create_time' => 'int',
        'update_time' => 'int',
        'name', 'title', 'content',
    ];
}
