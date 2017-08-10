<?php
/**
 * @Author: superking
 * @Date:   2017-07-26 08:42:36
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-28 20:44:02
 */
if (isset($_GET['user'])) {
    if (isset($GLOBALS['data'])) {
            $GLOBALS['data'][] = $_GET['user'];
        }else {
            global $arr ;
            $arr= array($_GET['user']);
            $GLOBALS['data'] = $arr;
        }

        var_dump($GLOBALS['data']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="bb.php" method="get">
    <input type="text" name="user" />
        <input type="submit" />
    </form>
</body>
</html>