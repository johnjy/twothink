<?php
namespace app\user\controller;

use think\Controller;
use think\Session;

class Authentication extends Controller{
    //业主认证
    public function index(){
        if(request()->isPost()){
            $User=model('authentication');
            $post_data=\think\Request::instance()->post();

            $member=Session::get('user_auth');
            $post_data['uid']=$member['uid'];
            $data=$User->insert($post_data);
            if($data){
                $this->success('认证已提交,请等待','home/index/fuwu');
            }else{
                $this->error('认证失败,请从新填写');
            }
        }

      return $this->fetch();
    }

}