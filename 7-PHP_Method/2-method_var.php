<?php
/**
 * @Author: superking
 * @Date:   2017-07-31 16:09:41
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-31 16:32:32
 */
// 作用域

//局部
function  test (){
    // 在方法体声明的,局部变量
    // 作用域:方法体,出了作用域释放
    $a = 'abc';
}

//echo $a;
/*
Notice: Undefined variable: a in C:\wampstack-5.6.19-0\apache2\htdocs\Lesson\7-PHP_Method\2-method_var.php on line 14
 */

//静态变量
function test_static(){
    static $i = 1;//初始化:只初始化一次
    echo '<br>'.$i;
    $i++;
}

test_static();//1
test_static();//2
test_static();//3
test_static();//4


//全局的变量

$a = 'abc';
function test_global(){
    $a = 'aaa';
}
test_global();
echo '<br>'.$a;//abc

//全局变量,作用域是整个脚本
//全局变量不能直接在方法体中使用
//想在方法体中使用全局变量 需要添加关键字 global;
$b = 'abc';
function test_global_b(){
    global $b;//告诉方法体,这个$b是全局$b
    $b = 'bbb';
}
function test_global_bb(){
    global $b,$a;
    $b = 'bbbb'.$a;
}
test_global_b();
test_global_bb();
echo '<br>'.$b;