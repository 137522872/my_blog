<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//    ['admin'] =>[
//      '/' => ['admin/index/login',['methon'=>'get']],
//    ],
//];


Route::group('admin',function(){

    Route::rule('/$','admin/index/login','get|post');
    Route::rule('register','admin/index/register','get|post');
    Route::rule('forget','admin/index/forget','get|post');
    Route::rule('reset','admin/index/reset','post');
    Route::rule('index','admin/home/index','get');
    Route::rule('logout','admin/home/logout','post');
    Route::rule('cateList','admin/cate/cateList','get');
    Route::rule('cateadd','admin/cate/add','get|post');
    Route::rule('sort','admin/cate/sort','post');
    Route::rule('cateedit/[:id]','admin/cate/edit','get|post');
    Route::rule('catedel','admin/cate/del','post');
    Route::rule('articlelist','admin/article/lists','get');
    Route::rule('articleadd','admin/article/add','get|post');
    Route::rule('articletop','admin/article/top','post');
    Route::rule('articleedit/[:id]','admin/article/edit','get|post');
    Route::rule('articledel','admin/article/del','post');
    Route::rule('memberlist','admin/menber/list','get');
    Route::rule('memberadd','admin/menber/add','get|post');
    Route::rule('memberedit','admin/member/edit','get|post');
    Route::rule('memberdel','admin/member/del','post');
    Route::rule('adminlist','admin/admin/lists','get');
    Route::rule('adminadd','admin/admin/add','get|post');
    Route::rule('adminstatus','admin/admin/status','post');
    Route::rule('adminedit/[:id]','admin/admin/edit','get|post');
    Route::rule('admindel','admin/admin/del','post');
    Route::rule('comment','admin/commnet/lists','get|post');
    Route::rule('add','admin/commnet/add','get|post');
});