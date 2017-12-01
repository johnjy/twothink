<?php
namespace app\admin\controller;

class Sale extends Admin{

    public function index(){
        $list=\think\Db::name('sale')->select();
        $this->assign('list',$list);
        return $this->fetch();
    }

    //添加
    public function add(){

        if(request()->isPost()){
            $Repair = model('sale');
            $post_data=\think\Request::instance()->post();
            $datas['title']=$post_data['title'];
            $datas['tel']=$post_data['tel'];
            $datas['price']=$post_data['price'];
            $datas['sale']=$post_data['sale'];
            $datas['intro']=$post_data['intro'];
            $datas['content']=$post_data['content'];
            $datas['status']=$post_data['status'];
            $datas['name']=$post_data['name'];
//            var_dump($post_data);die;
            //自动验证

            $validate = validate('sale');
            if(!$validate->check($datas)){
                return $this->error($validate->getError());
            }

            $data = $Repair->create($datas);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_sale', 'sale', $data->id, UID);
            } else {
                $this->error($Repair->getError());
            }
        } else {

            return $this->fetch('edit');
        }
    }
    public function edit($id){
        $info = array();
        /* 获取数据 */
        $info = \think\Db::name('Sale')->find($id);
        if(request()->isPost()){
            $Repair = model('sale');
            $post_data=\think\Request::instance()->post();
            $datas['title']=$post_data['title'];
            $datas['tel']=$post_data['tel'];
            $datas['price']=$post_data['price'];
            $datas['sale']=$post_data['sale'];
            $datas['intro']=$post_data['intro'];
            $datas['content']=$post_data['content'];
            $datas['status']=$post_data['status'];
            $datas['name']=$post_data['name'];
//            var_dump($post_data);die;
            //自动验证

            $validate = validate('sale');
            if(!$validate->check($datas)){
                return $this->error($validate->getError());
            }

            $data = $Repair->create($datas);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_sale', 'sale', $data->id, UID);
            } else {
                $this->error($Repair->getError());
            }
        } else {
//            var_dump($info);die;
            $this->assign('info',$info);
            return $this->fetch('edit');
        }

    }

    //删除
    public function del(){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作房源!');
        }

        $map = array('id' => array('in', $id) );
        if(\think\Db::name('sale')->where($map)->delete()){
            //记录行为
            action_log('update_sale', 'sale', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}