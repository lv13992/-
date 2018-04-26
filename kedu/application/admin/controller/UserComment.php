<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\UserComment as UserCommentModel;

class UserComment extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询用户评论表的所有数据
        $list = Db::name('user_comment')->paginate(10);

        //数据展示的处理
        $lists = [];
        foreach ($list as $v){

            if(0===$v['comment_type']){
                $v['id_value'] = Db::name('goods')->find($v['id_value'])['goods_name'];

            }else{
                $v['id_value'] = Db::name('article')->find($v['id_value'])['title'];
            }
            $v['user_id'] = Db::name('user')->find($v['user_id'])['user_name'];
            $lists[] = $v;
        }

        return $this->fetch('index',['list'=>$lists,'page'=>$list]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {

    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {

    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read()
    {


    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = UserCommentModel::get($id);
        if(\request()->isPost()) {
            //更新数据   //是否批准评论
            $model = new UserCommentModel();
            $model->save(['status'=>input('status')],['id'=>$id]);
            $this->redirect('index');
        }
        return $this->fetch('edit',['data'=>$data]);

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


    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function del($id)
    {
        if(\request()->isGet()){
            $re = Db::name('user_comment')->find($id)->delete();
            if($re){
                $this->redirect('index');
            }else{
                $this->error('删除该数据失败');
            }
        }else{
            $this->error('删除数据信息不存在');
        }



    }
}
