<?php
/**
 * @Author: superking
 * @Date:   2017-07-27 15:06:02
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-28 09:14:54
 */
//条件语句
//不同的条件,处理不同的代码

//网吧 18岁

$age = 17;
//if 的条件用来判断真假的
if($age>=18)
echo'可以上网';

//if...else
if ($age>=18) {
    echo '可以lol';
}else {
    echo'回家王者';
}

$week = '周六';//可能有周一----周日

//使用 比较+逻辑运算符
//输出,周一到周五,上课
//周六,周日,睡觉

if ($week =='周六'||$week=='周日') {
   echo'休息吧';
}else{
    echo '上课';
}


//周一---周六 ,每天限时不同的欢迎与
//if...elseif...
$week = '周一';

//单个if的效率低
if ($week=='周一') {
    echo 'aa';
}
if ($week=='周二') {
    echo 'aa';
}
if ($week=='周三') {
    echo 'aa';
}
if ($week=='周四') {
    echo 'aa';
}
if ($week=='周五') {
    echo 'aa';
}
if ($week=='周六') {
    echo 'aa';
}

//if...elseif 效率高
if ($week=='周一') {
    echo 'aa';
}elseif ($week=='周二') {
    echo 'aa';
}elseif ($week=='周三') {
    echo 'aa';
}elseif ($week=='周四') {
    echo 'aa';
}elseif ($week=='周五') {
    echo 'aa';
}elseif ($week=='周六') {
    echo 'aa';
}else{
    //前面的条件都不满足
}


// 练习:
// if...elseif...else
// 1,有两个数
// 2,如果都是正,输出两数差
// 3,如果一正一副,输出和
// 4,其他情况输出,两个数的值

$a = 9;
$b = 8;
if ($a>0&&$b>0) {
   echo $a-$b;
}elseif ($a*$b<0) {
    echo $a+$b;
}else{
    echo"a:{$a}b:{$b}";
}

//if 嵌套
//周一---周六 ,每天根据用户的性别显示不同的欢迎语
$sex = 'man';//woman
$week = '周一';
if ($sex =='man') {
    if ($week=='周一') {
    echo 'man';
    }elseif ($week=='周二') {
        echo 'man';
    }elseif ($week=='周三') {
        echo 'man';
    }elseif ($week=='周四') {
        echo 'man';
    }elseif ($week=='周五') {
        echo 'man';
    }elseif ($week=='周六') {
        echo 'man';
    }else{
        //前面的条件都不满足
    }
}else{
    if ($week=='周一') {
    echo 'woman';
    }elseif ($week=='周二') {
        echo 'woman';
    }elseif ($week=='周三') {
        echo 'woman';
    }elseif ($week=='周四') {
        echo 'woman';
    }elseif ($week=='周五') {
        echo 'woman';
    }elseif ($week=='周六') {
        echo 'woman';
    }else{
        //前面的条件都不满足
    }
}

if ($sex=='man') {
    # code...
}else{

}

if ($week=='周一') {
    if ($sex=='man') {
        # code...
    }else{

    }
}elseif ($week=='周二') {
    if ($sex=='man') {
        # code...
    }else{

    }
}elseif ($week=='周三') {
    if ($sex=='man') {
        # code...
    }else{

    }
}elseif ($week=='周四') {
    if ($sex=='man') {
        # code...
    }else{

    }
}elseif ($week=='周五') {
    if ($sex=='man') {
        # code...
    }else{

    }
}elseif ($week=='周六') {
    if ($sex=='man') {
        # code...
    }else{

    }
}else{
    //前面的条件都不满足
}



// if (condition) {
    // 什么代码都可以写
// }

echo '<hr>';
// switch
$week = '周四';


switch ($week) {
    case '周一':
        echo 1;
        break;
    case '周二':
        echo 2;
        break;
    case '周三':
        echo 3;
        break;
    case '周四':
        echo 4;
        break;
    case '周五':
        echo 5;
        break;

    default:
        # code...
        break;
}

//百货大楼
//1,2 电脑
//3,4 智游
//5,6 网吧

$floor = 1;
switch ($floor) {
    case 1:
    case 2:
       echo '电脑';
        break;
    case 3:
    case 4:
        echo '智游';
        break;
     case 5:
    case 6:
        echo '网吧';
        break;

    default:
        # code...
        break;
}



//为什么有循环
//机器重复执行某一个操作
//输出0-100,每一个
//循环结构

//死循环:根本停不下来(原因:循环的条件恒成立)
// while (1==1) {
//     echo 'hello<br>';
// }
echo '<hr>';
//循环语句,需要注意 3个地方:1,结束的条件 2,循环的动力 3,循环的开始
$a  = 0;
while ($a<100) {
    $a++;
    echo $a.'<br>';
    //1
    //2
    //3
    //4
    //5
    //6
    //7
    //8
    //9
    //10
}


//while 循环 先判断条件,在执行循环
//do...while 先执行一次代码,在判断条件

$a = 0;
do{
    echo ++$a.'<br>';
}while($a<10);

//for
for ($i=0; $i < 10 ; $i++) {
   echo $i.'<br>';
}


//循环的嵌套

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>

</head>
<body>
<table rules="all" border="1">
    <?php
        for ($i=1; $i <=9 ; $i++) {
            echo "<tr>";
            //写列
            for ($j=1; $j <=$i ; $j++) {
                $a = $i*$j;
                echo "<td style='padding:5px;font-size:10px;'>{$i}&times;{$j}={$a}</td>";
            }
             echo "</tr>";
        }
    ?>
</table>

</body>
</html>