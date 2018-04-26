<?php

/**
 *  登陆页
 * @file   Login.php  
 * @date   2016-8-23 19:52:46 
 * @author Zhenxun Du<5552123@qq.com>  
 * @version    SVN:$Id:$ 
 */

namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;
use think\Controller;
use think\Db;
use think\Loader;

class Login extends Controller {

    /**
     * 登入
     */
    public function index() {
        //dump(request()->ip());exit;


        if (isset($_POST['dosubmit'])) {
            $username = input('post.admin_name');
            $password = input('post.password');

            if (!$username) {
                $this->error('用户名不能为空');
            }
            if (!$password) {
                $this->error('密码不能为空');
            }

            $info = db('admin')->field('id,admin_name,password,salt')->where('admin_name', $username)->find();


            if (!$info) {
                $this->error('用户不存在');
            }

            if (md5($password.$info['salt']) != $info['password']) {
                $this->error('密码不正确');
            } else {
                session('admin_name', $info['admin_name']);
                session('admin_id', $info['id']);
                session('admin_salt', $info['salt']);


                if (input('post.islogin')) {
                    cookie('admin_name', md5($info['admin_name']));
                    cookie('admin_id', md5($info['id']));
                }

                //修改最后登录信息
                $model = new AdminModel();
                $data = [
                    'last_login_time'=>time(),
                    'last_login_ip'=>request()->ip(),
                ];
                $mod = ['id'=>$info['id']];
                $model->save($data,$mod);
                $this->success('登入成功', 'index/index');
            }
        } else {
            if (session('admin_name')) {
                $this->success('您已登入', 'index/index');
            }

            if (cookie('admin_name')) {
                $username = md5(cookie('admin_name'),'DECODE');
                $info = db('admin')->field('id,admin_name,password')->where('admin_name', $username)->find();
                if ($info) {
                    //记录
                    session('admin_name', $info['admin_name']);
                    session('admin_id', $info['id']);
                    Loader::model('admin')->editInfo(1, $info['id']);
                    $this->success('登入成功', 'index/index');
                }
            }

            return $this->fetch('login');
        }
    }
    /**
     * QQ登入
     */
    public function userinfo() {
        return view();
    }
    /**
     * 登出
     */
    public function logout() {
        session('admin_name', null);
        session('admin_id', null);
        session('admin_salt', null);
        cookie('admin_name', null);
        cookie('admin_id', null);
        cookie('admin_salt', null);
        $this->success('退出成功', 'login/index');
    }

}
