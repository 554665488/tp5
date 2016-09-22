<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 18:06
 */

namespace app\api\model;


use think\Model;

class Profile extends Model
{
    protected $type       = [
        'birthday' => 'timestamp:Y-m-d',
    ];
}