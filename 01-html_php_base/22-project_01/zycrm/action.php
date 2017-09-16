<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/24
 * Time: 16:57
 */
define('TMP','template'.DIRECTORY_SEPARATOR);
include_once 'DB.php';
include_once 'common.php';

if (isset($_GET['act'])){
    $_GET['act']();
}

//主页
function home(){
<<<<<<< HEAD
=======
    //查询数据
    //关怀提醒
//    $sql = "SELECT care_theme,care_time,customer_name FROM customer_info LEFT JOIN customer_info ON customer_care.customer_id=customer_info.customer_id WHERE care_nexttime BETWEEN curdate() AND curdate()+3";
//    //联系提醒
//    $sql = "SELECT customer_name,date_format(customer_birthday,'%c-%d') AS birthday FROM customer_info WHERE date_format(customer_birthday,'%c-%d') BETWEEN date_format(curdate(),'%c-%d') AND date_format(curdate()+3,'%c-%d')";
//    //公告提醒
//    $sql = "SELECT customer_name,date_format(customer_birthday,'%c-%d') AS birthday FROM customer_info WHERE date_format(customer_birthday,'%c-%d') BETWEEN date_format(curdate(),'%c-%d') AND date_format(curdate()+3,'%c-%d')";
//    //生日提醒
//    $sql = "SELECT customer_name,date_format(customer_birthday,'%c-%d') AS birthday FROM customer_info WHERE date_format(customer_birthday,'%c-%d') BETWEEN date_format(curdate(),'%c-%d') AND date_format(curdate()+3,'%c-%d')";

>>>>>>> 82aa7a2cf8591ff48d2b448cb53a9829383b72e4
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Home.php';
}

//客户信息
function customer_info(){

    //客户信息首页
    if (!isset($_GET['step'])){

        //分页数据处理
        //获得当前页数,没传表示第1页
        $page = @intval($_GET['page']) ? : 1;

        //分页处理
        //总的条数
        $numbers = db_query('SELECT count(customer_id) as count FROM customer_info WHERE is_used=1');
        $total_count = $numbers[0]['count'];

        //每页的个数
        $page_limit = 2 ;

        //分页配置-动作+总数+每页数+当前页
        extract(page_option("customer_info",$total_count,$page_limit,$page));


        //获取数据
        $data = db_query("SELECT customer_id AS id , customer_name,condition_name,source_name,user_name,type_name,customer_sex,customer_mobile,customer_qq,customer_email,customer_job,customer_company,customer_remark FROM customer_info  LEFT JOIN customer_condition ON customer_info.condition_id = customer_condition.condition_id LEFT JOIN customer_source ON customer_info.source_id = customer_source.source_id LEFT JOIN customer_type ON customer_info.type_id=customer_type.type_id LEFT JOIN user_info ON customer_info.user_id =user_info.user_id WHERE customer_info.is_used=1 ORDER BY customer_id DESC LIMIT $begin_num , $page_limit ;
");
        //显示数据
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_info.php';
    }else{
        //客户信息相关功能
        $step = $_GET['step'];
        switch ($step) {
            //添加
            case 'add':

                if (!isset($_POST['submit'])){
                    //添加客户首页
                    $is_edit = false;
                    //获得客户来源
                    $sourc_data = db_query("SELECT source_id AS id ,source_name AS name from customer_source WHERE is_used=1");
                    //获得客户状态
                    $status_data = db_query("SELECT condition_id AS id,condition_name AS name from customer_condition WHERE is_used=1");
                    //获得客户类别
                    $types_data = db_query("SELECT type_id AS id,type_name AS name from customer_type WHERE is_used=1");
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_info_detail.php';
                }else{

                    //添加客户操作
                    $keys = $values = null;

                    //数据拼接
                    foreach ($_POST as $key => $value){
                        if ($key =='submit'){
                            continue;
                        }
                        $keys .= $key.',';

                        if (strlen($value)>0){
                            $values .= "'"."$value"."'".',';
                        }else{
                            $values .= 'null,';
                        }

                    }
                    $keys = rtrim($keys,',');
                    $values = rtrim($values,',');

                    $sql = "INSERT INTO customer_info ($keys) VALUES ($values)";
                    if(db_exec($sql)){
                        jump('插入成功,1秒后自动跳转...','/action.php?act=customer_info');
                    }else{
                        error_option("/action.php?act=customer_info&step=add");
                    }
                }

                break;
            //编辑
            case 'edit':
                if(!isset($_POST['submit'])){
                    //编辑显示
                    if (isset($_GET['id'])){
                        //获得个人数据
                        $id = $_GET['id'];
                        $info_data = db_query("SELECT * FROM customer_info WHERE customer_id=$id");

                        $info_data = $info_data[0];

                        $is_edit = true;

                        //获得客户来源
                        $sourc_data = db_query("SELECT source_id AS id ,source_name AS name from customer_source WHERE is_used=1");
                        //获得客户状态
                        $status_data = db_query("SELECT condition_id AS id,condition_name AS name from customer_condition WHERE is_used=1");
                        //获得客户类别
                        $types_data = db_query("SELECT type_id AS id,type_name AS name from customer_type WHERE is_used=1");
                        //显示数据
                        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_info_detail.php';

                    }else{
                        error_option("/action.php?act=customer_info");
                    }
                }else{
                    //编辑操作
                    if (isset($_POST['customer_id'])){
                        $id = $_POST['customer_id'];
                        $update_sql = null;
                        foreach ($_POST as $key => $value){

                            if ($key=='submit'||$key=='customer_id')continue;

                            $update_sql .= $key.'='."'".$value."',";
                        }
                        $update_sql = rtrim($update_sql,',');
                        $sql = "UPDATE customer_info SET $update_sql WHERE customer_id=$id";
                        if (db_exec($sql)){
                            jump('编辑成功,1秒后自动跳转...','/action.php?act=customer_info');
                        }else{
                            error_option("/action.php?act=customer_info");
                        }
                    }else{
                        error_option("/action.php?act=customer_info");
                    }
                }
                break;
            //删除
            case 'del':

                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    if (db_exec("UPDATE customer_info SET is_used=0 WHERE customer_id=$id")){
                        jump('删除成功,1秒后自动跳转...','/action.php?act=customer_info');
                    }else{
                        error_option("/action.php?act=customer_info");
                    }
                }else{
                    error_option("/action.php?act=customer_info");
                }

                break;
            default:
                break;
        }
    }
}

