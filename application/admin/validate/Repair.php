<?php
namespace app\admin\validate;

use think\Validate;

class Repair extends Validate{

    protected $rule=[
      ['name','require','姓名不能为空'],
      ['tel','number|length:11','电话号码必须为数字|电话号码位数不对'],
      ['address','require','地址不能为空'],
      ['problem','require','问题不能为空'],
    ];


}