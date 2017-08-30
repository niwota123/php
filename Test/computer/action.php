<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/25
 * Time: 9:56
 */

if (isset($_GET['act'])) {
    $_GET['act']();
}

function add (){

$host = 'localhost';
$user = 'root';
$pwd = '123456';
$db = 'test_db';

try {
    //数据库连接
    $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
} catch (Exception $e) {
    //Exception 异常
    echo $e->getMessage();
}

    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $class = $_POST['class'];


    $sql = "INSERT INTO ss VALUES (null,'$name',$age,'$sex','$class')";

    $rs = $pdo->exec($sql);
    if ($rs) {
        echo "<script> alert('插入成功')</script>";
        include 'index.php';
    }else{
        echo "charu shibai";
    }
}

function del(){

}

function update(){

}