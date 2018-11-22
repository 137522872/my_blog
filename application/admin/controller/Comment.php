<?php

namespace app\admin\controller;

use PHPMailer\PHPMailer\PHPMailer;
use think\Controller;

class Comment extends Base
{
    //评论列表
    public function lists(){

        $comments = model('Comment')->with('article,member')->order('create_time','desc')->paginate(2);

        $viewData =[
            'comments' =>$comments,
        ];

        $this->assign($viewData);
       return view();
    }

    //删除评论
    public function del(){

        $commentInfo = model('Comment')->find(input('post.id'));
        $result = $commentInfo->delete();
        if($result){
            return $this->success("删除成功",'admin/comment/lists');
        }else{
           return $this->error('删除失败');
        }
    }
}
