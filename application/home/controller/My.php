<?php
namespace app\home\controller;

use think\Db;
use think\Session;

class My extends Home{

    public function my(){

        if(is_login()){
            $user=Session::get('user_auth');

            $list=Db::name('ucenter_member')->where('id',$user['uid'])->find();
//            var_dump($list);die;
            $this->assign('list',$list);
            return $this->fetch();
        }else{
            $this->error('请先登录','user/login/index');
        }


    }
}