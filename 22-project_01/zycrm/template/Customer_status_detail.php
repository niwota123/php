<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h2 class="col-sm-4">客户状态</h2>
            </div>
        </div>
        <div class="panel-body">
            <!-- Table -->

            <form class="form-horizontal" method="post"
                  action="/action.php?act=customer_status&step=add">


                <div class="form-group">
                    <label class="col-sm-3 control-label form-label">客户状态</label>
                    <div class="col-sm-8">
                        <input class="form-control"  type="text"
                               value="" name="condition_name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label form-label">状态描述</label>
                    <div class="col-sm-8">
                        <input class="form-control"  type="text"
                               value="" name="condition_explain">
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