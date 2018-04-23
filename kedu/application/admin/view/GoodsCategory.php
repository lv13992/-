<?php
namespace app\admin\validate;

use think\Validate;

class GoodsCategory extends Validate{

    //验证规则
    protected $rule=[
        'cat_name'=>'require|unique:GoodsCategory',
        'cat_desc'=>'require',
        'show_in_nav'=>'require',
        'is_show'=>'require',
    ];
    //验证字段名
    protected $field=[
        'cat_name'=>'分类名称',
        'cat_desc'=>'分类描述',
        'show_in_nav'=>'是否在导航栏展示',
        'is_show'=>'是否在前台展示'

    ];
}
