<?php

// header('content-type:text/html;charset=gb2312');
/**
 * @Author: superking
 * @Date:   2017-07-27 11:00:29
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-27 14:44:24
 */

//运算
$a = 1;
echo -$a;

$a = 87;
$b = $a%7;
echo $b;//3

// += -+ /= *= %=
$a += 5;
$a = $a + 5;

$b %= 7;
echo $b;

echo "<hr>";
// 00000001 = 1
// << 左移 往高位
// 00000010 = 2
// >> 右移 往地位

$a = 1;
$b = $a<<3;
echo "$b".'<br>';
//取反
$a = 10;
$b = ~$a;
echo $b;

//&  与
$a = 3;//00000011
$b = 2;//00000010
$c = $a&$b;
echo $c;

// | 或
$a = 3;//00000011
$b = 4;//00000100
       //00000111
$c = $a | $b;
echo "$c";

//^ 异或
$a = 3;//00000011
$b = 2;//00000010
$c = $a^$b;//1
echo "$c";

//判断的事情,比较运算符,
$a = '1';
$b = 1;
if ($a == $b) {
    echo '相等';
}

//类型和数值
if ($a === $b) {
    echo '全等';
}

$a = 'a';
$b = 'b';
//比较的askii码 a:65 b:66
if ($a<$b) {
    echo '成立';
}else {
    echo'不成立';
}

//不等 <> !=
$a = 1;
$b = 2;
if ($a <> $b) {
    echo 'a 和 b 不相等';
}

//错误控制
//@ 抑制报错
$a = array();

@$b = $a['a'];

if (@$a['a']) {

}

// 执行运算符
//echo `ipconfig`;
//通过函数的方式执行名利
// echo shell_exec('dir');

//自增,自减
echo '<hr>';
$a = 0;
$a++;//自己增加1
echo $a;
$a--;//自己减1
echo $a;


echo '<hr>';
// 前置 直接加1
$b = 10;
echo ++$b;//11

// 后置,执行完语句再加1
$b = 10;
echo $b++;//10
echo $b;

//逻辑运算符
// and &&  逻辑与
// or  ||  逻辑或
// xor     逻辑异或
// not !   逻辑非

echo '<hr>';
var_dump(true and true); //true
var_dump(false and true); //false
var_dump(true && true); //true
var_dump(false && true);//false

echo '<hr>';
var_dump(true or true);//true
var_dump(true or false);//true
var_dump(false or false);//false

echo '<hr>';
//异或 不一样的才为真
var_dump(true xor true);//false
var_dump(true xor false);//true
var_dump(false xor false);//false

echo'<hr>';
var_dump(!true);//false
var_dump(!false);//true

//字符串链接符号 .
echo '<hr>';
$a = '我是一个字符串';
$b = 10;
$c = $a.$b;
echo $c;//

//等效代码
$c .= 'wo shi you zhui jia d  zi fu chuan ';
$c = $c.'wo shi you zhui jia d  zi fu chuan ';
echo $c;