<?php

namespace app\index\model;

use think\Model;

class Profile extends Model
{
    //定义数据自动转换类型
    protected $type=[
        'birthday'=>'timestamp:Y-m-d'
    ];
}
