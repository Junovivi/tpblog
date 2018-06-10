<?php

namespace app\common\validate;

use think\Validate;

class Article extends Validate{

    protected $rule=[
        'title' => 'require',
        'author' => 'require',
        'cate_id'=>'require',
        'sort' => 'require|number|between:1,9999',
        'desc' => 'require',
        'content' => 'require',
    ];

    public function sceneAdd()
    {
        return $this->only(['title','author','cate_id','desc','content']);
    }
    public function sceneEdit()
    {
        return $this->only(['title','author','cate_id','desc','content']);
    }
}