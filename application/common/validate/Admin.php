<?php
/**
 * Created by PhpStorm.
 * User: Jo Tang
 * Date: 2018/6/2
 * Time: 17:24
 */

namespace app\common\validate;


use think\Validate;

class Admin extends Validate
{
    protected $rule=[
        'username|账号' => 'require',
        'password|密码' => 'require',
        'password2|确认密码'=>'require|confirm:password',
        //'nickname|昵称'=>'require',

    ];
    //登录验证
    public function sceneLogin(){
        return $this->only(['username','password']);

    }
    //注册验证
    public function sceneRegister(){
        return $this->only(['username','password','password2']);
    }

}