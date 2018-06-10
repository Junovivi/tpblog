<?php
/**
 * Created by PhpStorm.
 * User: Jo Tang
 * Date: 5/31/2018
 * Time: 5:39 PM
 */
namespace app\index\controller;

class Article extends Base{
    public function article(){
        $articleInfo=model('Article')->find(input('id'));
//        $articleInfo->setInc('click');
        $viewData=[
            'articleInfo'=>$articleInfo
        ];
        $this->assign($viewData);
        return view();
    }
}
