<?php

namespace app\common\model;

use think\Model;

class Article extends Model
{
    //
    public function add($data){

        $validate=new \app\common\validate\Article();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }
        $result=$this->allowField(true)->save($data);
        if($result){
            return 1;

        }else{
            return "添加失败";
        }
    }

    public function edit($data){

        $validate = new \app\common\validate\Article();
        if (!$validate->scene('edit')->check($data)) {
            return $validate->getError();
        }
        $articleInfo = $this->find($data['id']);

        $articleInfo->title = $data['title'];
        $articleInfo->cateid = $data['cate_id'];
        $articleInfo->author=$data['author'];

        $articleInfo->desc = $data['desc'];
        $articleInfo->content = $data['content'];

        $result = $articleInfo->save();

        if ($result) {
            return 1;
        }else {
            return '文章编辑失败！';
        }
    }

    public function del($data){
        $articleInfo=$this->find($data['id']);
        $result=$articleInfo->delete();
        if($result){
            return 1;
        }else{
            return "删除失败";
        }
    }

    //关联栏目表,一个导航可以有多对文章
    public function cate(){
        return $this->belongsTo('Category','cate_id','id');
    }
}
