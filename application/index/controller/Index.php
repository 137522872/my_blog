<?php
namespace app\index\controller;


use think\Controller;

class Index extends Base
{

    //首页
    public function index(){

        $where = [];
        $catename = null;
        if(input("?id")){
            $where =[
                'cate_id' =>input('id')
            ];
        }

        $catename = model('Cate')->where('id',input('id'))->value('catename');
        $articles= model('Article')->where($where)->order("create_time",'desc')
            ->paginate(5);

        $viewData=[
            'articles' => $articles,
            'catename' => $catename,
        ];

        $this->assign($viewData);
        return view();
    }

    //注册
    public function register(){

        if(request()->isAjax()){
            $data =[
                'username' => input('post.username'),
                'password' => input('post.password'),
                'conpass'  => input('post.conpass'),
                'nickname' => input('post.nickname'),
                'email'    => input('post.email'),
                'verify'   => input('post.verify'),
            ];


            $result = model('Member')->register($data);
            if($result ==1){
                $this->success('注册成功','index/index/login');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //登录
    public function login(){

        if($this->request->isAjax()){

            $data =[
                'username' => input('post.username'),
                'password' => input('post.password'),
                'verify'   => input('post.verify'),
            ];

            $result = model('Member')->login($data);

            if($result == 1){
                session('username',$data['username']);
                $this->success('登陆成功','index/index/index');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //退出
    public function logout(){

        session(null);
        if(session("?index.id")){
            $this->error('退出失败');
        }else{
            $this->success('退出成功','index/index/index');
        }
    }

    //搜索
    public function search(){

        $where['title'] = array('like','%'.input('keyword').'%');


        $catename = input('keyword');
        $articles = model('Article')->where($where)->order('create_time')->paginate(5);

        $viewData =[
            'articles'=>$articles,
            'catename'=>$catename,
        ];


        $this->assign($viewData);

        return view('index');
    }


    public function text(){
        $where = array('title','like','%'.input('keyword').'%');
         dump($where);
    }
}
