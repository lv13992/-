<?php



namespace app\admin\controller;

use \app\admin\model\AdminPrivilage as APModel;
class AdminPrivilage extends Base{

    public function index(){


        $model = new APModel();
        $where = [
            'id'=>1
        ];
        $id = input('id');
        if(!empty($id)){
            $where = [
                'id'=>$id
            ];
        }

        $a = db('admin_group')->field('privilage_id')->where($where)->find();
        $a = explode(',',$a['privilage_id']);
        $this->assign('privilage',$a);
        $list = $model->field('id,parent_id,p_name')->select();
        $this->assign('a',$id);
        return view('admin/admin_privilage/index',['list'=>$list]);
    }
    public function privilage(){
        $data = input('post.');
        $id = $data['id'];
        $where = [
            'id' => $data['u_id']
        ];
        $a = db('admin_group')->field('id,privilage_id')
            ->where($where)
            ->find();
        $b = explode(',',$a['privilage_id']);
        if(in_array($id,$b)){
            foreach ($b as $k=>$v){
                if($v==$id){
                    unset($b[$k]);
                }
            }
            $p_id = implode(',',$b);
        }else{
            $p_id = $a['privilage_id'];
            $p_id .= ','.$id;
        }
        $privilage = [
            'privilage_id'=>$p_id
        ];
        $a = db('admin_group')->where('id',$a['id'])->update($privilage);
        return $a;
    }
}
