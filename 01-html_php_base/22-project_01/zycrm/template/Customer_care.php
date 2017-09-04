<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
        <div class="panel-heading">

        <div class = 'row'>
            <h2 class="col-sm-2">客户关怀</h2>
            <a class="btn btn-info col-sm-offset-9" href="/action.php?act=customer_care&step=add">添加</a>
        </div>

        </div>
        <div class="panel-body">
            <!-- Table -->
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>客户</th>
                    <th>关怀主体</th>
                    <th>关怀方式</th>
                    <th>关怀时间</th>
                    <th>下次关怀时间</th>
                    <th>备注</th>
                    <th>关怀人</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($care_data as $item):?>
                    <tr>
                        <?php foreach ($item as $value):?>
                            <td><?php echo $value; ?></td>
                         <?php endforeach; ?>
                         <td>
                             <a href="action.php?act=customer_care&step=edit&id=<?php echo $item['care_id'];?>">编辑</a>/
                             <a href="action.php?act=customer_care&step=del&id=<?php echo $item['care_id'];?>">删除</a>
                         </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div><!--                body-->
        <?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_page.php'?>

    </div>
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>