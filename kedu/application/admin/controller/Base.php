<?php

/**
 * 后台公共文件 
 * @file   Common.php  
 * @date   2016-8-24 18:28:34 
 * @author Zhenxun Du<5552123@qq.com>  
 * @version    SVN:$Id:$ 
 */

namespace app\admin\controller;

use think\Controller;

class Base extends Controller {

    protected $user_id;
    protected $user_name;
    protected $salt;

    public function __construct(\think\Request $request = null) {

        parent::__construct($request);

        if (!session('admin_id')) {
            $this->error('请登陆', 'login/index', '', 0);
        }

        $this->user_id = session('admin_id');
        $this->user_name = session('admin_name');
        $this->salt = session('admin_salt');

        //权限检查
//        if (!$this->_checkAuthor()) {
//            $this->error('你无权限操作');
//        }

        //记录日志
        $this->_addLog();
    }

    /**
     * 权限检查
     */
    private function _checkAuthor() {
        $path = [
            'c'=>request()->controller(),
            'a'=>request()->action()
        ];
        $lists = db('admin_group')->alias('t1')->field('privilage_id')
            ->where(['t2.id'=>$this->user_id])
            ->join(config('database.prefix').'admin t2', 't2.group_id=t1.id', 'left')
            ->group('t1.id')
            ->find();
        $a = db('admin_privilage')->field('id')->where($path)->find();
        $b = explode(',',$lists['privilage_id']);
        if(!in_array($a['id'],$b)){
            return false;
        };
        return true;
    }

    /**
     * 记录日志
     */
    private function _addLog() {
        $path = [
            't2.c'=>request()->controller(),
            't2.a'=>request()->action()
        ];
        if($path['t2.a']=='index'){
            return true;
        }
        $a = db('admin_privilage')->alias('t1')->field('t1.p_name')
            ->where($path)
            ->join(config('database.prefix').'admin_privilage t2', 't2.parent_id=t1.id', 'left')
            ->find();
        if(request()->isPost()&&$path['t2.a']=='save'){
            $id = input('id');
            if(empty($id)){
                $user_action = $a['p_name'].'添加';
            }else{
                $user_action = $a['p_name'].'修改';
            }
        }else{
            if($path['t2.a']=='del'){
                $user_action = $a['p_name'].'删除';
            }else{
                return true;
            }
        }
        $data = [
            'log_time'=>time(),
            'admin_id'=>$this->user_id,
            'log_action'=>$user_action,
            'log_info'=>12,
            'ip_address'=>request()->ip()
        ];
        db('admin_log')->insert($data);
    }

}
