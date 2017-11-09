<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/27
 * Time: 16:27
 */

namespace app\index\controller;


class User {

    public function show($id = '0',$name=''){
        return "id={$id} name={$name}";
    }

    public function getInfo(){
        return 'getInfo';
    }
    public function getPhone(){
        return 'getPhone';
    }

    public function postPhone(){
        return 'postPhone';
    }

    public function putInfo(){
        return 'put----info';
    }
}