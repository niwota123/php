<?php
/**
 * @Author: superking
 * @Date:   2017-08-08 07:28:55
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-08 07:35:16
 */

//读文件,过滤
$file_name = 'saveArrayDemo.php';
$file_arr = file($file_name);
$tLine = $zLine = 0;
foreach ($file_arr as $value) {
    if (preg_match('#^[/*]#', trim($value))) {
        $zLine ++;
    }elseif (trim($value)==''){
        echo '空';
    }else {
        $tLine++;
    }
}

echo "代码:{$tLine}";
echo "注释:{$zLine}";