<?php

//投票
//瞬间的大量数据,先放在redis中
//服务器后台运行小程序,小程序主要用来数据交换
//数据交换:将redis的数据写入到数据库
//数据交换:冷热数据交换,热数据新鲜数据(redis中的数据),冷数据(保存在数据库的数据)


//有3个用户,让其他人投票
//
//数据库  vote表
//vid(每一票id) uid(投给谁的票) ip(投票的ip) time(投票的时间)
//

//2个PHP文件
//1,投票文件(将实施的投票数据,保存到redis)
//2,冷热数据处理文件(后台将redis数据保存sql中)

//redis.php  投票文件
//change.php 冷热数据交换


//redis.php 逻辑
//1,网页获取用户提交的数据
//2,保存到redis中

$redis = new Redis();
$redis->connect('127.0.0.1',6379);

//模拟投票数据
$uid = mt_rand(1, 3);//随机指定投票人员
$time = time();
$ip = '127.0.0.1';

//自增
$voteid = $redis->incr('global_voteid');

//将这些数据保存到redis中
// vote:id:uid
// vote:id:time
// vote:id:ip

$uid_key = 'vote:'.$voteid.':uid';
$time_key = 'vote:'.$voteid.':time';
$ip_key = 'vote:'.$voteid.':ip';

$redis->set($uid_key,$uid);
$redis->set($time_key,$time);
$redis->set($ip_key,$ip);


// echo
// $redis->get($uid_key),
// $redis->get($time_key),
// $redis->get($ip_key);


?>