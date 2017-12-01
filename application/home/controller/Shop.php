<?php
namespace app\home\controller;


class Shop extends Home{

    public function index(){
        //查询数据表,根据分类和状态筛选
//        $list=\think\Db::name('document')->where('category_id',43)->where('status',1)->select();
//        $this->assign('list', $list);
       return $this->fetch();
    }
    public function detail($id = 0, $p = 1){
        /* 标识正确性检测 */
        if(!($id && is_numeric($id))){
            $this->error('文档ID错误！');
        }

        /* 页码检测 */
        $p = intval($p);
        $p = empty($p) ? 1 : $p;

        /* 获取详细信息 */
        $Document = new Document();
        $info = $Document->detail($id);
        if(!$info){
            $this->error($Document->getError());
        }
        /* 分类信息 */
        $category = $this->category($info['category_id']);
        /* 获取模板 */
        if(!empty($info['template'])){//已定制模板
            $tmpl = $info['template'];
        } elseif (!empty($category['template_detail'])){ //分类已定制模板
            $tmpl = $category['template_detail'];
        } else { //使用默认模板
            $tmpl = 'article/'. get_document_model($info['model_id'],'name') .'/detail';
        }
        /* 更新浏览数 */
        $map = array('id' => $id);
        $Document->where($map)->setInc('view');
        /* 模板赋值并渲染模板 */
        $this->assign('category', $category);
        $this->assign('info', $info);
        $this->assign('page', $p); //页码
        return $this->fetch($tmpl);
    }

}