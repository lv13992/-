<?php
namespace app\admin\validate;
use think\Validate;
class UserGrade extends Validate{
    protected $rule=[
        'name'=>'require',
        'dis_count'=>'require',
        'point'=>'require'

    ];

    protected $filed=[
        'name'=>'用户等级名',
        'dis_count'=>'折扣率',
        'point'=>'所需积分'
    ];
}




?>