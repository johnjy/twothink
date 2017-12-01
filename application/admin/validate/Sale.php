<?php
namespace app\admin\validate;

use think\Validate;

class Repair extends Validate{

    protected $rule=[
      ['title','require'],
      ['tel','require'],
      ['price','require'],
      ['sale','require'],
      ['intro','require'],
      ['content','require'],
    ];


}