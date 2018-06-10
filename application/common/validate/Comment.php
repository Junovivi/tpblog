<?php
/**
 * Created by PhpStorm.
 * User: Jo Tang
 * Date: 2018/6/5
 * Time: 15:03
 */
namespace app\common\validate;

use think\Validate;

class Comment extends Validate{

    protected $rule=[

    ];

    public function sceneAdd()
    {
        return $this->only([]);
    }
}