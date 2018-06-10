<?php

namespace app\admin\controller;

use think\Controller;

class Article extends Base
{
    //
    public function articleList(){
        $where=[];
        $catename=null;
        if(input('?cateid')) {
            $where = [
                'cateid' => input('cateid')
            ];
            $catename = model('Article')->where('id', input('cateid')->value('catename'));

        }
        //$articles = model('Article')->where($where)->with('cate')->order([ 'create_time' => 'desc']);
        //$articles=model('Article')->order(['create_time'=>'desc']);
        $articles=model('Article')->select();
        //dump($articles);
        $viewData=[
          'articles'=>$articles,
          'catename'=>$catename,
        ];
        $this->assign($viewData);
        return view();
    }
    public function articleAdd(){
        if(request()->isPost()){
            $data=[
                'title'=>input('post.article_name'),
                'author'=>input('post.article_author'),
                'cate_id'=>input('post.article_cate_id'),
                'desc'=>input('post.article_digest'),
                'content'=>input('post.article_content'),
            ];
            $result=model('Article')->add($data);
            if($result==1){
                $this->success('文章添加成功','admin/article/articlelist');
            }else{
                $this->error($result);
            }
        }
        $cates=model('Category')->select();//查询所有导航;
        $viewData=[
            'cates'=>$cates,
        ];
        $this->assign($viewData);
        return view();
    }
    public function articleSort(){}
    public function articleEdit(){
        if(request()->isPost()){
            $data=[
                'id'=>input('post.id'),
                'title'=>input('post.article_name'),
                'author'=>input('post.article_author'),
                'cate_id'=>input('post.article_cate_id'),
                'desc'=>input('post.article_digest'),
                'content'=>input('post.article_content'),
            ];
            $result = model('Article')->edit($data);
            if($result == 1){
                $this->success('文章编辑成功','admin/article/articlelist');
            }else{
                $this->error($result);
            }
        }
        $cates = model('Category')->select();

        $articleInfo = model('Article')->with('cate')->find((input('id')));

        $viewData=[
            'cates'=>$cates,
            'articleInfo'=>$articleInfo,
        ];
        //dump($viewData);

        $this->assign($viewData);
        return view('article_edit');

    }
    public function articleDel(){
        if(request()->isPost()){
            $data=['id'=>input('post.id')];
        }
        $result=model('Article')->del($data);
        if($result==1){
            $this->success('删除修改成功','admin/article/articlelist');
        }else{
            $this->error($result);
        }

    }
}
