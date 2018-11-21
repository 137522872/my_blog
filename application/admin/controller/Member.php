<?php

namespace app\admin\controller;

use PHPMailer\PHPMailer\PHPMailer;
use think\Controller;

class Member extends Controller
{
    //会员列表
    public function lists(){

        $memberInfo = model('Member')->order('create_time','desc')->paginate(4);

        $viewData = [
            'memberInfo' =>$memberInfo,
        ];
        $this->assign($viewData);
        return view();
    }

    //会员添加
    public function add(){

        if(request()->isAjax()){
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'nickname' => input('post.nickname'),
                'email'    => input('post.email'),
            ];


            $result = model('Member')->add($data);
            if($result ==1){
                $this->success("会员添加成功",'admin/member/lists');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //会员编辑
    public function edit(){

        if(request()->isAjax()){
            $data =[
                'id' => input('post.id'),
                'oldpass' => input('post.oldpass'),
                'newpass' => input('post.newpass'),
                'nickname'=> input('post.nickname'),
                'email' => input('post.email')
            ];


            $result = model('Member')->edit($data);
            if($result == 1){
                $this->success('会员修改成功','admin/member/lists');
            }else{
                $this->error($result);
            }
        }


        $memberInfo = model('Member')->find(input('id'));
        $viewData = [
            'memberInfo' =>$memberInfo,
        ];

        $this->assign($viewData);
        return view();
    }

    //会员删除
    public function del(){

        $memberInfo = model('Member')->find(input('post.id'));
        $result = \app\common\model\Member::destroy($memberInfo->id);
        if($result){
            return $this->success('删除成功','admin/member/lists');
        }else{
            return $this->error('删除失败');
        }
    }


}
