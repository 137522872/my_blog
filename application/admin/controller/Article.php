<?php

namespace app\admin\controller;

use think\Controller;

class Article extends Base
{
    //文章列表
    public function lists(){

        $articles = model('Article')->with('cate')->order(['is_top'=>'asc','create_time'=>'desc'])
            ->paginate(3);

        $viewData = [
            'articles' =>$articles,
        ];

        $this->assign($viewData);
        return view();
    }

    //文章添加
    public function add(){


        if(request()->isAjax()){

            $data = [
                'title' => input('post.title'),
                'tags'  => input('post.tags'),
                'is_top'=> input('post.is_top',0),
                'cate_id'=> input('post.cateid'),
                'desc'  => input('post.desc'),
                'content' => input('post.content')

            ];
            //return $data;

            $result = model('Article')->add($data);

            if($result == 1){
                $this->success('文章添加成功','admin/article/lists');
            }else{
                $this->error($result);
            }
        }else{

        }

        $cates = model('Cate')->select();
        $viewData = [
            'cates' =>$cates
        ];
        $this->assign($viewData);
        return view();
    }

    //推荐

    public function top(){
        $data = [
            'id' => input('post.id'),
            'is_top'    => input('post.id')? 0:1,
        ];

        $result = model('Article')->top($data);
        if($result ==1){
            $this->success('操作成功','admin/article/lists');
        }else{
            $this->error($result);
        }

    }

    //编辑
    public function edit(){

        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'title' => input('post.title'),
                'tags' => input('post.tags'),
                'is_top' => input('post.is_top'),
                'cate_id'=> input('post.cateid'),
                'desc' => input('post.desc'),
                'content' => input('post.content'),
                'author'   => input('post.author'),
            ];

            $result = model('Article')->edit($data);

            if($result == 1){
                $this->success("文章编辑成功",'admin/article/lists');
            }else{
                $this->error($result);
            }
        }


        $articleInfo = model('Article')->find(input('id'));

        $cates = model('Cate')->select();

        $viewData = [
            'articleInfo' => $articleInfo,
            'cates' => $cates,
        ];
        $this->assign($viewData);
        return view();
    }


    //文章删除
    public function del(){

        $result = \app\common\model\Article::destroy(input('post.id'));
        if($result){
            return $this->success("文章删除成功",'admin/article/lists');
        }else{
            return '文章删除失败';
        }
    }

}
