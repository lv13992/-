<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Image;

class Goods extends Controller{
    function index(){
        $list = Db::name('goods')->paginate(10);
        return $this->fetch('index',['list'=>$list]);
    }

    function upload(){
        $file = request()->file('goods_img');
        $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
        $savename = $info->getSaveName();
        $savepath = ROOT_PATH.'public/uploads/'.$savename;
        $thumbpath = ROOT_PATH.'public/static/thumb/';
        $img = Image::open($savepath);
        $img->thumb(800,800)->save($thumbpath.'big/'.$info->getFilename());
        $img->thumb(160,160)->save($thumbpath.'small/'.$info->getFilename());
        return $info->getSaveName();
    }

    function save(){
        if(request()->isGet()){
            return $this->fetch();
        }elseif (request()->isPost()){
            $data = request()->post();
            $data['goods_img'] = $this->upload();
        }
    }
}