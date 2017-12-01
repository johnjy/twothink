<?php
namespace app\home\controller;


use think\Db;
use think\Session;

class Active extends Home{

    public function index(){
        //查询数据表,根据分类和状态筛选
//        $list=\think\Db::name('document')->where('category_id',44)->where('status',1)->select();
//        $this->assign('list', $list);
        return $this->fetch();
    }
    public function canjia($id){
        $user=Session::get('user_auth');
        if($user){
            $uid=$user['uid'];
            $data=['user_id'=>$uid,'active_id'=>$id];
            $order=\think\Db::name('canjia')->where('user_id',$uid)->where('active_id',$id)->find();
           if($order){
               return json_encode(3);
           }
            Db::table('twothink_canjia')->insert($data);
            return json_encode(1);
        }else{
            return json_encode(2);
        }

    }
}