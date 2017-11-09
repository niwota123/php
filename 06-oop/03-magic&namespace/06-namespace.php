<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 16:25
 */

namespace Myproject;

const PI = 3.14;

function testFnc(){
 echo 'myProject function<br/>';
}

class TestClass{
    function __construct()
    {
        echo 'myProject class<br/>';
    }
}

testFnc();//调用MyProject的方法;

namespace OtherProject;

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


//就近原则
testFnc();//调用OtherProject的方法;

