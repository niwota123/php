<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-2">员工列表</h2>
                <a class="btn btn-info col-sm-offset-9" href="/action.php?act=user_info&step=add">添加</a>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>电话</th>
                    <th>邮箱</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($user_data as $item):?>
                    <tr>
                        <?php foreach ($item as $value):?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="action.php?act=user_info&step=edit&id=<?php echo $item['user_id'];?>">编辑</a>
                            <a href="action.php?act=user_info&step=del&id=<?php echo $item['user_id'];?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div><!--                body-->
        <?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_page.php'?>


    </div>
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>