<?php

/**
 *  后台继承类
 * @file   Admin.php  
 * @date   2016-8-23 19:45:21 
 * @author Zhenxun Du<5552123@qq.com>  
 * @version    SVN:$Id:$ 
 */

namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;
use think\Loader;
use think\Session;

class Admin extends Base {

    public function index() {
        $where = [];
        if ($group_id = input('group_id')) {
            $where['t2.group_id'] = $group_id;
        }

        $lists = db('admin')->alias('t1')->field('t1.id,t1.group_id,t1.realname,t1.admin_name,t1.email,t1.last_login_time,t1.last_login_ip')
                ->where($where)
                ->join(config('database.prefix').'admin_group t2', 't1.group_id=t2.id', 'left')
                ->group('t1.id')
                ->select();
        foreach ($lists as $k => $v) {
            //取出组名
            $tmp = db('admin_group')->field('group_name')->where('id', 'in', $lists[$k]['group_id'])->select();
                if ($tmp){
                      foreach ($tmp as $vv) {
                          $lists[$k]['group_id'] = $vv['group_name'] ;
                      }
                }
        }
        $this->assign('lists', $lists);
        return $this->fetch('admin/admin/index');
    }

    public function save($id=null){
        if(is_null($id)){
            $model=model('admin');
        }else{
            $model=model('admin')->get($id);
        }
        if(request()->isGet()){
            $group = db('admin_group')->field('id,group_name')->select();
            if(isset($id)){
                $this->assign('info',$model);
            }
            $this->assign('group',$group);
            return view('admin/admin/save');
        }else{
            $data = input('post.');
            $admin = db('admin')->where('admin_name', $data['admin_name'])->find();

            if(empty($id)){
                if (isset($admin)) {
                    $this->error('用户名已存在');
                }
                $data['last_login_time'] = $data['add_time'] = time();
            }
            if ($data['password'] != $data['rpassword']) {
                $this->error('两次密码不一致');
            }
            $a = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
            $salt = '';
            for($i=1;$i<5;$i++){
                $rand_4 = rand(0,61);
                $salt .=substr($a,$rand_4,'1');
            }
            $data['salt']=$salt;
            unset($data['rpassword']);
            $data['password'] = md5($data['password'].$salt);


            $res = $model->save($data);
        }
        if ($res) {
            $this->success('操作成功', url('index'));
        } else {
            $this->error('操作失败');
        }
    }

    /*
     * 删除
     */

    public function del($id) {
        $admin=model('admin')->get($id);
        $res = $admin->delete();
        if ($res) {
            $this->success('操作成功', url('index'));
        } else {
            $this->error('操作失败');
        }
    }

    /**
     * 修改个人信息
     */
    public function public_edit_info() {
        $model = new AdminModel();
        $data = input('post.');
        if (isset($data['dosubmit'])) {
            if (!$data['password']) {
                unset($data['password']);
            } else {
                if ($data['password'] != $data['rpassword']) {
                    $this->error('两次密码不一致!');
                }
                unset($data['rpassword'],$data['dosubmit']);
                $data['password'] = md5($data['password'].$this->salt);
            }


            $mod = [
              'id'=>$this->user_id
            ];
            $res = $model->save($data,$mod);
            if ($res) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        } else {
            $group = db('admin_group')->field('id,group_name')->select();
            $info = db('admin')->where('id', $this->user_id)->find();
            $this->assign('info', $info);
            return $this->fetch('admin/admin/public_edit_info',['group'=>$group]);
        }
    }

}
