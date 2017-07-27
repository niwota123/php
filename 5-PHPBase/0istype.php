<?php
/**
 * @Author: superking
 * @Date:   2017-07-27 09:36:32
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-27 09:38:39
 */

$a = 1;
if (is_int($a)) {
    echo "是int类型";
}else {
    echo "不是int类型";
}

if (is_numeric($a)) {
    echo "是数值";
}else{
    echo "不是数值";
}