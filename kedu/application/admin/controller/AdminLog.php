<?php

/**
 *  后台继承类
 * @file   Admin.php
 * @date   2016-8-23 19:45:21
 * @author Zhenxun Du<5552123@qq.com>
 * @version    SVN:$Id:$
 */

namespace app\admin\controller;

class AdminLog extends Base{
    public function index(){
        $lists = db('admin_log')->select();
        foreach ($lists as $k=>$v){
            $group = db('admin')
                ->field('admin_name')
                ->where('id',$v['admin_id'])
                ->find();
            $lists[$k]['admin_id']=$group['admin_name'];
        }
        return view('admin/admin_log/index',['lists'=>$lists]);
    }
}