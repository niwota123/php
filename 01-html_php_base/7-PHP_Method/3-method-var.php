<?php
/**
 * @Author: superking
 * @Date:   2017-07-31 16:34:45
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-31 20:29:15
 */
//正常传值
$a = 1;

function test($a){
    $a++;
    echo $a;
}

test($a);
echo '<br>'.$a;//1

//引用传值 本质,变量将自己的地址传给了函数,函数拿到变量的地址,就可以随意修改变量
function test_1(&$a){
     $a++;
    //$a = ['a','b','c']; //拿到地址,修改变量的类型都可以
}

test_1($a);
echo '<br>'.$a;//2

//练习:声明方法,有两个参数,方法的功能调换两个参数的值
//$a = 1;$b = 2;
//method($a,$b);
//echo $a;//2
//echo $b;//1
function change(&$a,&$b){
    $c = $a;
    $a = $b;
    $b = $c;
}

$x = 'a';
$y = 'b';
change($x,$y);
echo '<br>'.$x.'---'.$y;

//变量函数
function say(){
    echo '<br>你好';
}

function hello(){
    echo '<br>hello';
}

function niHao(){
    echo '<br>ni hao';
}

//变量的值是函数名
$method = 'niHao';
$method();

function play(){
    echo '播放音乐';
}
function stop(){
    echo '停止';
}
function pause(){
    echo '暂停';
}

$ex = 'stop';
$ex();

// if ($ex == 'play') {
//     play();
// }elseif ($ex == 'stop'){
//     stop();
// }elseif($ex == 'pause'){
//     pause();
// }
//
//匿名函数
$a = function (){
    echo '<br />我是匿名函数';
};

$a();

//递归函数
//例子: 定义方法,有一个参数 $n = 3  输出: 3 2 1 0 - 0 1 2 3
//参数 n 输出 n-0 0-n
function test_d($n){
    echo $n;
    if ($n>0) {
        test_d($n-1);
    }else{
        echo '-';
    }
    echo $n;
}

test_d(5);


/*
        echo $n-1;//1
        if ($n>0) {
            echo $n-1;//0
        }else{
            echo '-';
        }
        echo $n;//0

 */

function test_d1($n){
    echo $n;//3
    if ($n>0) {
        echo $n-1;//2
        if ($n>0) {
            echo $n-1;//1
            if ($n>0) {
                echo $n-1;//0
                if ($n>0) {
                    echo $n-1;
                }else{
                    echo '-';//-
                }
                echo $n;//0
            }else{
                echo '-';
            }
            echo $n;//1
        }else{
            echo '-';
        }
        echo $n;//2
    }else{
        echo '-';
    }
    echo $n;//3
}



//递归:练习:1+2+3+4+...n 和值
//参数:n
echo '<hr>';
function sum_test($n){
    if ($n==1) {
        return 1;
    }else{
        return $n +sum_test($n-1);
    }
}
echo sum_test(10);//55

//学生的写法
function sum($n){
    static $sum=0;
    if($n>=0){
        $sum += $n;
        sum(--$n);
    }
    else{
        return $sum;
    }

}
echo sum(10);




echo '<hr>';
//10进制转换成2进制
//递归函数
function sum_2($n){
    if ((int)$n==0) {
        return;
    }else{
        sum_2($n/2);
        echo $n%2;
    }
}

sum_2(10);











//递归函数
//输出0-10数
function showNum($num){

    echo '<br>'.$num;
    $num ++;
    if ($num >10) {
        echo '结束';
    }else {
        showNum($num);
    }
}

showNum(0);

// function showNuma($num){

//     echo '<br>'.$num;
//     $num ++; //1
//     if ($num >5) {
//         echo '结束';
//     }else {
//         echo '<br>'.$num;
//         $num ++;//2
//         if ($num >5) {
//             echo '结束';
//         }else {
//             echo '<br>'.$num;
//             $num ++;//3
//             if ($num >5) {
//                 echo '结束';
//             }else {
//                 echo '<br>'.$num;
//                 $num ++;//4
//                 if ($num >5) {
//                     echo '结束';
//                 }else {
//                     echo '<br>'.$num;
//                     $num ++;//5
//                     if ($num >5) {
//                         echo '结束';
//                     }else {

//                     }
//                 }
//             }
//         }
//     }
// }