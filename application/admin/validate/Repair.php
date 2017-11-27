<?php
namespace app\admin\validate;

use think\Validate;

class Repair extends Validate{

    protected $rule=[
      ['name','require','姓名不能为空'],
      ['tel','require','电话不能为空'],
      ['address','require','地址不能为空'],
      ['problem','require','问题不能为空'],
    ];
}