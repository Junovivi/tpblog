<?php
namespace app\admin\controller;
use think\Controller;

class Comment extends Base{

    public function commentList(){

        $comments = model('Comment')->order(['create_time'])->paginate(50);

        $viewData=[
            'comments'=>$comments,
        ];
        $this->assign($viewData);

        return view();

    }

    public function commentDel(){

    }
}