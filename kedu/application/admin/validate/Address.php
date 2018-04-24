<?php
namespace app\admin\validate;

use think\Validate;

class Address extends Validate{
    protected $rule = [
        'consignee' => 'require',
        'address' => 'require',
        'tel' =>'require|number|length:11'
    ];
    protected $field = [
        'consignee' => '收货人姓名',
        'address' => '详细地址',
        'tel' => '电话格式'
    ];

}