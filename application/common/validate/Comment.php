<?php
/**
 * Created by PhpStorm.
 * User: os
 * Date: 2018/11/22
 * Time: 10:40
 */

namespace app\common\validate;


use think\Validate;

class Comment extends Validate
{

    protected $rule = [
        'content' => 'require',

    ];

}