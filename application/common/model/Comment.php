<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Comment extends Model
{
    //软删除
    use SoftDelete;

    //关联文章
    public function article(){
        return $this->belongsTo('Article','article_id','id');
    }

    //关联用户
    public function member(){
        return $this->belongsTo('Member','member_id','id');
    }

    //添加评论
    public function comm($data){

        $validate = new \app\common\validate\Comment();
        if(!$validate->scene('comm')->check($data)){
            return $validate->getError();
        }

        $result = Comment::create($data);
        if($result){
            return 1;
        }else{
            return '评论失败了';
        }
    }

}
