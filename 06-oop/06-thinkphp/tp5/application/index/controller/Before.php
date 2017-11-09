<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/28
 * Time: 9:26
 */

namespace app\index\controller;


use think\Controller;

class Before extends Controller {
    protected $beforeActionList = [
        'first',
        'second'=>['except'=>'hello'],
        'three'=>['only'=>'hello,data']
    ];

    //自定义的前置方法
    protected function first(){
        echo 'first<br/>';
    }
    protected function second(){
        echo 'second<br/>';
    }
    protected function three(){
        echo 'three<br/>';
    }

    //对外开放的
    public function hello(){
        $this->success('调用hello成功了',url('index/before/data'));
        return 'hello';
    }

    public function data(){
        //$this->error('错误信息');
        //$this->redirect('index/before/hello');
        return '跳转了data';
    }

    //声明空操作方法
    public function _empty($name){
        return $this->showCity($name);
    }

    public function showCity($city='郑州'){
        return "$city 欢迎你!";
    }

}