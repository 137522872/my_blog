<?php

namespace app\admin\controller;

use think\Controller;

class System extends Base
{
    //系统设置

    public function set(){


        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'webname' => input('post.webname'),
                'copyright' => input('post.copyright'),

            ];



            $resutl = model('System')->edit($data);
            if($resutl ==1){
                return $this->success("设置成功",'admin/home/index');
            }else{
                $this->error($resutl);
            }
        }

        $webInfo = model('System')->find();
        $viewData = [
            'webInfo' =>$webInfo,
        ];
        $this->assign($viewData);
        return view();
    }
}
