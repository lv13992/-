<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use \app\admin\model\UserFeedback as UserFeedbackModel;

class UserFeedback extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询留言所有数据
        $list = Db::name('user_feedback')->paginate(10);

        //将要展示的数据进行foreach遍历处理
        $lists = [];
        foreach ($list as $v){
            $v['user_id'] = Db::name('user')->find($v['user_id'])['name'];
            $lists[] = $v;
        }

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
    public function save($id=null)
    {

        //判断$id参数是否未空
        if(is_null($id)){
            $model = new UserFeedbackModel();
        }else{

            $model = UserFeedbackModel::get($id);
        }
        //判断请求类型
        if(\request()->isGet()){

            $data = $model->getData();

            return $this->fetch('save',['data'=>$data]);

        }else{

            $data = \request()->post();

            if($_FILES['feedback_img']['tmp_name'] !==''){

                $file = \request()->file('feedback_img');
                $info = $file->move(ROOT_PATH.'public/static/upload/admin');
                if($info){
                    $data['feedback_img'] = $info->getSaveName();
                }
            }
            $userInfo = Db::name('user')->find($data['user_id']);

            $data['user_name'] = $userInfo['user_name'];
            $data['user_email'] = $userInfo['email'];

            $model->data($data);

            $model->save();

            $this->redirect('index');
        }

    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
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
