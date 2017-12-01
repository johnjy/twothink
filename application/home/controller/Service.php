<?php
namespace app\home\controller;

use think\Request;

class Service extends Home{

    //通知列表
    public function index(){
//        $list=\think\Db::name('document')->order('id asc')->select();
//        $request=Request::instance();
//        $pages=$request->param(['page']);
//        $pages=Request::instance()->param('page');
////        var_dump($pages);
//        if($pages){
////
//
//            $number=4;
//            $page=input('page',$pages);
//            $list = \think\Db::name('document')->paginate($number,false,array('page'=>$page));
//            $this->assign('list', $list);
//            return $this->fetch();

//            echo json_encode($list);
//        }else{
            $page=input('page',1);
//        }
        $number=4;//每页显示
        //分页查询
        $list = \think\Db::name('document')->paginate($number,false,array('page'=>$page));
        //获取分页显示
        $_page=$list->render();
        $this->assign ( '_page', $_page );
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