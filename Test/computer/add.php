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
                    <li><a href="#">添加</a></li>
                    <li class="dropdown disabled">
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
            <div class="container">
                <div class="col-md-offset-3 col-md-6">
                    <form class="form-horizontal" action="action.php?act=add" method="post">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="姓名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
                            <div class="col-sm-10">
                                <input name="sex" type="text" class="form-control" id="inputPassword3" placeholder="性别">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">年龄</label>
                            <div class="col-sm-10">
                                <input name="age" type="text" class="form-control" id="inputPassword3" placeholder="年龄">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">班级</label>
                            <div class="col-sm-10">
                                <input name="class" type="text" class="form-control" id="inputPassword3" placeholder="班级">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-info">添加</button>
                                <button type="reset" class="btn btn-danger">重置</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>