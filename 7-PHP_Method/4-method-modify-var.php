<?php
/**
 * @Author: superking
 * @Date:   2017-08-01 09:23:07
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-01 09:42:38
 */
//可变参数的函数
function test(){
    //获取参数的数量
    $arg_nums = func_num_args();
    echo '<br>'.$arg_nums;

    //func_get_arg 根据参数的下标获取参数的值
    for ($i=0; $i < $arg_nums; $i++) {
        echo '<br>'.func_get_arg($i);
    }
    //func_get_args 直接获得所有参数的数组
    $args = func_get_args();
    echo '<hr>';
    foreach ($args as $key => $value) {
        echo '<br>'.$key.$value;
    }

}

test('a','b','c',1,2,3,'imok');


//不定参数的方法
//实现array()的功能
function custom_array(){

    $key=$arr=null;
    for ($i=0;$i<func_num_args();$i++){
        if ($i%2==0) {
            $key = func_get_arg($i);
        }else {
            $arr[$key] = func_get_arg($i);
        }
    }
    return $arr;
}

echo '<hr>';
$arr = custom_array('a','b','c','e','f','g');
var_dump($arr);
//关联数组
