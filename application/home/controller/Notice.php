<?php
namespace app\home\controller;

use think\Db;

class Notice extends Home{

    //通知列表
    public function index(){
       $list=\think\Db::name('document')->order('id asc')->select();
        $page=input('page',1);
        $number=2;//每页显示
        //分页查询
//        $list = \think\Db::name('document')->paginate($number,false,array('page'=>$page));
        //获取分页显示
//        $_page=$list->render();
//        $this->assign ( '_page', $_page );

        $this->assign('list', $list);
        return $this->fetch();

    }

    public function detail($id){
        $list=\think\Db::name('document_article')->where(['id'=>$id])->find();
        $notice=\think\Db::name('document')->where(['id'=>$id])->find();

        $uid=$notice['uid'];
        $name=\think\Db::name('member')->where(['uid'=>$uid])->find();
//      var_dump($name);die;
        $this->assign('list', $list);
        $this->assign('notice', $notice);
        $this->assign('name', $name);
        return $this->fetch();

    }
}