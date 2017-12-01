<?php
namespace app\home\controller;

use think\Db;

class Sale  extends Home{

    public function index(){

        $list=Db::name('sale')->where('status',2)->where('sale',1)->select();
        $lists=Db::name('sale')->where('status',2)->where('sale',2)->select();
        $this->assign('list',$list);
        $this->assign('lists',$lists);
        return $this->fetch();
    }

    public function detail($id){
        $list=Db::name('sale')->where('status',2)->where('id',$id)->find();
        $this->assign('list',$list);
        return $this->fetch();
    }
}