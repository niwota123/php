<?php include"./common/adminHeader.php"?>

<script type="text/javascript" charset="utf-8" src="./static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./static/ueditor/ueditor.all.min.js"></script>

<!-- 语言设置-->
<script type="text/javascript" charset="utf-8" src="./static/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="mainContent">
    <div class="frame">
        <h1>发表日志</h1>
        <!--表单提交日志内容-->
        <form action="admin.php?action=add" method="POST">
            <!--标题-->
            <div>
                <label>标题：</label>
                <input name="title">
            </div>
            <!--类型-->
            <div>
                <label >分类：</label>
                <select name="category">
                    <option value="日记">日记</option>
                    <option value="新闻">新闻</option>
                </select>
            </div>
            <!--内容-->
            <div>
                <label >内容：</label>
                <textarea name="content" id="editor" style="height:300px">
                </textarea>
                <script type="text/javascript">
                    var ue = UE.getEditor('editor'); 
                </script>
            </div>
            <div>
                <button type="submit">提交</button>
            </div>
        </form>
    </div>
</div>

<?php include"./common/footer.php"?>