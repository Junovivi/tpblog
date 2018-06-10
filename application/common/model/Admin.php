<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Admin extends Model
{
    protected $table = 'tp_user';

    //软删除
    use SoftDelete;

    //登录校验
    public function login($data){
        //tp建议校验在控制器内完成，提供了一个快捷校验方法；
        $validate = new \app\common\validate\Admin();
       if(!$validate->scene("login")->check($data)){
           return $validate->getError();
       }
       $result = $this->where($data)->find();
       if($result){
           if($result['status']!=1){
               return "此账户被禁用";
           }
           //1表示用户存在
           $sessionData=[
               'id'=>$result['id'],
               'username'=>$result['username'],

           ];
           session('admin',$sessionData);
           return 1;
       }else{
           return "用户名或密码错误";
       }

    }

    //注册
    public function register($data){
        $validate=new \app\common\validate\Admin();
        if(!$validate->scene('register')->check($data)){
            return $validate->getError();
        }
        //unset('password2');
       $result=$this->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return "注册失败!";
        }

    }



}
