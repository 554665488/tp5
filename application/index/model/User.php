<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
    //设置完整的数据表名称
    protected $table='tp_user';
    //自动写入时间戳
    protected $autoWriteTimestamp=true;
    //定义自动完成的属性
    protected $insert=['status'=>1];
    // 定义一对多关联
    public function books()
    {
        return $this->hasMany('Book');
    }
    // 定义一对一关联
    public function profile(){
        return $this->hasOne('Profile');//hasOne('关联模型名','关联外键','主键','别名定义','join类型')返回的是realtion对象
    }
    // 定义多对多关联
    public function roles()
    {
        // 用户 BELONGS_TO_MANY 角色
        return $this->belongsToMany('Role', 'tp_access');//belongsToMany('关联模型名','中间表名称','关联外键','关联模型主键','别名定义')
    }
}
