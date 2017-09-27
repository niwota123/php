<?php
namespace app\index\controller;

use think\Config;
use think\Controller;
use think\Db;
use think\Env;

class Index extends Controller
{
    public function index($name = 'php')
    {


        return $name;
        //环境配置
//        return dump($_ENV);

        //return dump(Env::get('database.user'));
        //动态配置
//        Config::set('app_test','test','user');
//        Config::set('app_test2','test2','user');
//        Config::set('app_test3','test3','user');
//        Config::set('app_test4','test4','user');

//        return dump(Config::get('','user'));
//        return dump(config('',null,'user'));
//
//        return dump(config('app_debug'));



        //return dump(config('?a.arr'));
        //return dump(Config::has('a.arr'));
//        Config类
        //return dump(Config::load('config'));
        //return dump(config());
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
