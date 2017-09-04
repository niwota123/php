<?php
/**
 * @Author: superking
 * @Date:   2017-08-08 10:15:02
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-08 11:02:36
 */
//文件的指针
// ftell(fp)获得当前指针的位置
// rewind(fp)回到初始指针位置
// fseek(fp, offset, whence)指针跳转
$file_name = 'aaa.txt';
$fp = fopen($file_name, 'r');

echo '<br>'.fgets($fp);
echo '<br>指针'.ftell($fp);

// rewind($fp);

echo '<br>'.fgets($fp);
echo '<br>指针'.ftell($fp);

// rewind($fp);

echo '<br>'.fgets($fp);
echo '<br>指针'.ftell($fp);

rewind($fp);
echo '<br>'.fread($fp, 15);
echo '<br>指针'.ftell($fp);


rewind($fp);
fseek($fp,38,SEEK_SET);//直接定位到文件指针38的位置
echo '<br>'.fgets($fp);

rewind($fp);
fseek($fp,-9,SEEK_END);//结尾,向前移动9
echo '<br>'.fgets($fp);

fseek($fp,-27,SEEK_CUR);//在当前位置,向前移动27
echo '<br>'.fgets($fp);


