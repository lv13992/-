<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use \app\admin\model\UserAccount as UserAccountModel;

class UserAccount extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询user_account is_delete 是0的所有数据
        $list = Db::name('user_account')->where(['is_delete'=>0])->paginate(10);

        $lists = [];
        foreach ($list as $v){
            $v['user_id'] = Db::name('user')->find($v['user_id'])['user_name'];
            $lists[] = $v;
        }

        //获取管理员名\   注册到模板
        $admin = Session::get('user_name');
        $this->assign(['admin'=>$admin]);

        return $this->fetch('index',['page'=>$list,'list'=>$lists]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {

        return $this->fetch();
    }


    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $model = new UserAccountModel();

        $data = UserAccountModel::get($id);

        if(\request()->isPost()){

            $info = input('post.');
            $info['paid_time'] = time();

            $re = $model->save($info,['id'=>$id]);

            if($re){

                $this->redirect('index');
            }else{

                $this->error('修改失败');
            }

        }
        return $this->fetch('edit',['data'=>$data]);

    }


    /**
     * 删除指定资源 到回收站   可恢复
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function del($id)
    {
        if(\request()->isGet()){
            $is_delete = UserAccountModel::get($id);
            $re = $is_delete->save(['is_delete'=>1],['id'=>$id]);
            if($re){
                $this->redirect('index');
            }else{
                $this->error('删除到回收站数据失败');
            }
        }else{
            $this->error('删除到回收站数据信息不存在');
        }

    }

    /**
     * 删除后到回收站
     * 展示is_delete= 1的所有数据
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function recycle()
    {
        //查询 is_delete 状态是1的所有数据
        $list = Db::name('user_account')->where(['is_delete'=>1])->paginate(10);
        $lists = [];
        foreach ($list as $v){
            $v['user_id'] = Db::name('user')->find($v['user_id'])['user_name'];
            $lists[] = $v;
        }

        return $this->fetch('recycle',['page'=>$list,'list'=>$lists]);

    }

    /**
     * 从回收站中删除
     * 再次方法删除就不可恢复
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
       if(\request()->isGet()){
           $re = UserAccountModel::destroy($id);
           if($re){

               $this->redirect('recycle');
           }else{
               $this->error('删除信息失败');
           }

       }else{
           $this->error('删除信息不存在');
       }
    }

    /**
     * 回收站中还原数据
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function restore($id)
    {
        if(\request()->isGet()){
            $is_restore = UserAccountModel::get($id);
            $re = $is_restore->save(['is_delete'=>0],['id'=>$id]);
            if($re){
                $this->redirect('recycle');
            }else{
                $this->error('还原数据失败');
            }
        }else{
            $this->error('还原数据信息不存在');
        }

    }
}
