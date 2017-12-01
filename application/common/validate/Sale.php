<?php
namespace app\common\validate;

use think\Validate;

class Sale extends Validate{

    protected $rule=[
      ['title','require'],
      ['tel','require'],
      ['price','require'],
      ['sale','require'],
      ['intro','require'],
      ['content','require'],
      ['status','require'],
      ['name','require'],

    ];
}