<?php
/**
 * @Author: superking
 * @Date:   2017-08-08 11:02:53
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-08 11:58:20
 */
// flock(fp, operation, &wouldblock)

//留言板
//功能:
//1,发布
//2,文件存储的方式保持到本地
//3,读取本地文件并展示

if (isset($_POST['sub'])) {
    //自定义数据组织方式
    // 小王<l>留言title<l>留言内容content<l>留言time<n>
    // 小王<l>留言title<l>留言内容content<l>留言time<n>

    extract($_POST);
    $time = time();

    $file_content = "{$user}<l>{$title}<l>{$content}<l>{$time}<n>";

    $file_name = 'liu_yan.txt';

    //写入数据
    write_file($file_name,$file_content);

    //读取数据并显示
    $read_content = read_file($file_name);

    //使用<n>分隔,多条
    $lists = explode('<n>', $read_content);

    //处理单个数据
    foreach ($lists as $value) {
        $info = explode('<l>',$value);
        if (count($info)>1) {
            list($user,$title,$content,$time) = $info;
            //拿到数据后显示
            echo "<p>
            用户:{$user} 标题:{$title} 内容:{$content} 时间:{$time}
            </p>";
        }
    }
}



//写入
function write_file($file_name,$content){
    //创建+追加
    $fp = fopen($file_name,'a');
    //写入前加锁
    if (flock($fp,LOCK_EX)) {
        fwrite($fp, $content);
        //写完后解锁
        flock($fp,LOCK_UN);
    }
    fclose($fp);
}

//读取
function read_file($file_name){
    $fp = fopen($file_name, 'r');
    //加上读取锁
    if (flock($fp,LOCK_SH)) {
        $content = fread($fp,filesize($file_name));
        //读取完毕解锁
        flock($fp,LOCK_UN);
    }
    fclose($fp);
    return $content;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>留言板</title>
</head>
<body>
    <form action="2-file_lock.php" method="post">
        user: <input type="text" name="user" /> <br />
        title: <input type="text" name="title" /><br />
        content: <textarea name="content" cols="30" rows="10"></textarea>
        <input type="submit" value="发布留言" name="sub" />
    </form>
</body>
</html>