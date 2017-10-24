<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/24
 * Time: 11:18
 */

//1,缓存
//缓存的本质提高性能
//为什么:
//1,减少数据库的访问
//2,读取的速度快,数据缓存在内存

//2,缓存技术
//1-文件缓存(一段数据放文件里,设置超时,数据不过期从文件读,过期了才查询数据库)

$time_out = 60;

//先判断是否过期
$cacheFileName = 'cache.txt';

if (!file_exists($cacheFileName)){
    //从数据库查询数据并缓存到文件
    $data = time();
    file_put_contents($cacheFileName,$data);
    echo '新的数据'.$data;
}else{
    //判断是否过期

    $mtime = filemtime($cacheFileName);

    //过期
    if ((time()-$mtime)>$time_out){
        //从数据从新获得数据
        $data = time();
        //并缓存到文件
        file_put_contents($cacheFileName,$data);
        echo '新的数据'.$data;
    }else{
        //直接读取缓存的数据
        $data = file_get_contents($cacheFileName);
        $data .= '缓存数据';
        echo $data;
    }
}






//2-memcache(将常用,不经常更新的数据,全部缓存到内存)
//3-Redis(跟memcache类似)
