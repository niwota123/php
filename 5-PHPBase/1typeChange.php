<?php
/**
 * @Author: superking
 * @Date:   2017-07-27 09:51:18
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-27 10:21:49
 */
//类型转换
$a = 0;

if ($a) {

}else {
    echo "自动转换成bool";
}

echo $a;


$a = '';
if ($a){

}else{
    echo "string -> bool";
}

echo $a;

$a = null;
if ($a) {
    # code...
}else{
    echo "null->bool";
}

echo $a;

$a = array();
if ($a) {
    # code...
}else{
    echo "array()-->bool";
}

echo $a;

//转换
$a = '123abc';
echo "<hr>";
echo (boolean)$a; //只在这一行生效

//函数强转
echo  intval($a);//123

var_dump($a);//string

//永久转换
settype($a, 'integer');

var_dump($a);//123 int

echo gettype($a);