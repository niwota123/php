<?php
/**
 * @Author: superking
 * @Date:   2017-07-26 14:14:49
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-26 15:34:38
 */
//PHP的8大类型
//int
// int 4个字节 32位 2^32 = 42亿

//二进制
// 00000001 1*2^0 = 1
// 00000010 0*2^0 + 1*2^1 =2

//十进制
// 1        1*10^0 = 1
// 2        2*10^0 = 2

//八进制 8进制需要以0开头
// 01       1*8^0 = 1;
// 011      1*8^0 + 1*8^1 =9;

echo 011;//9

//16进制 需要以0x开头
//1 = 0x1   1*16^0 = 1
//9 = 0x9
//10 = 0xa  10*16^0 = 10
//11 = 0xb
//12 = 0xc
//13 = 0xd
//14 = 0xe
//15 = 0xf
//16 = 0x10 0*16^0+1*16^1 = 16

echo 0xf;

//练习
//200
//8进制 16进制
echo 0310;
echo 0xc8;

//浮点
echo 1.1;
var_dump(1.1e300);

//浮点的最大值 1.8e308
//浮点有两种表示法
//1,10进制表示法
//2,科学表示法
//字母e和E  前面表述基数,后面表示10的幂
// [基数] E [10的幂] = 基数*10^幂数
echo 10e1;

//布尔
if (true) {
    echo "真";
}else {
    echo "假";
}

if (false) {
    echo "真";
}else{
    echo "假";
}

//string
echo "<br/>";
echo "string";
echo 'string';
//Heredoc
echo <<<ABC
我是内容,我光荣,哈哈哈!
随便写,想怎么写怎么写.
ABC;

//Nowdoc
echo<<<'AB'
我中间也是内容,
AB;


$a = 'hello';

echo "$a";//hello
echo '$a';//$a

echo "我 \n 学 \r 习 \n PHP \r";

//字符串链接 . 不光可以链接 字符,还可以链接整形,浮点,布尔


$a = <<<a
im is heredoc
a;

echo $a.'我是中文';
$b = true;
echo $a.$b;

$a = 'php';
//PHP引擎的处理方式:尽可能多的往后去取合法的字符,认为取的合法字符越多,变量的含义越明确
echo "{$a}bc";

echo "<br/>";
//{}可以修改字符串的单个字符
$a = 'php';
//查看字符
echo $a{0};//p
echo $a{1};//h
//改 --只能替换一个字符,不能替换成中文
$a{0} = 'a';
echo "$a";
echo "<hr>";
echo $a[0];//a