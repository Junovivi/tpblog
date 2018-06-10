<?php

namespace app\admin\controller;
use think\Controller;

class Category extends Base{

    public function cateList(){
        $cates = model('Category')->order(['sort'])->paginate(50);
        $viewData=[
            'cates'=>$cates,
        ];
        $this->assign($viewData);

        return view();
    }
    public function cateAdd(){
        if(request()->isPost()){
            $data=[
                'catename'=>input('post.catename'),
                'sort'=>input('post.sort'),
            ];
            $result=model('Category')->add($data);
            if($result==1){
                $this->success('栏目添加成功','admin/category/catelist');
            }else{
                $this->error($result);
            }
        }
        return view();

    }

    public function cateSort(){

    }
    public function cateEdit(){
        if(request()->isPost()){
            $data=[
                'id'=>input('post.id'),
                'catename'=>input('post.catename'),
                'sort'=>input('post.sort'),
            ];
            $result=model('Category')->edit($data);
            if($result==1){
                $this->success('栏目修改成功','admin/category/catelist');
            }else{
                $this->error($result);
            }
        }
        $cateInfo=model('category')->find(input('id'));
        $viewData=[
            'cateInfo'=>$cateInfo
        ];
        $this->assign($viewData);
        return view();

    }
    public function cateDel(){
        if(request()->isPost()){
            $data=['id'=>input('post.id')];
        }
        $result=model('Category')->del($data);
        if($result==1){
            $this->success('删除修改成功','admin/category/catelist');
        }else{
            $this->error($result);
        }

    }

}
?>