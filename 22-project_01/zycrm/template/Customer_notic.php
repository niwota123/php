<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class = 'row'>
                <h2 class="col-sm-2">公告</h2>
                <a class="btn btn-info col-sm-offset-9" href="/action.php?act=notic&step=add">添加</a>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>公告主题</th>
                    <th>公告内容</th>
                    <th>截止时间</th>
                    <th>公告人</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $item):?>
                    <tr>
                        <?php foreach ($item as $value):?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="action.php?act=notic&step=del&id=<?php echo $item['notice_id'];?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div><!--                body-->
        <?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_page.php'?>

    </div>
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>