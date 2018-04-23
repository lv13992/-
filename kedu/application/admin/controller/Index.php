<?php

/**
 *  
 * @file   Index.php  
 * @date   2016-8-23 16:03:10 
 * @author Zhenxun Du<5552123@qq.com>  
 * @version    SVN:$Id:$ 
 */  

namespace app\admin\controller;

use app\admin\model\AdminUser;
use think\Db;

class Index extends Base{
    /**
     * 后台首页
     */
    public function index(){
        $yesterday = strtotime(date('Y-m-d',strtotime('-1 day')));
        $day = strtotime(date('Y-m-d'));

        //查询评论的数量
        $comment = Db::name('user_comment')->where('add_time','between',[$yesterday,$day])->count();
        $commentsum = Db::name('user_comment')->count();

        $cper = ($comment/$commentsum)*100;//评论增长的百分比

        //查询注册用户数量
        $user = Db::name('user')->count();
        //新生成的订单数量
        $order = Db::name('order_info')->where('create_time','between',[$yesterday,$day])->count();

        if(!$order===0){
            $ordersum = Db::name('order_info')->count();
            $oper = ($order/$ordersum)*100;  //用户增长的百分比
        }else{
            $oper = 0;
        }
        //商品数量
        $goods = Db::name('goods')->count();
        //品牌数量
        $brand = Db::name('goods_brand')->count();



        //注册变量到模板
        $this->assign(['comment'=>$comment,'cper'=>$cper]);
        $this->assign(['user'=>$user]);
        $this->assign(['order'=>$order,'oper'=>$oper]);
        $this->assign(['goods'=>$goods]);
        $this->assign(['brand'=>$brand]);
        return $this->fetch();
    }
    
    
}