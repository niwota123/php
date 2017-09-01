<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-2">客户来源</h2>
                <a class="btn btn-info col-sm-offset-9" href="/action.php?act=customer_source&step=add">添加</a>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>客户来源</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($source_data as $item):?>
                    <tr>
                        <?php foreach ($item as $value):?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="action.php?act=customer_source&step=del&id=<?php echo $item['source_id'];?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div><!--                body-->
        <?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_page.php'?>


    </div>
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>