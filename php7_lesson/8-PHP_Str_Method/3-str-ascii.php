<?php
/**
 * @Author: superking
 * @Date:   2017-08-01 15:06:34
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-01 15:06:43
 */

//ASCII处理  ord   chr
$arr = range('a', 'z');
foreach ($arr as $value) {
    echo'<br>'.ord(strtoupper($value));//65-90
    echo'<br>'.ord($value);//97-122

}

$num = range(65, 90);
foreach ($num as $ascii) {
    echo '<br>'.chr($ascii);
}