<?php
/**
 * @Author: superking
 * @Date:   2017-07-31 14:40:08
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-31 15:41:07
 */
//参数

function showMsg($userMsg){
    echo '<br />用户输入'.$userMsg;
}
/*
丢失了一个内容
Warning: Missing argument 1 for showMsg(), called in C:\wampstack-5.6.19-0\apache2\htdocs\Lesson\7-PHP_Method\1-method_var.php on line 14 and defined in C:\wampstack-5.6.19-0\apache2\htdocs\Lesson\7-PHP_Method\1-method_var.php on line 10

没有定义参数,说明参数是必填的
Notice: Undefined variable: userMsg in C:\wampstack-5.6.19-0\apache2\htdocs\Lesson\7-PHP_Method\1-method_var.php on line 11
 */
showMsg('aaa');

//如何划分,可选和必须
//1,参数是否有默认值
//2,如果参数有默认值那么这个参数就是可选参数
//3,如果参数没有默认值,这个参数就是必须参数
function showMsg_var($userMsg='hello'){
    echo '<br />用户输入'.$userMsg;
}

showMsg_var('bbbbbbbb');
showMsg_var();

//练习: 声明一个函数,计算两数的绝对值(两数的距离),参数是可选

//练习:声明一个函数:功能比较两个数的大小,然后输出大的减去小的
function custom_abs($a=0,$b=0){
    if ($a>$b) {
        return $a-$b;
    }else {
        return $b-$a;
    }
}

echo '<br>'.custom_abs(-6,-5);

//练习:声明一个函数,功能动态获得一个table 参数 rows cols 可选参数:table的背景颜色

function creatTable($rows=0,$cols=0,$bgColor='cyan'){
    echo "<table border='1' bgcolor='$bgColor'>";
    for($i = 1;$i <= $rows;$i++){
        echo '<tr>';
         for ($j = 1;$j<=$cols;$j++){
            echo '<td>x</td>';
         }
        echo '</tr>';
    }
    echo "</table>";
}



 creatTable(9,9,'red');
 creatTable(9,15,'yellow');
 creatTable(9,20,'blue');


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <?php
    creatTable(9,9);
     ?>
</body>
</html> -->