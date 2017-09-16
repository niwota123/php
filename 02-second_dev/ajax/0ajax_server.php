<?php
/**
 * @Author: superking
 * @Date:   2017-09-06 16:58:25
 * @Last Modified by:   superking
 * @Last Modified time: 2017-09-07 10:12:45
 */

$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


if (isset($_POST['id'])) {
    $id = $_POST['id'];

}


$news = ['新闻一','新闻二'];
sleep(2);
echo $news[intval($id)];



// $a = ['name'=>'xiaom','jn'=>[['jname'=>'php','jlv'=>'0'],['jname'=>'game','jlv'=>'10']]];
// $b = ['name'=>'xiaow','jn'=>[['jname'=>'java','jlv'=>'0'],['jname'=>'sing','jlv'=>'10']]];
// $c = ['name'=>'xiaol','jn'=>[['jname'=>'ui','jlv'=>'0'],['jname'=>'bettle','jlv'=>'10']]];
// $usersData = [$a,$b,$c];
// $json = json_encode($usersData);
// echo "$json";