<?php
namespace app\admin\controller;

//后台报修管理
class Repair extends Admin{

    //报修列表
    public function index(){
    $page=input('page',1);
    $number=4;//每页显示
        //分页查询
        $list = \think\Db::name('Repair')->paginate($number,false,array('page'=>$page));
        //获取分页显示
        $_page=$list->render();
        $this->assign ( '_page', $_page );
        $this->assign('list', $list);
        return $this->fetch();
    }

    //添加报修单
    public function add(){

        if(request()->isPost()){
            $Repair = model('repair');
            $post_data=\think\Request::instance()->post();
            //自动验证
            $validate = validate('repair');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
           $post_data['repair_id']=date('Ymd',time()).mt_rand(1,99);
            $data = $Repair->create($post_data);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_repair', 'repair', $data->id, UID);
            } else {
                $this->error($Repair->getError());
            }
        } else {

            return $this->fetch('edit');
        }

    }

    public function edit($id){
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $Repair = \think\Db::name("Repair");
            $data = $Repair->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('Repair')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }

            $this->assign('info', $info);

            return $this->fetch();
        }
    }


    //删除报修单
    public function del(){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的报修单!');
        }

        $map = array('id' => array('in', $id) );
        if(\think\Db::name('repair')->where($map)->delete()){
            //记录行为
            action_log('update_repair', 'repair', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}