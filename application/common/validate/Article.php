<?php
/**
 * Created by PhpStorm.
 * User: os
 * Date: 2018/11/21
 * Time: 12:43
 */

namespace app\common\validate;


use think\Validate;

class Article extends Validate
{

    protected $rule = [
        'title|文章标题' => 'require|unique:article',
        'tags|标签'     => 'require',
        'cate_id|所属栏目'=> 'require',
        'desc|文章概要'  => 'require',
        'content|内容'  =>  'require',
        'is_top|推荐'   =>  'require',
        'author|作者'   =>  'require',
    ];

    protected $scene =[
        'add' =>['title','tags','cateid','desc','content'],
        'top' =>['is_top',],
        'edit'=>['title','tags','cate_id','desc','content','is_top']
    ];
}