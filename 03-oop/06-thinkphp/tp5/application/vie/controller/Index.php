<?php
namespace app\vie\controller;

use think\Controller;
use think\Request;
use think\View;

class Index extends Controller
{
    public function index()
    {
        //[助手函数]
        //1,访问view跟目录模板 view\view1.html
        //return view('\view1');
        //2,访问index控制器下 view\index\view2.html
        //return view('view2');
        //3,默认访问 view\index\index.html
        //return view();
        //4,跨控制器(不一定要真的存在控制器,只是有目录就可以了)
        //\view\demo\view3.html
        //return view('demo/view3');
        //5,跨模块 user\view\index\view4.html
        //return view('user@index/view4');
        //6,自定义路径 (入口文件同目录下template/vie/view5.html)
        //return view('./template/vie/view5.html');

        //[继承 thinkphp\Controller fetch]
        //用法根助手函数用法一样
        //return $this->fetch();

        //[模板赋值]
        //1,assign
        //单个
        //$this->assign('title','模板赋值标题');
        //批量
        //$this->assign(['name'=>'小明','age'=>'20']);
        //return $this->fetch();

        //2,fetch传参
        //return $this->fetch('index',['title'=>'标题','name'=>'小明','age'=>'20']);

        //3,view传参 (同上)
        //4,share()方法
        //View::share(['title'=>'标题','name'=>'小明','age'=>'20']);
        //return view();

        //5,直接view对象赋值
        $this->view->title = 'biaoti';
        $this->view->name='小张';
        $this->view->age='22';
        return $this->fetch();
    }

    //模板中使用函数
    public function useFun(){

        return $this->fetch('index',['name'=>'hello','title'=>'赋值标题','age'=>'2']);
    }


    public function showData(){
        return [['name'=>'aaaa']];
    }
    //使用layout布局
    public function useLayout(){

        return $this->fetch('demo/view3');
        //return $this->fetch('home');
    }



    //使用模板继承
    public function useBlock(){
        //view/block/index
        return $this->fetch('block/index');
    }

    public function showCaptcha(){
        return $this->fetch('/captcha');
    }

    public function validateCaptcha(){
        $rule = [];
        $res = $this->validate($this->request->param(),
            ['captcha_code|验证码'=>'require|captcha']);
        if (true !== $res){
            $this->view->error = $res;
        }
//        $code = $request->param('captcha_code');
//        if(!captcha_check($code)){
//            $this->view->error = '验证码错误';
//        };
        return $this->fetch('/captcha');
    }
}
