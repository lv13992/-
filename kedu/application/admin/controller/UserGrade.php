<?php
namespace app\admin\controller;
use think\Request;
use think\Controller;
use think\Session;
class UserGrade extends Base{
    /*
     * 展示页面
     *
     */
    public function index(){
        $model=model('user_grade');
        $limit=3;
        $list=$model->paginate($limit);
        return $this->fetch('index',['lists'=>$list]);
    }
    /*
     * 添加页面
     *
     */
    public function add(){
        $request=request();
        $model=model('user_grade');
        if($request->isGet()){
            return $this->fetch('add',['message'=>Session::get('message')]);
        }elseif ($request->isPost()){
            $data=input('post.');
            $validate=validate('UserGrade');
            $ch=$validate->batch()->check($data);
            if(!$ch){
                return $this->redirect('add',[],302,['message'=>$validate->getError()]);
            }
            $model->data($data);
            if($model->save()){
                $this->success('添加成功','index');
            }else{
                $this->error('添加失败');
            }
        }
    }
    /*
    * 添加页面
    *
    */
    public function save(){
        $request=request();
        $model=model('user_grade');
        if($request->isGet()){
            $id=input('id');
            $data=$model->find($id);
            return $this->fetch('save',['message'=>Session::get('message'),'data'=>$data]);
        }elseif ($request->isPost()){
            $data=input('post.');
            $validate=validate('UserGrade');
            $ch=$validate->batch()->check($data);
            if(!$ch){
                 $this->redirect('add',[],302,['message'=>$validate->getError()]);
            }
            if($model->save($data,['id'=>input('id')])){
                $this->success('修改成功','index');
            }else{
                $this->error('修改失败');
            }
        }
    }
    /*
     * 删除用户等级
     *
     */
    public function delete(){
        $model=model('user_grade');
        $id=input('id');
        if($model->destroy($id)){
            $this->success('删除成功','index');
        }else{
            $this->error('删除失败');
        }
    }
}



?>