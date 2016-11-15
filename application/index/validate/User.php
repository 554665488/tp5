<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/15
 * Time: 17:05
 */
namespace app\index\validate;

use think\Validate;

class User extends Validate{
//    protected $rule=[
//        'nickname' => ['require', 'min'=>5, 'token'],
//        'email'    => ['require', 'email'],
//        'birthday' => ['dateFormat' => 'Y|m|d'],
//    ];
    // 验证规则
    protected $rule = [
        ['nickname', 'require|min:5', '昵称必须|昵称不能短于5个字符'],
        ['email', 'checkMail:thinkphp.cn', '邮箱格式错误'],
        ['birthday', 'dateFormat:Y-m-d', '生日格式错误'],
    ];
    protected function checkMail($value, $rule)
    {
        $result = preg_match('/^\w+([-+.]\w+)*@' . $rule . '$/', $value);
        if (!$result) {
            return '邮箱只能是' . $rule . '域名';
        } else {
            return true;
        }
    }

}