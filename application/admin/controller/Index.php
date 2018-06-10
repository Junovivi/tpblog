<?php

namespace app\admin\controller;

use think\Controller;
//use app\admin\model\Test as TestModel;

class Index extends Controller
{
    //后台登录
    public function login(){

//        $data=db('tp_blog')->find(1);
//        dump($data);

        if(request()->isAjax()){
            $data=[
                'username'=>input('post.username'),
                'password'=>input('post.password'),
            ];
            $result = model('Admin')->login($data);
                //在admin下没找到model，会去common下找
                //new \app\common\model\Admin()
            if($result == 1){
                $this->success("登录成功！",'admin/home/index');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //注册
    public function register(){
        if(request()->isAjax()){
            $data=[
                'username'=>input('post.username'),
                'password2'=>input('post.password'),
                'password'=>input('post.password2')
            ];
            $result=model('Admin')->register($data);
            if($result==1){
                $this->success("注册成功","admin/index/login");
            }else{
                $this->error($result);
            }

        }
        return view();
    }
    public function logout()
    {
        session(null);
        if (session('?admin.id')) {
            $this->error('退出失败');
        } else {
            $this->success('退出成功', 'admin/index/login');

        }
    }
}
