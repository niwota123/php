<?php
/**
 * @Author: superking
 * @Date:   2017-08-03 20:40:21
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-04 10:10:59
 */

set_time_limit(0);

function getContent($url){

     if (realUrl($url)) {
        ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');
        $content = file_get_contents($url);
        // 2,正则网页里面的url
        $regex = '#href="http(s)?://[^"]+#';
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
           return 1;
        }
     }

}

function realUrl($url){
    $info = pathinfo($url);
    if (isset($info['extension'])) {

        if (($info['extension'] == 'jpg') ||
        ($info['extension'] == 'jpeg') ||
        ($info['extension'] == 'gif') ||
        ($info['extension'] == 'png')||
        ($info['extension'] == 'css')||
        ($info['extension'] == 'js')) {
            return  0;
        }else {

            return 1;
        }
    }

    return 1;
}


if (getContent('http://www.hao123.com')) {
   $fileName = 'url.txt';
    if (file_exists($fileName)) {
        // 打开文件
        $file = fopen($fileName, 'r');
        // fgets逐行读取文件
        while ($url = fgets($file)) {
            $url = ltrim(explode('=', $url)[1],'"') ;
            static $i = 0;
            $i++;
            echo "<hr>[$i]";
            getContent($url);
            ob_flush();
            sleep(1);
        }
    }
}
