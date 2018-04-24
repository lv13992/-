<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate{
    protected $rule = [
        'name'=>'require|max:25',
        'user_name'=>'require|max:25',
        'password'=>'require',
        'id_number'=>'require',
        'tel'=>'require|number|length:11',
        'email'=>'require|email',
        'pw_answer'=>'require',
        'pw_question'=>'require',
        'area'=>'require'
    ];
    protected $field = [
        'name'=>'用户名',
        'user_name'=>'用户真实名',
        'password'=>'密码',
        'id_number'=>'身份证号',
        'tel'=>'电话',
        'email'=>'邮箱',
        'pw_answer'=>'密码答案',
        'pw_question'=>'密码问题',
        'area'=>'详细地址'
    ];

}