<?php

namespace app\index\model;

use think\Model;

class Blog extends Model
{
    //
    // 是否需要自动写入时间戳 如果设置为字符串 则表示时间字段的类型
    protected $autoWriteTimestamp=true;
    // 新增自动完成列表
    protected $insert             = [
//        'status' => 1,
    ];
    // 数据表字段信息 留空则自动获取
    protected $field = [
        'id'          => 'int',
        'create_time' => 'int',
        'update_time' => 'int',
        'name', 'title', 'content',
    ];
}
