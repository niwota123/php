<?php
/**
 * @Author: superking
 * @Date:   2017-08-08 14:06:20
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-08 14:39:04
 */
//文件目录的操作
//增加 删除 复制 移动
//增加(mkdir) 删除(rmdir) 复制(copy) 移动(rename)

// if (mkdir('./dirDemo')) {
//     echo '成功';
// }else {
//     echo '失败';
// }

//参数:1,目录路径 2,文件权限 3,是否递归创建
// if (mkdir('./a/b/c',0777,true)) {
//     echo '成功';
// }else {
//     echo '失败';
// }
//

//rmdir 删除文件 参数:1,目录路径
// if (rmdir('./a')) {
//     echo '成功';
// }else {
//     echo '失败';
// }
//


// copy
// 复制(copy文件夹是不可以一的)
// 需要自己写代码实现 copy_dir

mkdir('./a');

copy('./a','../a');



//文件夹的遍历
//文件夹的资源类型,跟文件的资源类型操作上类似
// opendir(path, context) 打开文件夹
// readdir(dir_handle) 读取文件夹
// closedir(dir_handle) 关闭
// rewinddir(dir_handle) 重置文件夹指针

//1,打开文件夹
$dir = opendir('../13-File/');
//readdir 从文件夹资源中读取目录的条目
echo '<br>'.readdir($dir);
echo '<br>'.readdir($dir);
echo '<br>'.readdir($dir);
echo '<br>'.readdir($dir);
echo '<br>'.readdir($dir);
echo '<br>'.readdir($dir);
echo '<br>'.readdir($dir);

//重置指针位置
rewinddir($dir);
echo '<br>'.readdir($dir);
