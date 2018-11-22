<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Admin extends Model
{
    //软删除
    use SoftDelete;
    protected $deletTime = 'delete_time';

    //只读字段
    protected $readonly = ['email'];

    //登录校验
    public function login($data){

        $validate = new \app\common\validate\Admin();

        if(!$validate->scene('login')->check($data)){
            return $validate->getError();
        }

        $result = $this->where($data)->find();
        if($result){
            //判断用户是否可用
            if($result['status'] != 1){
                return '此账户被禁用';
            }
            //1表示有这个用户 也就是用户名密码正确

            $sessionData = [
               'id' => $result['id'],
               'nickname' => $result['nickname'],
               'is_super' => $result['is_super']
            ];

            session('admin',$sessionData);


            return 1;
        }else{
            return '用户名密码错误';
        }
    }

    //注册
    public function register($data){

        $validata = new \app\common\validate\Admin();

        if(!$validata->scene('register')->check($data)){

            return $validata->getError();
        }

        if(Admin::get($data['username'])){
            return '用户名已存在';
        }

//        $result = $this->allowFiled(true)->save($data);
        unset($data['conpass']);

        $result = Admin::create($data);
        if($result) {

            sendMail($data['email'],'注册管理员账户成功','注册管理员账户成功');
            return 1;
        }else {
            return '注册失败';
        }
    }

    //重置密码
    public function reset($data){

        $validata = new \app\common\validate\Admin();

        if(!$validata->scene('reset')->check($data)){
            return $validata->getError();
        }

        if($data['code'] !=session('code')){
            return '验证码不正确';
        }
        $adminInfo = $this->where('email',$data['email'])->find();
        $password = mt_rand(10000,999999);
        $adminInfo->password = $password;
        $result = $adminInfo->save();
        if($result){
            sendMail($data['email'],'密码重置成功','新密码: '.$adminInfo['password']);
            return 1;
        }else{
            return '重置密码失败';
        }


    }

    //添加管理员
    public function add($data){

        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }


        unset($data['conpass']);
        $data['status'] =0;
        $data['is_super']=0;
        $result = $this->save($data);//Admin::create($data);

        if($result){
            return 1;
        }else{
            return '添加管理员失败1';
        }
    }

    //编辑
    public function edit($data){

        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
        $adminInfo = $this->find($data['id']);
        if($data['oldpass'] != $adminInfo['password']){
            return '原密码不正确';
        }

        $adminInfo->password = $data['newpass'];
        $adminInfo->nickname = $data['nickname'];

        $result = $adminInfo->save();
        if($result){
            return 1;
        }else{
            return '管理员修改失败';
        }

    }

}
