<?php
//冷热数据转换

//链接数据库
$dbms='mysql';     //数据库类型
$host='127.0.0.1'; //数据库主机名
$dbName='test';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='123456';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

$dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象

//链redis
$redis = new Redis();
$redis->connect('127.0.0.1',6379);

//从redis中取,放到数据库
//循环
//永真循环
while (true) {

    //redis 中的vid 表示当前数据的总量
    $vid = $redis->get('global_voteid');
    $last = $redis->get('last');

    if (!$last) {
        $last = 0;
    }

    if ($vid == $last) {
        //所有数据都插入成功啦,等待新的数据
        echo "wait \n";
    }else {
        $sql = 'insert into vote (vid,uid,ip,time) values';

        for ($i=$vid;$i>$last;$i--) {

            $k1 = 'vote:'.$i.':uid';
            $k2 = 'vote:'.$i.':ip';
            $k3 = 'vote:'.$i.':time';

            $ip_key = 'vote:'.$i.':ip';
            $row = $redis->mget([$k1,$k2,$k3]);

            //拼接sql语句
            $sql.="($i,'$row[0]','$row[1]',$row[2]),";

            //热数据删除
            $redis->delete($k1,$k2,$k3);
        }

        $sql = rtrim($sql,',');
        // echo "$sql \n";
        //执行sql
        $row = $dbh->exec($sql);

        //记录最后处理的id
        $redis->set('last',$vid);
        echo "{$row}ok \n";
    }

    // 执行间隔
    sleep(5);
}


?>