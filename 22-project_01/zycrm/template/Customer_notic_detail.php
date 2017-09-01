<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_header.php'?>

    <div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <h2 class="col-sm-4">添加公告记录</h2>
        </div>
    </div>
    <div class="panel-body">
        <!-- Table -->

        <form class="form-horizontal" method="post"
              action="/action.php?act=notic&step=add"
        <div class="row">
            <div class="form-group col-xs-6">
                <label class="col-sm-3 control-label form-label">公告主题</label>
                <div class="col-sm-8">
                    <input class="form-control" name="notice_title" type="text"
                           value="">
                </div>
            </div>

            <div class="form-group col-xs-6">
                <label class="col-sm-3 control-label form-label">截止时间</label>
                <div class="col-sm-8">
                    <input class="form_datetime form-control" type="text"
                           value="" name="notice_endtime" readonly>
                </div>
            </div>


            <div class="row">


                <div class="form-group col-xs-6">
                    <label class="col-sm-3 control-label form-label">公告人</label>
                    <div class="col-sm-8">
                        <input class="form-control"  type="text"
                               value="<?php echo $user_name;?>" readonly>
                    </div>
                </div>
                <div class="form-group col-xs-6">

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label form-label">公告内容</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="notice_content" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button class="btn btn-primary" type="submit" value="submit" name="submit">提交</button>
                    <button class="btn btn-info" type="reset">重置</button>
                    <a class="btn btn-default" onclick="history.back()" role="button">返回</a>
                </div>
            </div>

            </form>

        </div><!--                body-->

    </div>

    <link rel="stylesheet" href="/static/css/bootstrap-datetimepicker.min.css">
    <script src="/static/js/bootstrap-datetimepicker.js"></script>
    <script src="/static/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:mm",
            autoclose: true,
            todayBtn: true,
            todayHighlight: true,
            showMeridian: true,
            pickerPosition: "bottom-left",
            language: 'zh-CN', //中文，需要引用zh-CN.js包
            startView: 2, //月视图
            minView: 1//日期时间选择器所能够提供的最精确的时间选择视图
        });
    </script>


<?php include_once __DIR__.DIRECTORY_SEPARATOR.'Common_footer.php'?>