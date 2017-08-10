<?php
/**
 * @Author: superking
 * @Date:   2017-08-10 09:16:48
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-10 10:42:41
 */
//文件管理系统功能-demo

//1,list 文件

if (!isset($_GET['action'])) {

    $file_path = 'homework_demo';
    list_file($file_path);
}else {
    $action = $_GET['action'];//方法的名字

    if (isset($_POST['file_content'])) {
        //可变函数
        $action($_POST['filepath'],$_POST['file_content']);
    }else{
        //可变函数
        $action($_GET['filepath']);
    }
}

//显示
function list_file($file_path){
    //打开
    $dir = opendir($file_path);

    //循环遍历
    echo '<table border="1" rules="all" width="80%" style="margin:0 auto">
     <tr>
    <td>文件名</td>
    <td>类型</td>
    <td>操作</td>
    </tr>';

    while ($file_name = readdir($dir)) {
        if ($file_name=='.'||$file_name=='..') {
            continue ;
        }
        //全路径
        $f_path = $file_path.DIRECTORY_SEPARATOR.$file_name;
        $type = filetype($f_path);
        //三元运算符
        //(条件)?(满足选择项):(不满足选择项)
        $type =($type=='file')?'文件':'文件夹';

        echo "<tr>
        <td>{$file_name}</td>
        <td>{$type}</td>
        <td>
        <a href='homework.php?action=show_content&filepath={$f_path}' >查看</a>
        <a href='homework.php?action=modify_file&filepath={$f_path}' >修改</a>
        <a href='homework.php?action=del_file&filepath={$f_path}' >删除</a>
        <a href='homework.php?action=download_file&filepath={$f_path}' >下载</a>
        <a href='homework.php?action=move_file&filepath={$f_path}' >移动</a>
        </td>
        </tr>";
    }
    echo '</table>';
}

//2,查看 修改 删除 下载 移动
function show_content($file_path){

    //如果是文件夹
    if (is_dir($file_path)) {
        list_file($file_path);
    }else{//文件操作

        //将文件的内容放入 textarea里面显示
        //textarea disabled(不可编辑)
        $file_content = file_get_contents($file_path);
        echo
        "<textarea style='width:90%;height:500px' disabled>{$file_content}</textarea>";
    }
}
//修改
function modify_file($file_path,$file_content=''){

    if (strlen($file_content)>1) {
        //保存
        if(file_put_contents($file_path, $file_content)) {
            echo '保存成功';
        }else{
            echo '保存失败';
        }

    }else{
        //显示
        $file_content = file_get_contents($file_path);
        echo
        "<form action='homework.php?action=modify_file' method='post'>
                <input type='hidden' name='filepath' value='{$file_path}'>
                <textarea style='width:90%;height:500px' name = 'file_content'>{$file_content}</textarea>
                <input type='submit' value='保存'>
        </form>";
    }

}

function del_file($file_path){

}

function download_file($file_path){

}

function move_file($file_path){

}