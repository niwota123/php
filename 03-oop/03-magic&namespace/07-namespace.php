<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 16:35
 */
//全局代码必须在这 namespace{}里面
namespace {

    //调用MyProject空间下的testFnc()方法
    //\MyProject\testFnc();

    //无法调用testFnc();因为全局空间里面没有testFnc()方法
    //testFnc(); // \testFnc()

    class A{
        function __construct()
        {
            echo 'a 类';
        }
    }

    function hello(){
        echo '全局的hello';
    }

    const TT = '全局的常量';
}

namespace MyProject{
    const PI = 3.18;

    function testFnc(){
        echo 'MyProject function<br/>';
    }

    class TestClass{
        function __construct()
        {
            echo 'MyProject class<br/>';
        }
    }


//    对于函数和常量来说，如果当前命名空间中不存在该函数或常量，PHP 会退而使用全局空间中的函数或常量
    hello();
    echo TT;

}

namespace OtherProject{
    const PI = 3.18;

    function testFnc(){
        echo 'OtherProject function<br/>';
    }

    class TestClass{
        function __construct()
        {
            echo 'OtherProject class<br/>';
        }
    }
}


