<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//Route::get('think', function () {
//    return 'hello,ThinkPHP5!';
//});
//
//Route::get('hello/:name', 'index/hello');
//
//return [
//
//];
Route::rule('/','index/index/index');
Route::rule('article-<id>','index/article/article','get');
Route::rule('login','index/index/login','get|post');



Route::group('admin',function(){
    Route::rule('/','admin/index/login','get|post');


    Route::rule('register','admin/index/register','get|post');
    Route::rule('index','admin/home/index','get');
    Route::rule('logout','admin/index/logout','post');

    Route::rule('catelist','admin/category/catelist','get');
    Route::rule('cateadd','admin/category/cateadd','get|post');
    Route::rule('cateedit/[:id]','admin/category/cateedit','get|post');
    Route::rule('catedel','admin/category/catedel','get|post');

    Route::rule('articlelist','admin/article/articlelist','get');
    Route::rule('articleadd','admin/article/articleadd','get|post');
    Route::rule('articleedit/[:id]','admin/article/articleedit','get|post');


    Route::rule('commentlist','admin/comment/commentlist','get');
    //Route::rule('comment','admin/comment/commentadd','get|post');
    Route::rule('commentdel','admin/comment/commentdel','get|post');

});



