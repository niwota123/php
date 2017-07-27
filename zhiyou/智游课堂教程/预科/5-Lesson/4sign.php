<?php
//1,算数运算符
//+ - * / %
$a = 23;
$b = 34;
$c = $a*$b;

//取模
$a = 23;
$b = 3;
$c = $a%$b;

echo $c;

//2,赋值运算符 = ; += ; .=;
$a = 10;
$a += 10; //等价于 $a = $a+10; += -+ *= /=
echo $a;//20

$c = 'hello';
$c .= "php";//等价于 $c = $c."php";
echo $c;//hello php

//3,比较运算符 > < >= ==
$a = 10;
$b = 9;
$c = $a>$b;
var_dump($c);//true

if ($a>$b) {
	echo "a 值大";
}

//== 等于 如果类型转换后 a等于b 就是真
$a = '1';
$b = 1;
if ($a == $b) {
	echo "a 和 b 值相等";
}

//=== 全等 如果$a等于$b并且,类型相等
$a = '1';
$b = 1;
if ($a === $b) {
	echo "a 和 b 值相等";
}

echo "<hr>";

//4,递增 递减 运算符
//++ 递增
$a = 10;
//前置 ++$a;  先+1 在执行语句
echo "<br>前置".++$a;//11

//后置 $a++;  先执行语句,在+1
echo "<br>后置".$a++;//11
echo $a;//12


//-- 递减
$b = 10;
echo "<br>后置".$b--;//10
echo "<br>前置".--$b;//8

// 练习:
$a = 6;
$b = 7;

$c = $a++ + $a++;//a:7
$c = $a++ + ++$a;//a:10
$c = $a++ + ++$b;//a:10 b:8
$c = $a++ + $b++;//a:11 b:8
echo $c.'<br>';//19
echo $a.'<br>';//12
echo $b.'<br>';//9

//5,逻辑运算符 与(and &&) 或(or ||) 非(not !)
echo "<hr>";//hr 是条线
$a = true;
if (!$a) {	
	echo "true取反的结果";
}else{
	echo "false";
}

//与 and 两个条件同时满足,整个逻辑条件才满足
$a = true;
$b = false;

if ($a && $b) {
	echo "<br>a 和 b 都为true";
}

//或 or 两个条件只要满足一个,整个逻辑才满足
if ($a||$b)	 {
	echo "<br>a 或者b有一个条件满足";
}

//小练习:
//登录例子
//------正确的-数据库中
$user = 'admin';
$pwd = '123456';
//------用户输入的
$userInput = '';
$pwdInput = '';

//登录逻辑-简单的
if ($userInput ==$user && $pwdInput==$pwd) {
	echo "登录成功";
}
//完整的
if ($user == $userInput) {
	//用户已经存在
	if ($pwd == $pwdInput) {
		echo "登录成功";
	}else{
		echo "密码错误";
	}

}else{
	echo "用户不存在";
}

//练习:根据不同的分数区间,给考试成绩评级
//0-59   学渣
//60-70  及格
//70-80  中等
//80-90  良好
//90-100 学霸
$inputSource = '';//用户输入0-100之间的数
//写一个逻辑根据用户输入的不同分数,给他返回不同的评级

if ($inputSource>=0&&$inputSource<=59) {
	echo "学渣";
}elseif($inputSource>=60&&$inputSource<=70) {
	echo "及格";
}elseif($inputSource>=70&&$inputSource<=80) {
	echo "中等";
}elseif($inputSource>=80&&$inputSource<=90) {
	echo "良好";
}elseif($inputSource>=90&&$inputSource<=100) {
	echo "学霸";
}else{
	echo "缺考";
}





?>