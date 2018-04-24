<?php
namespace app\admin\controller;

use app\admin\validate\Address;
use app\admin\validate\User;
use think\Controller;
use think\Db;
use think\Session;


class Useraddress extends Controller{
    function index(){
        $list = Db::name('user_address')->select();
        return $this->fetch('index',['list'=>$list]);
    }
    function save(){
        if(request()->isGet()){
            $province = Db::name('region')->where(array('region_type'=>1))->select();
            return $this->fetch('save', ['message'=>Session::get('message'),'province'=>$province]);
        }elseif (request()->isPost()){
            $data = request()->post();
            $validate = new Address();
            $ch = $validate->batch()->check($data);
            if(!$ch){
                $this->redirect('save',[],302,['message'=>$validate->getError()]);
            }
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $re = Db::name('user_address')->insert($data);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('添加失败');
            }
        }
    }
    function city(){
        $parent = input('post.');
        $a = db('region')->where(['parent_id'=>$parent['parent_id'],'region_type'=>2])->select();
        return $a;
    }
    function district(){
        $parent = input('post.');
        $a = db('region')->where(['parent_id'=>$parent['parent_id'],'region_type'=>3])->select();
        return $a;
    }

    function edit($id){
        if(request()->isGet()){
            $data = Db::name('user_address')->find($id);
            $province = Db::name('region')->where(array('region_type'=>1))->select();
            $city = Db::name('region')->where(array('region_type'=>2))->select();
            $district = Db::name('region')->where(array('region_type'=>3))->select();
            return $this->fetch('edit',['data'=>$data,'province'=>$province,'city'=>$city,'district'=>$district]);
        }elseif (request()->isPost()){
            $data = request()->post();
            $re = Db::name('user_address')->update($data);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('修改失败');
            }
        }
    }
    function del($id){
        if(isset($id)){
            $re = Db::name('user_address')->delete($id);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('删除失败');
            }
        }
    }
}