<?php
/**
 * @Author: superking
 * @Date:   2017-08-03 17:28:06
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-03 20:43:50
 */
//简单的抓取url

// 1.获取网页内容
$content = file_get_contents('http://www.hao123.com');
// 2,正则网页里面的url
$regex = '#http://[^");]+#';
// 3,将正则出的结果写入本地
$resArr = array();
$res = preg_match_all($regex, $content, $resArr);
if ($res) {
   $urls = current($resArr);//取到数组第一个位置的数据

   foreach ($urls as $value) {
        $value = $value."\n";
        //追加写入文件
        file_put_contents('url.txt', $value, FILE_APPEND);
   }
}
