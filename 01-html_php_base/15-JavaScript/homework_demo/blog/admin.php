<?php
//统一处理数据，数据操作
//1,从数据库获取数据


 $mysqli = new mysqli('127.0.0.1','root','123456','dbdemo');
 $result = $mysqli->query("SELECT * FROM blog");

 $arr = array();
 //while如果条件满足，一直查询数据
 while ($row = $result->fetch_assoc()) {
     //将查询的数据放在数组中
     $arr[]=$row;
 }


// 处理页面跳转和数据处理
// 定义一个统一的标准
// 所有的其他界面需要传递action参数
// action=login 跳转到登录界面
// action=home 跳转到管理首页
// action=list 跳转到日志列表
// action=add 跳转到发表日志

$action ='';
if($_GET)
{
    $action = $_GET['action'];
}

//根据不同的action进行不同的处理
switch ($action) {
    case 'register':
    if($_POST){
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        $rpwd = $_POST['rpwd'];
        $sex = $_POST['sex'];


        //相关的判断
        //1，判断空值
        //2,判断用户名是否存在
        //3,判断两次密码是否准确
        //4，开始注册
        if($user&&$pwd&&$rpwd){
            //从数据库中查询用户数据，根据用户名
            //如果可以查到，证明已经注册
            //如果没查到，可以注册
            $result = $mysqli->query("SELECT * FROM user WHERE user='$user'");
            $row = $result->fetch_assoc();
            if(!$row){
                //没有查询到数据
                if($pwd==$rpwd){
                    //插入数据
                    $result = $mysqli->query("INSERT INTO user VALUES (null,'$user',md5('$pwd'),'$sex')");
                    if($result){
                        include 'login.html';
                    }else{
                        echo "<script>alert('注册失败！'); </script>";
                    }
                }else{
                    echo "<script>alert('密码不一致'); </script>";
                }

            }else{
                echo "<script>alert('用户名已存在，不能重复注册！'); </script>";
            }
        }else{
            echo "<script>alert('用户名或密码为空！'); </script>";
        }

    }else{
        include "register.html";
    }
        break;
    case 'login':
    if($_POST){
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        //表单提交的数据和数据库查询的数据进行对比
        $result = $mysqli->query("SELECT * FROM user WHERE user='$user'");
        $row = $result->fetch_assoc();
        //1,用户名对比
        if($row){
            //2,密码对比
            if($row['pwd']==md5($pwd)){
                include "adminHome.php";
            }else{
                 echo "<script>alert('登录失败密码错误！'); </script>";
            }
        }else{
            //用户未注册
            echo "<script>alert('用户未注册，请先注册！'); </script>";
        }
    }
        break;
    case 'home':
        include "adminHome.php";
        break;
    case 'list':
        include "adminList.php";
        break;
    case 'category':
    //查询分类
    $result = $mysqli->query("SELECT DISTINCT category FROM blog");
    while ($row = $result->fetch_assoc()) {
        //使用数组接受查询到的数据
        $categoryArr[]=$row;
    }

        include "adminCategory.php";
        break;
    case 'add':
    //判断是否有post的值
    if($_POST)
    {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $content=$_POST['content'];
        $count = count($arr);//当前数据库中数据的长度
        //获得表单提交的数据之后，开始插入数据库
        $result = $mysqli->query("INSERT INTO blog VALUES ('$count','$title','$content','$category')");
        if($result){
            echo'插入数据库成功';
            die();
        }else{
            echo'插入数据库失败';
            die();

        }
    }
        include "adminAdd.php";
        break;
    case 'edit':
    // 获得传递过来的blogid，用于查询blog的数据
    $id = $_GET['blogid'];
    $result = $mysqli->query("SELECT * FROM blog WHERE id='$id'");
    $row = $result->fetch_assoc();
    //$result是一个数组，完整的blog数据
        include "adminEdit.php";
        break;
    case 'update':
    //根据表单提交的数据，对原有数据进行更新
    if($_POST)
    {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $content=$_POST['content'];
        $id = $_GET['blogid'];

        $result = $mysqli->query("UPDATE `blog` SET `title`='$title',`content`='$content',`category`='$category' WHERE id='$id'");
        if($result){
            echo'更新数据库成功';
            die();
        }else{
            echo'更新数据库失败';
            die();

        }
    }
    break;
    case 'del':
        $id = $_GET['blogid'];
        $result = $mysqli->query("DELETE FROM blog WHERE id=$id");
        if($result){

        }
        else{
            echo "失败";
            die();
        }
        include "adminList.php";
        break;

    default:
        break;
}