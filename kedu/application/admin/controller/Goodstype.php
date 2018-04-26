<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Goodstype extends Controller{
    function index(){
        $list = Db::name('goods_type')->select();
        return $this->fetch('index',['list'=>$list]);
    }
    function save(){
        if(request()->isGet()){
            return $this->fetch();
        }elseif (request()->isPost()){
            $data = request()->post();
            $re = Db::name('goods_type')->insert($data);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('添加失败','index');
            }
        }
    }
    function edit($id){
        if(request()->isGet()){
            $data = Db::name('goods_type')->find($id);
            return $this->fetch('edit',['data'=>$data]);
        }elseif (request()->isPost()){
            $data = request()->post();
            $re = Db::name('goods_type')->update($data);
            if($re){
                $this->redirect('index');
            }else$this->error('修改失败','index');
        }
    }
    function del($id){
        if(isset($id)){
            $re = Db::name('goods_type')->delete($id);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('删除失败','index');
            }
        }
    }
}