<?php
namespace app\common\model;
use think\Model;

class Category extends Model{
    //软删除
//    use SoftDelete;

    public function add($data){
        //校验
        $validate=new \app\common\validate\Category();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }
        //
        $result=$this->allowField(true)->save($data);
        if($result){
            return 1;

        }else{
            return "添加失败";
        }
    }

    public function edit($data){

        $validate=new \app\common\validate\Category();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
        $cateInfo=$this->find($data['id']);
        $cateInfo->catename=$data['catename'];
        $result=$cateInfo->save();

        if($result){
            return 1;

        }else{
            return "修改失败";
        }
    }

    public function del($data){
        $cateInfo=$this->find($data['id']);
        $result=$cateInfo->delete();
        if($result){
            return 1;

        }else{
            return "删除失败";
        }

    }

}
?>