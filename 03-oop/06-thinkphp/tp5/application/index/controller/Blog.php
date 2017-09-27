<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/27
 * Time: 17:11
 */

namespace app\index\controller;


class Blog {
    public function index(){
        return 'index-blog-index';
    }
    public function hello($id= 0){
        dump(url('/index/blog/hello','id=1000'));
        return "index-blog-hello参数:{$id} ";
    }
    public function show($id='0'){
        dump(url('index/blog/show','id=100'));
        return "显示blog id={$id}";
    }

}