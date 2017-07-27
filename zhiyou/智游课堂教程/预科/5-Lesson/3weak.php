<?php
//php 弱类型机制
$a = 1;
$a = 'a';

//$a 到底是什么数据类型
//PHP不会严格的来检查传入的变量值的类型,会根据变量的值来动态的改变变量数据类型
//PHP变量的类型可以自由转换

//int->bool
$b = 0; //等价于 bool的 false
$b = 1; //等价于 bool的 true

if ($b) {
	echo "我是真值";
}

//string->bool
$b = ''; //空的字符串等价于 false
$b = 'a';//非空字符串等价于 true
if ($b) {
	echo "我是一个非空字符串";
}

?>