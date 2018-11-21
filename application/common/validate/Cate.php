<?php
/**
 * Created by PhpStorm.
 * User: os
 * Date: 2018/11/20
 * Time: 21:58
 */

namespace app\common\validate;


use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'catename|栏目名称' => 'require|unique:cate',
        'sort|排序'        => 'require|number'
    ];

//    protected $message = [
//        'catename.require' => '栏目名称不能为空',
//        'catename.unique'  => '栏目名称必须唯一',
//        'sort.require'     => '排序不能为空',
//        'sort.require'     => '必须为数值',
//    ];

    protected $scene = [
        'add' => ['catename','sort'],
        'sort'=> ['sort',],
        'edit'=> ['catename',],
        '' =>''
    ];
}