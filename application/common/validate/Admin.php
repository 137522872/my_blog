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
        'username|管理员账户'  => 'require',
        'password|密码'       => 'require',
        'conpass|确认密码'     => 'require|confirm:password',
        'nickname|昵称'       => 'require',
        'email|邮箱'          => 'require|email'
    ];

    protected $scene =[
        'login' => ['username','password'],
        'register' => ['username'=>'require|unique:admin','password','conpass','nickname','email']
//        'register' => [['username'=>'require:unique:admin'],'checkUsername','password','conpass','nickname','email'],
    ];



    //登录验证场景
//    public function sceneLogin(){
//        return $this->only(['username','password']);
//    }

    //注册场景验证
//    public function sceneRegister(){
//        return $this->only(['username','password','conpass','nickname','email']);
//    }

}