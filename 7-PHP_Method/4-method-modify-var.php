<?php
/**
 * @Author: superking
 * @Date:   2017-08-01 09:23:07
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-02 09:39:51
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
//系统规则 key=>value 自己的规则 key:value

function custom_array(){
    //1,取参数
    $args = func_get_args();
    //2,根据参数来决定数组元素怎么放
    $arr = null;
    foreach ($args as $arg) {
        //如果参数遵循关联数组的原则(a:b)
        if (strlen(stristr($arg, ':'))) {
            //获取key
            $key = stristr($arg,':',true);
            $value = ltrim(stristr($arg,':'), ':');
            $arr[$key] = $value;
        }else {
            $arr[]=$arg;
        }
    }
    return $arr;
}

echo '<hr>';
$arr = custom_array('a','b:hello','c:php','e','f','g');
var_dump($arr);
//关联数组
