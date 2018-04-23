<?php
namespace app\admin\validate;

use think\Validate;

class GoodsCategory extends Validate{

    //验证规则
    protected $rule=[
        'cat_name'=>'require',
        'cat_desc'=>'require',
    ];
    //验证字段名
    protected $field=[
        'cat_name'=>'分类名称',
        'cat_desc'=>'分类描述',

    ];
}
