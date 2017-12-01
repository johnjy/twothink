<?php
namespace app\home\controller;

use think\Controller;
use think\Session;

class Repair extends Home{

    public function index(){

        //是否登录
        if(!is_login()){
            $this->error('请先登录','user/login/index');

        }else{

            $users=Session::get('user_auth');
//            var_dump($user);die;
            $uid=$users['uid'];
            $user=\think\Db::name('ucenter_member')->where('id',$uid)->find();
//            var_dump($user);die;
            if($user['is_owner']!=1){
                $this->error('请先进行业主认证','user/authentication/index');
            }else{

            if(request()->isPost()){
            $Repair = model('repair');
            $post_data=\think\Request::instance()->post();
            //自动验证
//            var_dump($post_data);die;
            $validate = validate('repair');

            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }

            $post_data['repair_id']=date('Ymd',time()).mt_rand(1,99);
//            var_dump($post_data);die;
            $data = $Repair->create($post_data);
            if($data){
                $this->success('新增成功', url('index/index'));
                //记录行为
                action_log('update_repair', 'repair', $data->id, UID);
            } else {
                $this->error($Repair->getError());
            }
        } else {

            return $this->fetch('index');
        }
            }
        }




    }


}