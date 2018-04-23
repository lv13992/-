<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Session;


class User extends Base
{
    /**
     * 显示用户列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $model=model('user');
        //实例化地区
        $rmodel=model('region');
        //实例化用户等级
        $gmodel=model('UserGrade');
        //分页
        $limit=3;
        $list=$model->paginate($limit);
        foreach ($list as $v){
            $v['sex']=$v['sex']==0?'男':'女';
            $v['user_grade_id']=$gmodel->where(['id'=>$v['user_grade_id']])->value('name');
            $v['province']=$rmodel->where(['region_id'=>$v['province']])->value('region_name');
            $v['city']=$rmodel->where(['region_id'=>$v['city']])->value('region_name');
            $v['area']=$rmodel->where(['region_id'=>$v['area']])->value('region_name');
        }


        return $this->fetch('index',['lists'=>$list]);

    }

    /**
     * 显示添加表单页.
     *
     * @return \think\Response
     */
    public function add()
    {
        $model=model('user');
        $request = request();

        if ($request->isGet()) {
            $rmodel=model('region');
            $gmodel=model('UserGrade');
            $province = $rmodel->where ( array('region_type'=>1) )->select ();
            $grade=$gmodel->select();

            return $this->fetch('add', ['message' => Session::get('message'),'province'=>$province,'grade'=>$grade]);

        } elseif ($request->isPost()) {

            $data = input('post.');
            //验证器
            $validate = validate('user');
            $ch = $validate->batch()->check($data);
            if (!$ch) {
                $this->redirect('add', [], 302, ['message' => $validate->getError()]);
            }
            $data['salt']=rand(1255,6456);
            $data['password']=md5($data['password'].$data['salt']);
            $model->data($data);
            if ($model->save()) {
                $this->success('添加成功', 'index');
            } else {
                $this->error('添加失败');
            }

        }
    }
    /**
     * ajax接收选中的省.
     *
     * @return \think\Response
     */
    public function city(){
        $province = input('post.');
        $rmodel=model('region');
        $a = $rmodel->where(['region_type'=>2,'parent_id'=>$province['parent_id']])->select();
        return $a;
    }
    /**
     * ajax接收选中的城市.
     *
     * @return \think\Response
     */
    public function area(){
        $city = input('post.');
        $rmodel=model('region');
        $a = $rmodel->where(['region_type'=>3,'parent_id'=>$city['parent_id']])->select();
        return $a;
    }


    /**
     * 显示修改页面
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(){

        $model = model('user');


        $request = request();

        if ($request->isGet()) {

            $id=input('id');

            $data=$model->find($id);
//            dump($data);exit;

            $rmodel=model('region');

            $gmodel=model('UserGrade');
            //查出所有省
            $province = $rmodel->where ( array('region_type'=>1) )->select ();
            //查出所有市
            $city = $rmodel->where ( array('region_type'=>2) )->select ();
            //查出所有区
            $area= $rmodel->where ( array('region_type'=>3) )->select ();
            //查出用户表中所有等级
            $grade=Db::name('user_grade')->select();

            return $this->fetch('save', ['message' => Session::get('message'),'city'=>$city,'area'=>$area,'province'=>$province,'grade'=>$grade]);

        } elseif ($request->isPost()) {

            $data = input('post.');

            $validate = validate('user');

            $ch = $validate->batch()->check($data);

            if (!$ch) {
                $this->redirect('save', [], 302, ['message' => $validate->getError()]);
            }

            $data['salt']=rand(1255,6456);

            $data['password']=md5($data['password'].$data['salt']);

            if ($model->save($data,['id'=>input('id')])) {
                $this->success('修改成功', 'index');
            } else {
                $this->error('修改失败');
            }

        }
    }

    /**
     * 删除用户
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {

        $model=model('User');

        $id=input('id');

        if($model->destroy($id)){

            $this->success('删除成功','index');

        }else{

            $this->error('删除失败');
        }
    }

}
