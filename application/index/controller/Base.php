<?php

namespace app\index\controller;
use think\Controller;
class Base extends Controller{

    public function initialize()
    {

        $cates = model('Category')->order(['sort' => 'asc'])->select();
//        $topArticles = model('Article')->where('atop', 1)->limit(10)->select();
        $shareData = [

            'cates' => $cates,

        ];
        $this->view->share($shareData);
    }
    //给导航模板赋值

}