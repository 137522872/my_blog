<?php
/**
 * Created by PhpStorm.
 * User: os
 * Date: 2018/11/21
 * Time: 17:34
 */

namespace app\common\validate;


use think\Validate;

class Member extends Validate
{
    protected $rule = [
        'username|用户名'=>'require|unique:member',
        'password|密码' => 'require',
        'nickname|昵称' =>'require',
        'email|邮箱' => 'require|email|unique:member',
        'oldpass|原密码' =>'require',
        'newpass|新密码' =>'require',
    ];

    //添加场景
    protected $scene = [
        'add' =>['username','password','nickname','email',],
        'edit'=>['oldpass','newpass','nickname',],
    ];

    //编辑场景

}