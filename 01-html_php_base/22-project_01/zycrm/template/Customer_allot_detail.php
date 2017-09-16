<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">客户分配</h2>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->

            <form class="form-horizontal" method="post"
                  action="/action.php?act=customer_allot&step=allot">


                    <div class="form-group">
                        <label class="col-sm-3 control-label form-label">客户姓名</label>
                        <div class="col-sm-8">
                            <input class="form-control"  type="text"
                                   value="<?php echo $customer_name; ?>" readonly>
                            <input type="hidden" name="customer_id" value="<?php echo $id; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label form-label">负责员工</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="user_id">
                                <?php foreach ($user_data as $value):?>

                                    <option value="<?php echo $value['id'];?>">
                                        <?php echo $value['name'];?>
                                    </option>

                                <?php endforeach;?>

                            </select>
                        </div>
                    </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button class="btn btn-primary" type="submit" value="submit" name="submit">提交</button>
                        <a class="btn btn-default" onclick="history.back()" role="button">返回</a>
                    </div>
                </div>

            </form>

        </div><!--                body-->
    </div>



<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>