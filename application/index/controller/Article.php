<?php

namespace app\index\controller;

use think\Controller;

class Article extends Base
{
    //文章详情页
    public function info(){

        $articleInfo = model('Article')->find(input('id'));
        $commentInfo = model('Comment')->with('member')->order("create_time",'desc')->where('article_id',$articleInfo['id'])->select();
        $articleInfo->setInc('click');
        $viewData =[
            'articleInfo' => $articleInfo,
            'commentInfo' => $commentInfo,
        ];

        $this->assign($viewData);
        return view();
    }

    //文章评论
    public function comment(){

        $data =[
            'article_id' => input('post.article_id'),
            'member_id'  => input('post.member_id'),
            'content'    => input('post.content'),
        ];


        $result = model('Comment')->comm($data);
        if($result == 1){
            return $this->success('评论成功');
        }else{
            $this->error($result);
        }
    }
}
