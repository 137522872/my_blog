<?php
/**
 * Created by PhpStorm.
 * User: os
 * Date: 2018/11/20
 * Time: 14:00
 */

namespace app\common\validate;


use think\Validate;

class Admin extends Validate
{

    protected $rule = [
        'username|管理员账户' => 'require',
        'password|密码' => 'require',
        'conpass|确认密码' => 'require|confirm:password',
        'nickname|昵称' => 'require',
        'email|邮箱' => 'require|email',
        'code|验证码' => 'require',
        'oldpass|原密码' => 'require',
        'newpass|新密码' => 'require',
    ];

    protected $scene =[
        'login' => ['username','password'],
        'register' => ['username'=>'require|unique:admin','password','conpass','nickname','email'],
        'reset' => ['code'],
        'add'   => ['username'=>'require|unique:admin','password','conpass','nickname','email'],
        'edit'  => ['nickname','oldpass','newpass'],
    ];
}