<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
<div class="panel panel-default">
    <div class="panel-heading"><h2>客户分配</h2></div>
    <div class="panel-body">
        <!-- Table -->
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>姓名</th>
                <th>状态</th>
                <th>来源</th>
                <th>类型</th>
                <th>创建时间</th>
                <th>公司</th>
                <th>备注</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allot_data as $item):?>
                <tr>
                    <?php foreach ($item as $key => $value):?>
                        <?php if ($key=='id')continue; ?>
                        <td><?php echo $value; ?></td>
                    <?php endforeach; ?>
                    <td>
                        <a href="action.php?act=customer_allot&step=allot&id=<?php echo $item['id'];?>">分配</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div><!--                body-->
    <?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_page.php'?>

</div>
<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>
