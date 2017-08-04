<?php
// for ($pageno = 1 ; $pageno < 1848; $pageno ++) {
//     $content = file_get_contents('http://www.haha.mx/topic/1/new/'.$pageno);
//     preg_match_all('/class=\"joke-main-img\" src=\"(.*?)\"/',$content,$matches);
//     foreach ($matches[1] as $url) {
//         $url = str_replace('small','big',$url);
//         $img = file_get_contents($url);
//         file_put_contents('./save/'.basename($url),$img);
//     }
// }
//

set_time_limit(0);

for ($pageno = 1 ; $pageno < 22; $pageno ++) {
    ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');

    $content = file_get_contents('http://www.haha.mx/topic/1876/new/'.$pageno);

    /*

    <img class="joke-main-img" src="http://image.haha.mx/2017/08/02/small/2547700_b1ac3765634169a9640a9055f003a5ff_1501649130.gif">
     */
    preg_match_all('/class=\"joke-main-img\" src=\"(.*?)\"/',$content,$matches);
    foreach ($matches[1] as $url) {
        $url = str_replace('small','big',$url);
        $img = file_get_contents($url);
        file_put_contents('./save/'.basename($url),$img);
    }


    ob_flush();
    //sleep(1);
}


//http://desk.zol.com.cn/pc/5.html

/*
<a class="pic" href="/bizhi/7117_88156_2.html" target="_blank" hidefocus="true"><img width="208px" height="130px" alt="昆明滇池风景电脑壁纸" src="http://desk.fd.zol-img.com.cn/t_s208x130c5/g5/M00/0F/08/ChMkJlauzBKIClhJADd1GIKxSW4AAH87ACgPJEAN3Uw627.jpg" title="昆明滇池风景电脑壁纸"><span title="昆明滇池风景电脑壁纸"><em>昆明滇池风景电脑壁纸</em> (6张)</span></a>

 */

//http://desk.zol.com.cn
///                       bizhi/7118_88163_2.html
