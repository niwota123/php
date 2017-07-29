<?php
/**
 * @Author: superking
 * @Date:   2017-07-28 16:42:07
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-28 21:33:41
 */
// 数组指针的操作

$arr = range(1, 10);

//指针的默认位置-最顶头
echo current($arr);//1
echo next($arr);//2
echo current($arr);//2
echo prev($arr);//1

echo end($arr);//10
echo next($arr);//null
echo reset($arr);//1

//使用指针操作的方式,遍历数组,并输出数组中每个元素的key-value
//除了 $arr 这个变量,不准使用其他变量 $i $key $value
echo '<hr>';
$arr = range('a', 'z');

do{
    echo current($arr).'-----'.key($arr).'<br/>';
}while (next($arr)!=null);

//list
echo '<hr>';
$arr = ['admin','123456','23'];
list($user,$pwd,$age) = $arr;

echo $user.'<br>';
echo $pwd.'<br>';
echo $age.'<br>';

$arr = ['user'=>'admin','pwd'=>'1234'];
print_r(each($arr));

//如何使用list 和each结合 来遍历数组
$arr = range('a', 'z');

//使用while循环
while(list($key,$value)=each($arr)){
    echo $key.'----'.$value.'<br>';
}