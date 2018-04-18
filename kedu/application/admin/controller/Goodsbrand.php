<?php
namespace app\admin\controller;



use think\Db;
use think\Image;

class Goodsbrand extends Base {
    function index(){
        $list = Db::name('goods_brand')->paginate(10);
        $this->assign('list',$list);
        return $this->fetch();
    }

    function upload(){
        $file = request()->file('brand_img');
        $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
        if($info){
           $savename = $info->getSaveName();
           $savepath = ROOT_PATH.'public/uploads'.$savename;
           $thumbpath = ROOT_PATH.'public/static/thumb/';
           $img = Image::open($savepath);
           $img->thumb(800,600)->save($thumbpath.'big/'.$info->getFilename());
           $img->thumb(350,350)->save($thumbpath.'small/'.$info->getFilename());
        }
        return $info->getSaveName();
    }

    function save(){
        if(request()->isGet()){
            return $this->fetch();
        }elseif (request()->isPost()){
            $data = request()->post();
            $data['brand_img'] = $this->upload();
            $re = Db::name('goods_brand')->insert($data);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('添加失败','index');
            }
        }
    }

    function edit($id){
        if(request()->isGet()){
            $data = Db::name('goods_brand')->find($id);
            $this->assign('data',$data);
            return $this->fetch();
        }elseif (request()->isPost()){
            $data = request()->post();
            $re = Db::name('goods_brand')->update($data);
            if($re){
                $this->redirect('index');
            }else$this->error('修改失败','index');
        }
    }

    function del(){
        $id = request()->param('brand_id');
        if(isset($id)){
            $re = Db::name('goods_brand')->delete(request()->param('id'));
            if($re){
                $this->redirect('index');
            }else{
                $this->error('删除失败','index');
            }
        }
    }
}
