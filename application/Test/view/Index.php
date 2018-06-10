<?php
    namespace app\index\controller;
    use think\Request;

    class Index{
        public function hello($name='World'){
            $request=Request::instance();
            echo 'url'.$request->url().'<br/>';
            return 'Hello,'.$name.'|';
        }
    }
?>