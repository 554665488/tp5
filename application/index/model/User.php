<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
    //设置完整的数据表名称
    protected $table='tp_user';
    //定义关联模型方法
    public function books()
    {
        return $this->hasMany('Book');
    }
}
