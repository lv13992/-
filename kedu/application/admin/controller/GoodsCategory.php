<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;


class GoodsCategory extends Base
{
    /**
     * 显示品类管理列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $model=model('goods_category');
        //分页
        $limit=3;
        $list=$model->paginate($limit);
        foreach($list as $v){
            $v['show_in_nav']=$v['show_in_nav']==0?'x':'√';
            $v['is_show']=$v['is_show']==0?'x':'√';
        }
        //渲染模板
        return $this->fetch('index',['lists'=>$list]);

    }

    /**
     * 显示添加表单页.
     *
     * @return \think\Response
     */
    public function add()
    {
        $model=model('GoodsCategory');
        $request = request();
        //get接收
        if ($request->isGet()) {
            //渲染模板
            return $this->fetch('add', ['message' => Session::get('message')]);
            //post接收
        } elseif ($request->isPost()) {

            $data = input('post.');
            //验证器
            $validate = validate('GoodsCategory');
            $ch = $validate->batch()->check($data);
            if (!$ch) {
                $this->redirect('add', [], 302, ['message' => $validate->getError()]);
            }
            $model->data($data);
            if ($model->save()) {
                $this->success('添加成功', 'index');
            } else {
                $this->error('添加失败');
            }

        }
    }

    /**
     * 显示修改页面
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(){

        $model = model('GoodsCategory');


        $request = request();

        if ($request->isGet()) {

            $id=input('id');

            $data=$model->find($id);

            return $this->fetch('save', ['message' => Session::get('message'),'data'=>$data]);

        } elseif ($request->isPost()) {

            $data = input('post.');

            $validate = validate('GoodsCategory');

            $ch = $validate->batch()->check($data);

            if (!$ch) {
                $this->redirect('save', [], 302, ['message' => $validate->getError()]);
            }

            if ($model->save($data,['id'=>input('id')])) {
                $this->success('修改成功', 'index');
            } else {
                $this->error('修改失败');
            }

        }
    }

    /**
     * 删除商品分类
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {

        $model=model('GoodsCategory');

        $id=input('id');

        if($model->destroy($id)){

            $this->success('删除成功','index');

        }else{

            $this->error('删除失败');
        }
    }





}
