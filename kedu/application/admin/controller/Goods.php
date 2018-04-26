<?php

namespace app\admin\controller;


use think\Image;
use think\Request;
use think\Db;
use think\Session;

class Goods extends Base
{
    /**
     * 显示商品列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list=Db::name('goods')->where(['is_delete'=>0])->select();
        return $this->fetch('index',['list'=>$list,'message'=>Session::get('message')]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function add()
    {
        if(request()->isGet()){
            $data=Db::name('goods_type')->select();
            $brand=Db::name('goods_brand')->select();
            $category=Db::name('goods_category')->select();
            return $this->fetch('add',['data'=>$data,'brand'=>$brand,'category'=>$category]);
        }else{
            $list=request()->post();
            $list['promote_start_date']=strtotime($list['promote_start_date']);
            $list['promote_end_date']=strtotime($list['promote_end_date']);
            $list['add_time']=time();
            $file=request()->file('goods_img');
            $info=$file->move(ROOT_PATH.'public/static/uploads/big/');
            $name=$info->getSaveName();
            $path=substr($name,0,8);
            $image=Image::open(ROOT_PATH.'public/static/uploads/big/'.$name);
            if(!file_exists(ROOT_PATH.'public/static/uploads/small/'.$path)){
                mkdir(ROOT_PATH.'public/static/uploads/small/'.$path);
            }
            $image->crop(100,100,0,0)->save(ROOT_PATH.'public/static/uploads/small/'.$name);
            $list['goods_img']=$name;
            $list['goods_thumb']=ROOT_PATH.'public/static/uploads/small/'.$name;
            $data=Db::name('goods')->insert($list);
            if($data){
                $this->redirect('index');
            }
        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 搜索
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function search()
    {

            $name=input('filter_name');
            $sn=input('filter_sn');
            $price_start=input('filter_start');
            $price_end=input('filter_end');
            if($name!=''&& $sn==''&& $price_start==''&& $price_end==''){
                $list=Db::name('goods')
                    ->where(['goods_name'=>$name,'is_delete'=>0])
                    ->select();
                return $this->fetch('index',['list'=>$list]);
            }elseif($name==''&& $sn!=''&& $price_start==''&& $price_end==''){
                $list=Db::name('goods')
                    ->where(['goods_sn'=>$sn,'is_delete'=>0])
                    ->select();
                return $this->fetch('index',['list'=>$list]);
            }elseif($name==''&& $sn==''&& $price_start!=''&& $price_end!=''){
                $list=Db::name('goods')
                    ->where(['is_delete'=>0])
                    ->where('shop_price','between',"$price_start,$price_end")
                    ->select();
                return $this->fetch('index',['list'=>$list]);
            }elseif($name!=''&& $sn!=''&& $price_start==''&& $price_end==''){
                $list=Db::name('goods')
                    ->where(['is_delete'=>0,'goods_name'=>$name,'goods_sn'=>$sn])
                    ->select();
                return $this->fetch('index',['list'=>$list]);
            }elseif($name!=''&& $sn!=''&& $price_start!=''&& $price_end!=''){
                $list=Db::name('goods')
                    ->where(['is_delete'=>0,'goods_name'=>$name,'goods_sn'=>$sn])
                    ->where('shop_price','between',"$price_start,$price_end")
                    ->select();
                return $this->fetch('index',['list'=>$list]);
            }else{
                $this->redirect('index',[],302,['message'=>'搜索不符合条件']);
            }
            /*$sql=[];
            if(!empty($name)){
                $sql[]=['goods_name'=>$name];
            }
            if(!empty($sn)){
                $sql[]=['goods_sn'=>$sn];
            }*/







    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit()
    {
            $id=input('id');
            $request=request();
        if($request->isGet()){
            $data=Db::name('goods_type')->select();
            $brand=Db::name('goods_brand')->select();
            $category=Db::name('goods_category')->select();
            $list=Db::name('goods')->where('id',$id)->find();
            return $this->fetch('edit',['list'=>$list,'data'=>$data,'brand'=>$brand,'category'=>$category]);
        }else if($request->isPost()){
            $tmp=$_FILES['goods_img']['tmp_name'];
            if(!empty($tmp)){
                $list=request()->post();
                $list['promote_start_date']=strtotime($list['promote_start_date']);
                $list['promote_end_date']=strtotime($list['promote_end_date']);
                $list['add_time']=time();
                $file=request()->file('goods_img');
                $info=$file->move(ROOT_PATH.'public/static/uploads/big/');
                $name=$info->getSaveName();
                $path=substr($name,0,8);
                $image=Image::open(ROOT_PATH.'public/static/uploads/big/'.$name);
                if(!file_exists(ROOT_PATH.'public/static/uploads/small/'.$path)){
                    mkdir(ROOT_PATH.'public/static/uploads/small/'.$path);
                }
                $image->crop(100,100,0,0)->save(ROOT_PATH.'public/static/uploads/small/'.$name);
                $list['goods_img']=$name;
                $list['goods_thumb']=ROOT_PATH.'public/static/uploads/small/'.$name;
                $data=Db::name('goods')->where('id',$id)->update($list);
                if($data){
                    $this->redirect('index');
                }
            }else{
                $list=request()->post();
                $list['promote_start_date']=strtotime($list['promote_start_date']);
                $list['promote_end_date']=strtotime($list['promote_end_date']);
                $list['add_time']=time();
                $data=Db::name('goods')->where('id',$id)->update($list);
                if($data){
                    $this->redirect('index');
                }
            }
        }
    }

    /**
     * 更改精品状态
     *
     */
    public function best()
    {
        $status=input('status');
        $id=input('id');
        if(1==$status){
            Db::name('goods')->where(['id'=>$id])->update(['is_best'=>0]);
        }else{
            Db::name('goods')->where(['id'=>$id])->update(['is_best'=>1]);
        }
        $this->redirect('index');
    }

    /**
     * 更改热销状态
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function hot()
    {
        $status=input('status');
        $id=input('id');
        if(1==$status){
            Db::name('goods')->where(['id'=>$id])->update(['is_hot'=>0]);
        }else{
            Db::name('goods')->where(['id'=>$id])->update(['is_hot'=>1]);
        }
        $this->redirect('index');
    }
    /**
     * 更改新品状态
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function goodsNew()
    {
        $status=input('status');
        $id=input('id');
        if(1==$status){
            Db::name('goods')->where(['id'=>$id])->update(['is_new'=>0]);
        }else{
            Db::name('goods')->where(['id'=>$id])->update(['is_new'=>1]);
        }
        $this->redirect('index');
    }


    /**
     * 选中删除
     *
     */
    public function mutildel(){
        //删除选中id
        $id=input('selected/a',[]);
        for ($a=0;$a<count($id);$a++){
            $delete=Db::name('goods')->where('id',$id[$a])->update(['is_delete'=>1]);
        }
        if($delete){
           $this->redirect('index');
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 删除一条
     *
     */
    public function delete(){
        $id=input('id');
        if(isset($id)){
            $delete=Db::name('goods')->where(['id'=>$id])->update(['is_delete'=>1]);
            if($delete){
                $this->redirect('index');
            }else{
                $this->error('删除失败');
            }
        }else{
            $this->error('ID不存在');
        }
    }
    /**
     * 排序
     */
    public function order(){
        $status=input('status');
        if(1==$status){
            $list=Db::name('goods')->where(['is_delete'=>0])->order('id')->select();
        }elseif(2==$status){
            $list=Db::name('goods')->where(['is_delete'=>0])->order('id','desc')->select();

        }
        return $this->fetch('index',['list'=>$list]);

    }
}