//分配
function customer_allot(){
<<<<<<< HEAD
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_allot.php';
=======

    if (!isset($_GET['step'])){
        //分页处理
        $page = @intval($_GET['page']) ? : 1;
        //总的条数
        $numbers = db_query('SELECT count(customer_id) as count FROM customer_info WHERE user_id is NULL AND customer_info.is_used=1');
        $total_count = $numbers[0]['count'];

        //每页的个数
        $page_limit = 5 ;

        //分页配置-动作+总数+每页数+当前页
        extract(page_option("customer_allot",$total_count,$page_limit,$page));

        $allot_data = db_query("SELECT  customer_info.customer_id as id ,customer_info.customer_name,customer_condition.condition_name,customer_source.source_name,customer_type.type_name,customer_info.customer_addtime,customer_info.customer_company,customer_info.customer_remark FROM customer_info LEFT JOIN customer_condition ON customer_info.condition_id=customer_condition.condition_id LEFT JOIN customer_source ON customer_info.source_id=customer_source.source_id LEFT JOIN customer_type ON customer_info.type_id=customer_type.type_id WHERE customer_info.is_used=1 AND customer_info.user_id IS NULL LIMIT {$begin_num},{$page_limit}");

        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_allot.php';
    }else{

        if (!isset($_POST['submit'])){

            $id = $_GET['id'];
            $customer_name = db_query("select customer_name as name from customer_info where customer_id={$id}")[0]['name'];
            $user_data = db_query("SELECT user_name as name,user_id as id FROM user_info WHERE is_used=1");

            include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_allot_detail.php';

        }else{
            $step = $_GET['step'];
            if ($step=='allot'){

                $user_id = $_POST['user_id'];
                $customer_id = $_POST['customer_id'];

                if (db_exec("UPDATE customer_info set user_id={$user_id} WHERE customer_id={$customer_id}")){
                    jump('分配成功...','/action.php?act=customer_allot');
                }else{
                    error_option('/action.php?act=customer_allot');
                }
            }
        }
    }
>>>>>>> 82aa7a2cf8591ff48d2b448cb53a9829383b72e4
}
//关心
function customer_care(){

    if (!isset($_GET['step'])) {
        //单纯的页面展示
        //分页功能-根据数据库的数据做分页功能
        //总条数
        $res = db_query("SELECT count(care_id) as count FROM customer_care WHERE is_used=1");
        $total_count = $res[0]['count'];

        //每页条数
        $page_limit = 3;

        //当前的页数
        $page = @intval($_GET['page'])?:1;

        //将数组中的元素之间写入到参数表中
        extract(page_option("customer_care",$total_count,$page_limit,$page));

        //显示数据-数据库获取数据
        $sql = "select care_id,customer_name,care_theme,care_way,care_time,care_nexttime,care_remark,care_people from customer_care INNER JOIN customer_info on customer_care.customer_id = customer_info.customer_id WHERE customer_care.is_used=1 ORDER BY customer_care.care_id DESC LIMIT {$begin_num},{$page_limit}";

        $care_data = db_query($sql);

        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_care.php';
    }else{
        //功能操作
        $step = $_GET['step'];
        switch ($step) {
            case 'add':

                if (!isset($_POST['submit'])) {
                    //进入添加关怀界面
                    $is_edit = false;

                    //从session中获得user_id
                    session_start();
                    $user_id = $_SESSION['user_id'];

                    //关怀对象
                    $care_obj_data = db_query("SELECT customer_id as id,customer_name as name FROM customer_info WHERE is_used=1 AND user_id={$user_id}");

                    //关怀方式
                    $care_way_data = array('上门拜访','发短信','送礼品卡','打电话问候','请客吃饭','一起开黑');

                    //加载模板
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_care_detail.php';

                }else{

                    $keys = $values = null;
                    //使用循环拼接sql语句
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;

                        $keys .= $key.',';
                        $values .= "'{$value}',";
                    }
                    $keys = rtrim($keys,',');
                    $values = rtrim($values,',');

                    //关怀人
                    //从session中获得user_id
                    session_start();
                    $user_name = $_SESSION['user_name'];

                    $sql = "INSERT INTO customer_care ({$keys},care_time,care_people) VALUE ({$values},NOW(),'{$user_name}')";
                    //执行sql语句
                    if (db_exec($sql)) {
                        jump('插入成功,1秒后自动跳转...','action.php?act=customer_care');
                    }else{
                        error_option('action.php?act=customer_care&step=add');
                    }
                }


                break;
            case 'edit':

                if (!isset($_POST['submit'])) {
                    //显示编辑页面
                    $id = $_GET['id'];

                    //根据id获得单条数据
                    $care_info_data = db_query("SELECT * FROM customer_care WHERE care_id={$id}")[0];

                    //进入添加关怀界面
                    $is_edit = true;

                    //从session中获得user_id
                    session_start();
                    $user_id = $_SESSION['user_id'];

                    //关怀对象
                    $care_obj_data = db_query("SELECT customer_id as id,customer_name as name FROM customer_info WHERE is_used=1 AND user_id={$user_id}");

                    //关怀方式
                    $care_way_data = array('上门拜访','发短信','送礼品卡','打电话问候','请客吃饭','一起开黑');

                    //加载模板
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_care_detail.php';

                }else{
                    //编辑提交
                    $keys = $values = null;
                    //使用循环拼接sql语句
                    $update_sql = null;
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;

                        $update_sql .= "{$key}='{$value}',";
                    }
                    $update_sql = rtrim($update_sql,',');

                    $id = $_POST['care_id'];

                    $sql = "UPDATE customer_care SET {$update_sql},care_time=NOW() WHERE care_id={$id}";
                    //执行sql语句
                    if (db_exec($sql)) {
                        jump('更新成功,1秒后自动跳转...','action.php?act=customer_care');
                    }else{
                        error_option("action.php?act=customer_care&step=edit&id={$id}");
                    }

                }
                break;
            case 'del':

                $id = $_GET['id'];
                if (db_exec("UPDATE customer_care SET is_used=0 WHERE care_id={$id}")) {
                        jump('删除成功,1秒后自动跳转...','action.php?act=customer_care');
                }else{
                        error_option("action.php?act=customer_care");
                }

                break;

            default:

                break;
        }
    }
}
//类型
function customer_type(){
<<<<<<< HEAD
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_type.php';
}
//状态
function customer_status(){
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_status.php';
}
//来源
function customer_source(){
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_source.php';
}
//练习记录
function customer_linkrecord(){
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_link.php';
}
//用户信息
function user_info(){
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'User_info.php';
}
//公告
function notic(){
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_notic.php';
=======
    if (!isset($_GET['step'])){
        //总条数
        $res = db_query("SELECT count(type_id) as count FROM customer_type WHERE is_used=1");
        $total_count = $res[0]['count'];

        //每页条数
        $page_limit = 5;

        //当前的页数
        $page = @intval($_GET['page'])?:1;

        //将数组中的元素之间写入到参数表中
        extract(page_option("customer_type",$total_count,$page_limit,$page));

        //数据
        $sql = "SELECT type_id,type_name FROM customer_type WHERE is_used = 1 LIMIT {$begin_num},{$page_limit} ";
        $type_data = db_query($sql);
        //模板
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_type.php';


    }else{

        $step = $_GET['step'];
        switch ($step){
            case 'add':
                if (!isset($_POST['submit'])){
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_type_detail.php';
                }else{
                    $sql = "INSERT INTO customer_type (type_name) VALUES ('{$_POST['type_name']}')";
                    if (db_exec($sql)){
                        jump('插入成功...','action.php?act=customer_type');
                    }else{
                        error_option('action.php?act=customer_type');
                    }
                }
                break;
            case 'del':
                $type_id = $_GET['id'];
                if (db_exec("UPDATE customer_type SET is_used=0 WHERE type_id={$type_id}")){
                    jump('删除成功...','action.php?act=customer_type');
                }else{
                    error_option('action.php?act=customer_type');
                }
                break;
            default:
                break;
        }
    }
}
//状态
function customer_status(){
    if (!isset($_GET['step'])){
        //总条数
        $res = db_query("SELECT count(condition_id) as count FROM customer_condition WHERE is_used=1");
        $total_count = $res[0]['count'];

        //每页条数
        $page_limit = 5;

        //当前的页数
        $page = @intval($_GET['page'])?:1;

        //将数组中的元素之间写入到参数表中
        extract(page_option(__FUNCTION__,$total_count,$page_limit,$page));

        //数据
        $sql = "SELECT condition_id,condition_name,condition_explain FROM customer_condition WHERE is_used = 1 LIMIT {$begin_num},{$page_limit} ";
        $condition_data = db_query($sql);
        //模板
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_status.php';

    }else{

        $step = $_GET['step'];
        switch ($step){
            case 'add':
                if (!isset($_POST['submit'])){
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_status_detail.php';
                }else{
                    $sql = "INSERT INTO customer_condition (condition_name,condition_explain) VALUES ('{$_POST['condition_name']}','{$_POST['condition_explain']}')";
                    if (db_exec($sql)){
                        jump('插入成功...','action.php?act=customer_status');
                    }else{
                        error_option('action.php?act=customer_status');
                    }
                }
                break;
            case 'del':
                $condition_id = $_GET['id'];
                if (db_exec("UPDATE customer_condition SET is_used=0 WHERE condition_id={$condition_id}")){
                    jump('删除成功...','action.php?act=customer_status');
                }else{
                    error_option('action.php?act=customer_status');
                }
                break;
            default:
                break;
        }
    }
}
//来源
function customer_source(){
    if (!isset($_GET['step'])){
        //总条数
        $res = db_query("SELECT count(source_id) as count FROM customer_source WHERE is_used=1");
        $total_count = $res[0]['count'];

        //每页条数
        $page_limit = 5;

        //当前的页数
        $page = @intval($_GET['page'])?:1;

        //将数组中的元素之间写入到参数表中
        extract(page_option(__FUNCTION__,$total_count,$page_limit,$page));

        //数据
        $sql = "SELECT source_id,source_name FROM customer_source WHERE is_used = 1 LIMIT {$begin_num},{$page_limit} ";
        $source_data = db_query($sql);
        //模板
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_source.php';

    }else{

        $step = $_GET['step'];
        switch ($step){
            case 'add':
                if (!isset($_POST['submit'])){
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_source_detail.php';
                }else{
                    $sql = "INSERT INTO customer_source (source_name) VALUES ('{$_POST['source_name']}')";
                    if (db_exec($sql)){
                        jump('插入成功...','action.php?act=customer_source');
                    }else{
                        error_option('action.php?act=customer_source');
                    }
                }
                break;
            case 'del':
                $source_id = $_GET['id'];
                if (db_exec("UPDATE customer_source SET is_used=0 WHERE source_id={$source_id}")){
                    jump('删除成功...','action.php?act=customer_source');
                }else{
                    error_option('action.php?act=customer_source');
                }
                break;
            default:
                break;
        }
    }

}
//联系记录
function customer_linkrecord(){
    if (!isset($_GET['step'])) {
        //单纯的页面展示
        //分页功能-根据数据库的数据做分页功能
        //总条数
        $res = db_query("SELECT count(record_id) as count FROM customer_linkreord WHERE is_used=1");
        $total_count = $res[0]['count'];

        //每页条数
        $page_limit = 3;

        //当前的页数
        $page = @intval($_GET['page'])?:1;

        //将数组中的元素之间写入到参数表中
        extract(page_option(__FUNCTION__,$total_count,$page_limit,$page));

        //显示数据-数据库获取数据
        $sql = "select record_id,customer_name,link_time,link_nexttime,link_type,link_theme,link_remark from customer_linkreord INNER JOIN customer_info on customer_linkreord.customer_id = customer_info.customer_id WHERE customer_linkreord.is_used=1 ORDER BY customer_linkreord.record_id DESC LIMIT {$begin_num},{$page_limit}";

        $link_data = db_query($sql);

        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_link.php';
    }else{
        //功能操作
        $step = $_GET['step'];
        switch ($step) {
            case 'add':

                if (!isset($_POST['submit'])) {
                    //进入添加关怀界面
                    $is_edit = false;

                    //从session中获得user_id
                    session_start();
                    $user_id = $_SESSION['user_id'];

                    //联系对象
                    $link_obj_data = db_query("SELECT customer_id as id,customer_name as name FROM customer_info WHERE is_used=1 AND user_id={$user_id}");
                    //加载模板
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_link_detail.php';

                }else{

                    $keys = $values = null;
                    //使用循环拼接sql语句
                    foreach ($_POST as $key => $value) {
                        if ($key=='submit') continue;

                        $keys .= $key.',';
                        $values .= "'{$value}',";
                    }
                    $keys = rtrim($keys,',');
                    $values = rtrim($values,',');

                    //关怀人
                    //从session中获得user_id
                    session_start();
                    $user_name = $_SESSION['user_name'];

                    $sql = "INSERT INTO customer_linkreord ({$keys},link_time,who_link) VALUE ({$values},NOW(),'{$user_name}')";
                    //执行sql语句
                    if (db_exec($sql)) {
                        jump('插入成功,1秒后自动跳转...','action.php?act=customer_linkrecord');
                    }else{
                        error_option('action.php?act=customer_linkrecord&step=add');
                    }
                }


                break;

            case 'del':

                $id = $_GET['id'];
                if (db_exec("UPDATE customer_linkreord SET is_used=0 WHERE record_id={$id}")) {
                    jump('删除成功,1秒后自动跳转...','action.php?act=customer_linkrecord');
                }else{
                    error_option("action.php?act=customer_linkrecord");
                }

                break;

            default:

                break;
        }
    }
}
//用户信息
function user_info(){
    //客户信息首页
    if (!isset($_GET['step'])){

        //分页数据处理
        //获得当前页数,没传表示第1页
        $page = @intval($_GET['page']) ? : 1;

        //分页处理
        //总的条数
        $numbers = db_query('SELECT count(user_id) as count FROM user_info WHERE is_used=1');
        $total_count = $numbers[0]['count'];

        //每页的个数
        $page_limit = 5;

        //分页配置-动作+总数+每页数+当前页
        extract(page_option(__FUNCTION__,$total_count,$page_limit,$page));


        //获取数据
        $user_data = db_query("SELECT user_id,user_name,user_sex,user_age,user_mobile,user_email FROM user_info WHERE is_used = 1 LIMIT $begin_num , $page_limit ;
");
        //显示数据
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'User_info.php';
    }else{
        //客户信息相关功能
        $step = $_GET['step'];
        switch ($step) {
            //添加
            case 'add':

                if (!isset($_POST['submit'])){
                    //添加员工首页
                    $is_edit = false;
                    $role_data = array('1'=>'管理员','2'=>'员工');
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'User_info_detail.php';
                }else{

                    //添加员工操作
                    $keys = $values = null;

                    //数据拼接
                    foreach ($_POST as $key => $value){
                        if ($key =='submit'){
                            continue;
                        }
                        $keys .= $key.',';

                        if (strlen($value)>0){
                            $values .= "'"."$value"."'".',';
                        }else{
                            $values .= 'null,';
                        }

                    }
                    $keys = rtrim($keys,',');
                    $values = rtrim($values,',');

                    $sql = "INSERT INTO user_info ($keys,user_addtime) VALUES ($values,now())";
                    if(db_exec($sql)){
                        jump('插入成功,1秒后自动跳转...','/action.php?act=user_info');
                    }else{
                        error_option("/action.php?act=user_info&step=add");
                    }
                }

                break;
            //编辑
            case 'edit':
                if(!isset($_POST['submit'])){
                    //编辑显示
                    if (isset($_GET['id'])){
                        //获得个人数据
                        $id = $_GET['id'];
                        $info_data = db_query("SELECT * FROM user_info WHERE user_id=$id");

                        $info_data = $info_data[0];

                        $is_edit = true;

                        $role_data = array('1'=>'管理员','2'=>'员工');

                        //显示数据
                        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'User_info_detail.php';

                    }else{
                        error_option("/action.php?act=user_info");
                    }
                }else{
                    //编辑操作
                    if (isset($_POST['user_id'])){
                        $id = $_POST['user_id'];
                        $update_sql = null;
                        foreach ($_POST as $key => $value){

                            if ($key=='submit'||$key=='user_id')continue;

                            $update_sql .= $key.'='."'".$value."',";
                        }
                        $update_sql = rtrim($update_sql,',');
                        $sql = "UPDATE user_info SET $update_sql WHERE user_id=$id";
                        if (db_exec($sql)){
                            jump('编辑成功,1秒后自动跳转...','/action.php?act=user_info');
                        }else{
                            error_option("/action.php?act=user_info");
                        }
                    }else{
                        error_option("/action.php?act=user_info");
                    }
                }
                break;
            //删除
            case 'del':

                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    if (db_exec("UPDATE user_info SET is_used=0 WHERE user_id=$id")){
                        jump('删除成功,1秒后自动跳转...','/action.php?act=user_info');
                    }else{
                        error_option("/action.php?act=user_info");
                    }
                }else{
                    error_option("/action.php?act=user_info");
                }

                break;
            default:
                break;
        }
    }
}
//公告
function notic(){
    if (!isset($_GET['step'])){
        //总条数
        $res = db_query("SELECT count(notice_id) as count FROM notice_info WHERE is_used=1");
        $total_count = $res[0]['count'];

        //每页条数
        $page_limit = 5;

        //当前的页数
        $page = @intval($_GET['page'])?:1;

        //将数组中的元素之间写入到参数表中
        extract(page_option(__FUNCTION__,$total_count,$page_limit,$page));

        //数据
        $sql = "SELECT notice_id,notice_title,notice_content,notice_endtime,user_name FROM notice_info LEFT JOIN user_info ON notice_info.user_id=user_info.user_id WHERE notice_info. is_used = 1 LIMIT {$begin_num},{$page_limit} ";
        $data = db_query($sql);
        //模板
        include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_notic.php';

    }else{

        $step = $_GET['step'];
        switch ($step){
            case 'add':
                if (!isset($_POST['submit'])){
                    session_start();
                    $user_name = $_SESSION['user_name'];
                    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_notic_detail.php';
                }else{
                    //添加员工操作
                    $keys = $values = null;

                    //数据拼接
                    foreach ($_POST as $key => $value){
                        if ($key =='submit'){
                            continue;
                        }
                        $keys .= $key.',';

                        if (strlen($value)>0){
                            $values .= "'"."$value"."'".',';
                        }else{
                            $values .= 'null,';
                        }

                    }
                    $keys = rtrim($keys,',');
                    $values = rtrim($values,',');

                    session_start();
                    $user_id = $_SESSION['user_id'];

                    $sql = "INSERT INTO notice_info ($keys,notice_time,user_id) VALUES ($values,now(),$user_id)";
                    if(db_exec($sql)){
                        jump('插入成功,1秒后自动跳转...','/action.php?act=notic');
                    }else{
                        error_option("/action.php?act=notic&step=add");
                    }
                }
                break;
            case 'del':
                $id = $_GET['id'];
                if (db_exec("UPDATE notice_info SET is_used=0 WHERE notice_id={$id}")){
                    jump('删除成功...','action.php?act=notic');
                }else{
                    error_option('action.php?act=notic');
                }
                break;
            default:
                break;
        }
    }
>>>>>>> 82aa7a2cf8591ff48d2b448cb53a9829383b72e4
}


function login_out(){
    // 清空cookie,并退出登录
    setcookie('code','a',time()-1);
    setcookie('user_id','a',time()-1);
    setcookie('timestamp','a',time()-1);
    //销毁session
    session_start();
    session_destroy();

    jump('安全退出中...','index.php');

}