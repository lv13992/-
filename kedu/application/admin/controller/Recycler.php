<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\admin\model\Goods as GoodsModel;
class Recycler extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
       $list=Db::name('goods')->where(['is_delete'=>1])->select();
       return $this->fetch('index',['list'=>$list]);
    }

    /**
     * 还原数据
     *
     * @return \think\Response
     */
    public function recover()
    {
        $id=input('id');
        $list=Db::name('goods')->where(['id'=>$id])->update(['is_delete'=>0]);
        return $this->fetch('index',['list'=>$list]);
    }

    /**
     * 删除数据
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function delete()
    {
        $id=input('id');
        if(isset($id)){
            $delete=Db::name('goods')->delete($id);
            if($delete){
                $this->redirect('index');
            }
        }else{
            $this->error('id不存在');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function mutildel()
    {
        $model= new GoodsModel();
        $delete=$model->destroy(input('selected/a',[]));
        if($delete){
            $this->redirect('index');
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
}
