<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate{

    //验证规则
    protected $rule=[
        'user_grade_id'=>'require',
        'name'=>'require',
        'user_name'=>'require',
        'password'=>'require',
        'id_number'=>'require',
        'tel'=>'require',
        'email'=>'require',
        'sex'=>'require',
        'pw_answer'=>'require',
        'pw_question'=>'require',

    ];
    //验证字段名
    protected $field=[
        'user_grade_id'=>'用户组id',
        'name'=>'用户名',
        'user_name'=>'用户真实姓名',
        'password'=>'密码',
        'id_number'=>'身份证号',
        'tel'=>'电话',
        'email'=>'邮箱',
        'sex'=>'性别',
        'pw_answer'=>'密码答案',
        'pw_question'=>'密码问题',

    ];
}