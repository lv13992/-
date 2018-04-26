<?php

/**
 *  后台继承类
 * @file   Admin.php  
 * @date   2016-8-23 19:45:21 
 * @author Zhenxun Du<5552123@qq.com>  
 * @version    SVN:$Id:$ 
 */

namespace app\admin\controller;



class AdminGroup extends Base {

    public function index() {
        $lists = db('admin_group')->select();
//        dump($lists);die;
        foreach ($lists as $k=>$v){
            $count = db('admin')->field('1')->where('group_id',$v['id'])->count();
//            $grade = db('admin_grade')->field('grade_name')->where('id',$v['grade_id'])->find();
            $lists[$k]['count'] = $count;
//            $lists[$k]['grade_id'] = $grade['grade_name'];

        }
        $this->assign('lists',$lists);
        return view('admin/admin_group/index');
    }

    /*
     * 编辑
     */
    public function save($id=null){
        if(is_null($id)){
            $model=model('admin_group');
        }else{
            $model=model('admin_group')->get($id);
        }

        if(request()->isGet()){
            if(isset($id)){
                $this->assign('info',$model);
            }
            return view('admin/admin_group/save');
        }else{
            $data = input('post.');

            $res = $model->save($data);
        }
        if ($res) {
            if(!empty($id)){

            }
            $this->success('操作成功', url('index'));
        } else {
            $this->error('操作失败');
        }
    }
    /*
     * 删除
     */

    public function del() {
        $id = input('id');
        $res = db('admin_group')->where(['group_id' => $id])->delete();
        if ($res) {
            $this->success('操作成功', url('index'));
        } else {
            $this->error('操作失败');
        }
    }

}
