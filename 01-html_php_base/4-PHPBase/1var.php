<?php
/**
 * @Author: superking
 * @Date:   2017-07-26 09:52:58
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-26 11:17:45
 */
//PHP中的变量
//1--
$aBoy;
// $1Boy; 不行
// $@Boy; 不行
// $this;  关键字不行
$_a_boy;

$_A_BOY;

// $帅哥 = '我是帅哥';
// echo $帅哥;
$a;
$a = 1;
$a = $b = $c =1;
echo $a,$b,$c ;//,同时输出多个

//错误
echo $abc;
//变量未定义错误
//Undefined(没有定义)
//variable(变量)
// Undefined variable: abc in C:\wampstack-5.6.19-0\apache2\htdocs\Lesson\4-PHPBase\1var.php on line 26

//解析错误:原因代码语法错误
//1,没写;
//2,小()
//3,少{}
//Parse(解析) error: syntax(语法) error, unexpected(意外) end of file, expecting(期望) ',' or ';' in C:\wampstack-5.6.19-0\apache2\htdocs\Lesson\4-PHPBase\1var.php on line 30
//

//可变变量
$a = 'b';
$b = 'c';
$c = 'd';

echo $$$a;// $c d

${$a} = $b;

${${$a}} = $c;

$a = 'world';

$hello = '你好';
$world = '世界';

${$a} = '你不好';

echo $hello;

//取地址符号&
$a = 'hello';

$b = &$a;

$c = &$a;

$d = &$a;

$d = '你好';

echo $a;//你好

$a = 'hello';
$b = $a;
$b = '你好';

echo $a;//hello


// function test(&$var){
//     $var = 'hello';
// }

// $a = '你好';
// test($a);

// echo $a;//












