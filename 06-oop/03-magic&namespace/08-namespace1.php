<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 16:57
 */
namespace one;


require_once '08-namespace2.php';

function Fnc(){
    echo 'one',__FUNCTION__;
}

//use tow\TestClass; //等价于 use tow/TestClass as TestClass

//导入的类
use tow\TestClass as TT;
//导入方法
use function tow\Fnc as towFnc;
towFnc();
//导入常量
use const tow\PI;
echo PI;

new TT();
