<?php
namespace app\index\controller;

use think\Config;
use think\Controller;
use think\Db;
use think\Env;

class Index extends Controller
{
    public function _initialize()
    {
        echo 'init<br/>';
    }

    public function index($name = 'php')
    {
        return 'index';
//        return config();
    }

    public function hello(){

        //从数据库取数据并显示出来
        //find会查询一条数据
        $data = Db::name('data')->find();

        $this->assign('data',$data);
        //通过fetch加载模板文件
        return $this->fetch();
        //return 'this is hel lo method';
    }

    public function demo($name='php',$pwd ='123456'){
        return "demo 参数:{$name}{$pwd}";
    }

    public function pattern($id = 1,$name='php'){
        return "id:{$id} name:{$name}";
    }


}
