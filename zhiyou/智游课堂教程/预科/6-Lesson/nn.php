<?php
// 99乘法表
for ($i=1; $i < 10; $i++) {
    for ($num=1; $num <= $i; $num++) {
       echo" $i * $num =".$i*$num;
    }
    echo'<br>';
}
?>