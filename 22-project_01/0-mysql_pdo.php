<?php
/**
 * @Author: superking
 * @Date:   2017-08-23 09:30:38
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-23 10:16:51
 */

//对象
//使用new关键字声明对象


//类比:
//js中:
//.查找属性
//.调用对象的方法

//PHP中:
//->查找属性
//->调用对象的方法


//PDO的使用
//配置信息

$host = 'localhost';
$user = 'root';
$pwd = '123456';
$db = 'test_db';


try {
    //数据库连接
    $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);

    //查询
    // $sql = "SELECT * FROM em";

    // foreach ($pdo->query($sql) as $row) {
    //     print_r($row);
    // }

    //修改
    // $sql = "UPDATE em SET e_salary=9000 WHERE e_no=1004";

    // exec执行一条sql语句
    // query也是执行一条sql语句-查询使用
    // $rs = $pdo->exec($sql);
    // var_dump($rs);
    //
    $h = 'houqin';
    $sql = "INSERT INTO dept VALUES (50,'$h','zhengzhou')";

    $rs = $pdo->exec($sql);
    var_dump($rs);

} catch (Exception $e) {
    //Exception 异常
    echo $e->getMessage();
}



