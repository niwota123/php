<?php
/**
 * @Author: superking
 * @Date:   2017-08-10 09:16:48
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-10 15:18:02
 */
//文件管理系统功能-demo

//1,list 文件

if (!isset($_GET['action'])) {

    $file_path = 'homework_demo';
    list_file($file_path);

}else {

    //方法的名字
    $action = $_GET['action'];

    if ($action=='modify_file'&&isset($_POST['file_content'])) {
        //修改之后保存操作
        $action($_POST['filepath'],$_POST['file_content']);

    }elseif ($action == 'move_file'&&isset($_POST['d_file_path'])) {
        //用户选中之后的移动操作
        $action($_POST['filepath'],$_POST['d_file_path']);

    }else{
        //根据不同action操作
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
    closedir($dir);
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
        $file_content = htmlentities($file_content);
        echo
        "<textarea style='width:90%;height:500px' disabled>{$file_content}</textarea>";
    }
}
//修改
function modify_file($file_path,$file_content='kong'){

    if (is_dir($file_path)) {
        echo '对不起,不能修改文件夹';
        return ;
    }

    if ($file_content!='kong') {
        //保存
        if(file_put_contents($file_path, $file_content)) {
            echo '保存成功';
        }else{
            echo '保存失败';
        }

    }else{
        //显示
        $file_content = file_get_contents($file_path);
        $file_content = htmlentities($file_content);
        echo
        "<form action='homework.php?action=modify_file' method='post'>
                <input type='hidden' name='filepath' value='{$file_path}'>
                <textarea style='width:90%;height:500px' name = 'file_content'>{$file_content}</textarea>
                <input type='submit' value='保存'>
        </form>";
    }

}

function del_file($file_path){

    if (is_dir($file_path)) {

        if (del_dir($file_path)) {
             echo '删除成功';
         }else{
             echo '删除失败';
         }

    }else{

        if (unlink($file_path)) {
             echo '删除成功';
         }else{
             echo '删除失败';
         }
    }
}

function download_file($file_path){
    if (is_dir($file_path)) {
        echo '文件夹不能下载';
    }else{
        $filesize = filesize($file_path);
        $filename = basename($file_path);
        //文件的下载
        header("content-type:application/octet-stream");//类型
        header("accept-ranges:bytes");//接受方式:字节
        header("accept-length:{$filesize}");//文件的长度
        header("content-disposition:attachment;filename={$filename}");//附件处理方式

        //输出文件
        readfile($file_path);
    }
}

function move_file($s_file_path,$d_file_path=''){

    if (strlen($d_file_path)>0) {
        //移动操作
        //用户选择完毕使用form表单的方式提交---选过的

        //将目标路径拼接完整
        $d_file_path .= DIRECTORY_SEPARATOR.basename($s_file_path);
        echo "{$s_file_path}-->{$d_file_path}";
        if (rename($s_file_path, $d_file_path)) {

            echo '移动成功';
        }else{
            echo "移动失败";
        }

    }else{
        //展示
        //查找当前目录下的文件夹
        //打开当前文件的文件夹
        $dir_path = dirname($s_file_path);
        $dir = opendir($dir_path);
        $dir_path_arr = null;
        while ($file_name = readdir($dir)) {
            if ($file_name=='.') {
                continue;
            }
            $file_path = $dir_path.DIRECTORY_SEPARATOR.$file_name;
            if (is_dir($file_path)) {
                //找到的文件夹路径放入数组
                $dir_path_arr[]=$file_path;
            }
        }
        closedir($dir);
        //让用户选择移动到哪里--------
        //使用下拉,将文件夹数组呈现给用户选择
        echo
    "<form action='homework.php?action=move_file' method='post' accept-charset='utf-8'>
        <input type='hidden' name='filepath' value='{$s_file_path}'>
        请选择移动的文件夹
        <select name='d_file_path'>";

        foreach ($dir_path_arr as $value) {
            echo "<option value='{$value}'>{$value}</option>";
        }

        echo"
        </select>
        <input type='submit' value='移动'>
        </form>";
    }
}

function del_dir($path){

    //1,文件夹是否
    if (file_exists($path)) {
        //打开文件夹
        $dir = opendir($path);
        //遍历
        while ($file_name = readdir($dir)) {
            //过滤
            if ($file_name=='.'||$file_name=='..') {
                continue;
            }
            //拼接完整的相对地址
            $file_path = $path.DIRECTORY_SEPARATOR.$file_name;
            if (is_file($file_path)) {
                $rs = unlink($file_path);
            }else {
                //删除文件夹
              $rs = del_dir($file_path);
            }
        }
        //关闭文件夹
        closedir($dir);
        //文件夹内的东西清空完毕-删除文件夹
        $rs = rmdir($path);
        return $rs;
    }
}