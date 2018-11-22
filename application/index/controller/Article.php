<?php

namespace app\index\controller;

use think\Controller;

class Article extends Base
{
    //文章详情页
    public function info(){

        $articleInfo = model('Article')->find(input('id'));
        $commentInfo = model('Comment')->with('member')->where('article_id',$articleInfo['id'])->select();
        $articleInfo->setInc('click');
        $viewData =[
            'articleInfo' => $articleInfo,
            'commentInfo' => $commentInfo,
        ];

        $this->assign($viewData);
        return view();
    }
}
