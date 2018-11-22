<?php

namespace app\admin\controller;

use think\Controller;

class Admin extends Base
{
    //管理员列表
    public function lists(){

        $admins = model('Admin')->order(['is_super'=>'asc','status'=>'desc'])->paginate(2,false);

        $viewData = [
            'admins' => $admins,
        ];
        $this->assign($viewData);
        return view();
    }

    //管理员添加
    public function add(){

        if(request()->isAjax()){
            $data = [
                'username' =>input('post.username'),
                'password' =>input('post.password'),
                'conpass' => input('post.conpass'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email'),
            ];

            //return $data;
            $result = model('Admin')->add($data);
            if($result == 1){
                $this->success('管理员添加成功','admin/admin/lists');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //管理员状态操做
    public function status(){

        $data = [
            'id' => input('post.id'),
            'status' => input('post.status') ? 0 :1,
        ];

        $adminInfo = model('Admin')->find($data['id']);

        $adminInfo->status = $data['status'];

//        return $adminInfo;
//        die();
        $result = $adminInfo->save();
        if($result){
            $this->success('操作成功','admin/admin/lists');
        }else{
            $this->error($result);

        }
    }

    //编辑
    public function edit(){


        if(request()->isAjax()){

            $data = [
                'id'       => input('post.id'),
                'nickname' => input('post.nickname'),
                'oldpass'  => input('post.oldpass'),
                'newpass'  => input('post.newpass'),
            ];


            $result = model('Admin')->edit($data);
            if($result==1){
                return $this->success('修改成功','admin/admin/lists');
            }else{
                return $this->error($result);
            }
        }

        $adminInfo =  model('Admin')->find(input('id'));
        $viewData =[
            'adminInfo' => $adminInfo,
        ];

        $this->assign($viewData);
        return view();
    }

    //删除
    public function del(){

        $result = \app\common\model\Admin::destroy(input('post.id'));
        if($result){
            $this->success("删除成功",'admin/admin/lists');
        }else{
            $this->error('删除失败');
        }
    }
}
