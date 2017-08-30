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
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_allot.php';
}
//关心
function customer_care(){
    include_once __DIR__.DIRECTORY_SEPARATOR.TMP.'Customer_care.php';
}
//类型
function customer_type(){
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