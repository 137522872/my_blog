<?php
/**
 * Created by PhpStorm.
 * User: os
 * Date: 2018/11/22
 * Time: 11:29
 */

namespace app\common\validate;


use think\Validate;

class System extends Validate
{
    protected $rule = [
        'webname|网址标题' => 'require',
        'copyright|版权信息' => 'require'
    ];

    protected $scene =[
        'set' =>['webname','copyright']
    ];
}