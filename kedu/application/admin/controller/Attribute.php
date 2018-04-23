<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Attribute extends Controller{
    function index(){
        $list = Db::name('attribute')->select();
        $lists = [];
        foreach ($list as $val){
            $val['cat_name']=Db::name('goods_type')->where('cat_id',$val['cat_id'])->value('cat_name');
            $lists [] = $val;
        }
        return $this->fetch('index',['lists'=>$lists]);
    }
    function save(){
        if(request()->isGet()){
            $cat = Db::name('goods_type')->select();
            return $this->fetch('save',['cat'=>$cat]);
        }elseif (request()->isPost()){
            $data = request()->post();
            $re = Db::name('attribute')->insert($data);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('添加失败');
            }
        }
    }
    function edit($id){
        if(request()->isGet()){
            $data = Db::name('attribute')->find($id);
            $cat = Db::name('goods_type')->select();
            return $this->fetch('edit',['data'=>$data,'cat'=>$cat]);
        }elseif (request()->isPost()){
            $data = request()->post();
            $re = Db::name('attribute')->update($data);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('修改失败');
            }
        }
    }
    function del($id){
        if(isset($id)){
            Db::name('attribute')->delete($id);
            $this->redirect('index');
        }
    }
}