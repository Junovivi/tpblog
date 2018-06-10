<?php
namespace app\Test\controller;
use app\Test\model\User as UserMode;

class User{
    //新增数据
    public function add(){
        $user = new UserModel();
        $user->name='cc';
        $user->email="84597159@qq.com";
        $user->birthday=strtotime('1997-09-10');
        if($user->save()){
            return "用户新增成功";
        }else{
            return "用户新增失败";
        }
//        $user['name']='cc';
//        $user['email']='845971519@qq.com';
//        $user['birthday']=strtotime('1997-09-10');
//        if($result=UserModel::create($user)){
//            return "用户新增成功";
//        }else{
//            return "新增出错";
//        }
    }
}