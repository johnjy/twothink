<?php
namespace app\admin\controller;

use think\Db;

class Authentication extends Admin{
    public function index(){
        $list=\think\Db::name('authentication')->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function edit($id){
//
//        var_dump($id);
          $data=Db::table('twothink_authentication')->where('id',$id)->update(['status'=>1]);
            $user=Db::name('authentication')->where('id',$id)->find();
            $user=\think\Db::name('ucenter_member')->where('id',$user['uid'])->update(['is_owner'=>1]);
//            var_dump($data);
////            $data=\think\Db::name('authentication')->where('id',$id)->update(['status'=>1]);
           if($data){
               return json_encode(1);
           }

    }
}