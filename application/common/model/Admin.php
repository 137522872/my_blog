<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Admin extends Model
{
    //软删除
    use SoftDelete;

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

}
