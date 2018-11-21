<?php

namespace app\admin\controller;

use think\console\command\make\Model;
use think\Controller;

class Cate extends Controller
{
    //栏目列表
    public function cateList(){

        $cates = model('Cate')->order(['sort'])->paginate(4);

        $viewData = [
            'cates' => $cates
        ];

        $this->assign($viewData);
        return view();
    }

    //栏目添加
    public function add(){

        if(request()->isAjax()){

            $data =[
                'catename' => input('post.catename'),
                'sort'     => input('post.sort')
            ];

            $result = model('Cate')->add($data);
            if($result ==1){
                $this->success('栏目添加成功','admin/cate/cateList');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //栏目排序
    public function sort(){
        $data = [
            'id' => input('post.id'),
            'sort'=> input('post.sort')
        ];

        $result = model('Cate')->sort($data);

        if($result == 1){
            $this->success('排序成功','admin/cate/cateList');
        }else{
            $this->error($result);
        }
    }

    //编辑栏目
    public function edit(){

        if(request()->isAjax()){
            $data = [
                'id'=> input('post.id'),
                'catename' => input('post.catename')
            ];

            $result = model('Cate')->edit($data);
            if($result == 1){
                $this->success('栏目编辑成功','admin/cate/cateList');
            }else{
                $this->error($result);
            }
        }


        $cateInfo = model('Cate')->find(input('id'));

        $viewData = [

            'cateInfo'=> $cateInfo,
        ];

        $this->assign($viewData);

        return view();
    }

    //栏目删除
    public function del(){

//        $cateInfo = model('Cate')->find(input('post.id'));
        $result= \app\common\model\Cate::destroy(input('post.id'));
        if($result){
            $this->success('栏目删除成功','admin/cate/cateList');
        }else{
            $this->error($result);
        }

    }
}
