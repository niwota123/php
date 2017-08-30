<?php
$host = 'localhost';
$user = 'root';
$pwd = '123456';
$db = 'test_db';

try {
    //数据库连接
    $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);

    //查询
    $sql = "SELECT * FROM ss";
    $data = array();
    foreach ($pdo->query($sql) as $row) {
        $data[]=$row;
    }

} catch (Exception $e) {
    //Exception 异常
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src = 'js/jquery-3.2.1.min.js'></script>
        <script src = 'js/bootstrap.min.js'></script>
    </head>
    <body>
    <div class="container">
        <nav class="navbar navbar-default navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">学生信息</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="add.php">添加</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">更多 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">按照年龄分组</a></li>
                                <li><a href="#">按照性别分组</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">清空数据</a></li>
                            </ul>
                        </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">学生信息</div>
            <div class="panel-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>年龄</span></th>
                        <th>班级</th>
                        <th>操作</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($data as $value) {

                        $id = $value['id'];
                        $name = $value['name'];
                        $age = $value['age'];
                        $class = $value['class'];
                        $sex = $value['sex'];
                        echo "
                <tr>
                        <th scope='row'>$id</th>
                        <td>$name</td>
                        <td>$sex</td>
                        <td>$age</td>
                        <td>$class</td>
                        <td>
                            <a href=''><span class='glyphicon glyphicon-trash'></span> 删除</a>/
                            <a href=''><span class='glyphicon glyphicon-edit'></span> 编辑</a>
                        </td>
                    </tr>
                        ";
                    }
                     ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </body>
</html>