<?php
/**
 * Created by PhpStorm.
 * User: Jo Tang
 * Date: 2018/6/5
 * Time: 15:03
 */
namespace app\common\validate;

use think\Validate;

class Category extends Validate{

    protected $rule=[
      'catename'=>'require|unique:category',
      'sort'=>'require|number|between:1,9999',
    ];

    public function sceneAdd()
    {
        return $this->only(['catename','sort']);
    }
    public function sceneEdit(){
        return $this->only(['catename','sort']);
    }
}