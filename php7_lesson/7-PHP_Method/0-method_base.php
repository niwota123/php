<?php
/**
 * @Author: superking
 * @Date:   2017-07-31 11:38:29
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-31 14:35:27
 */
// $a = 2;
// if ($a == 1) {
//     echo '<br>后面的我就不管啦';
//     return;
// }

//函数
//为了解决程序开发过程中,很多重复代码无法复用的问题,设计了,函数.
//函数的目的,将重复代码封装成一个方法,在需要的地方直接调用(不需要在写一遍)
//例子:
//1,输入0-100以内的数
// for ($i=0; $i <100 ; $i++) {
//     echo $i;
// }
//1,输入100-200以内的数 --改代码


//用到函数,相同的代码,封装函数中
//函数的定义语法
// function(方法) 方法名字 (参数1,参数2){}


//方法的功能,输出100-200之间的数
function showNum ($begin,$end){

    for ($i=$begin; $i <$end ; $i++) {
        echo $i.'<br>';
    }

}


//以后,只要用到这个功能,只需要调用方法
//方法的调用,语法: 方法名();

echo 'aaa<br>';
//showNum(0,100);//0-100
showNum(100,200);//100-200


//定义加法的方法
function sum($a,$b)
{
    echo $a + $b;
}

//函数需要有个,结果返回出来

function add($a,$b){
    $c = $a+$b;
    //方法内部返回一个结果出去
    //默认每个方法都有返回结果,不写返回结果null
    return  $c;
}

$a = add(11,33);
echo $a;//44



//命名
function _aMehthod (){

}

function aMehthod(){

}

function bMehthod($var){

}

function cMehthod($var){
    return true;
}


//函数调用
function test (){
    echo '<br />我是test函数';
}
//不区分大小写
Test();
TEST();
test();

// function test(){
//     echo '<br> hello';
// }
/*
Fatal error: Cannot redeclare test() (previously declared in C:\wampstack-5.6.19-0\apache2\htdocs\Lesson\7-PHP_Method\0-method_base.php:83) in C:\wampstack-5.6.19-0\apache2\htdocs\Lesson\7-PHP_Method\0-method_base.php on line 92
 */

//函数命名是,规避系统已经存在的函数名
// function md5(){
//     echo '<br />md5';
// }

function testReturn(){
    //return true;
    //return 1;
    //return '我是字符串';
    return ['a','b','c'];
}

var_dump(testReturn());//

