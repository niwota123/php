<?php
//方法调用区域

var_dump(push_model_msg());




////////////////////////////////////////////
//调用微信服务器的api接口
//我们自己的服务器和微信的服务器打交道
//PHP如何请求三方API,使用curl

//封装curl请求方法
function c_get($url){

    //curl初始化
    $curl = curl_init();
    //配置curl
    $options = array(
        CURLOPT_URL=>$url,//请求地址
        CURLOPT_RETURNTRANSFER => TRUE,//获取的信息以字符串返回，而不是直接输出。
    );
    //设置配置
    curl_setopt_array($curl,$options);

    //执行curl
    $res = curl_exec($curl);

    //对结果进行处理,将json转换成数组
    return json_decode($res,TRUE);
}

//curl post 请求
function c_post($url,$data){

    //curl初始化
    $curl = curl_init();
    //配置curl
    $options = array(
        CURLOPT_URL=>$url,//请求地址
        CURLOPT_RETURNTRANSFER => TRUE,//获取的信息以字符串返回，而不是直接输出。
        CURLOPT_POST=>TRUE,//设置请求为post请求
        CURLOPT_POSTFIELDS=>$data,//设置post请求的参数
    );
    //设置配置
    curl_setopt_array($curl,$options);

    //执行curl
    $res = curl_exec($curl);

    //对结果进行处理,将json转换成数组
    return json_decode($res,TRUE);
}

//获取acess_token
function get_token(){

    if (!isset($_COOKIE['access_token'])||!$_COOKIE['access_token']){

        $app_id = 'wx4f0f644947fe46b1';
        $app_secret = 'b3659146469b8089d4035b6de57b788f';

        //api接口的地址
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$app_id}&secret={$app_secret}";

        //使用curl发起get请求
        $res = c_get($url);
        $access_token = $res['access_token'];
        $expires_in = $res['expires_in'];

        //将access_token放到cookie中
        setcookie('access_token',$access_token,time()+$expires_in);
    }

    return $_COOKIE['access_token'];
}

//获取微信服务器ip-list
function get_server_list(){
    $token = get_token();
    $url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token={$token}";
    return c_get($url);
}

//设置自定义菜单
function set_custom_list(){
    $token = get_token();
    $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$token}";

    //click - view
//    $post_data = array('button'=>array(
//        array('type'=>'click','name'=>urlencode('今日歌曲'),'key'=>'jrgq'),
//        array('type'=>'view','name'=>urlencode('百度'),'url'=>'http://www.baidu.com'),
//    ));

    //其他
    $post_data = array('button'=>array(
        array('name'=>urlencode('扫码'),'sub_button'=>array(
            array('type'=>'scancode_waitmsg','name'=>urlencode('扫码带提示'),'key'=>'rselfmenu_0_0'),
            array('type'=>'scancode_push','name'=>urlencode('扫码推事件'),'key'=>'rselfmenu_0_1'),
        )),
        array('name'=>urlencode('发图'),'sub_button'=>array(
            array('type'=>'pic_sysphoto','name'=>urlencode('系统拍照发图'),'key'=>'rselfmenu_1_0'),
            array('type'=>'pic_photo_or_album','name'=>urlencode('拍照或者相册发图'),'key'=>'rselfmenu_1_1'),
            array('type'=>'pic_weixin','name'=>urlencode('微信相册发图'),'key'=>'rselfmenu_1_2'),
        )),
        array('name'=>urlencode('其他'),'sub_button'=>array(
            array('type'=>'location_select','name'=>urlencode('发送位置'),'key'=>'rselfmenu_2_0'),
            array('type'=>'media_id','name'=>urlencode('图片'),'media_id'=>'QkZVykzwm8guVPqKtJyMm0OsICCrnLAiyKt9G-ks9yU'),
            array('type'=>'view_limited','name'=>urlencode('图文消息'),'media_id'=>'QkZVykzwm8guVPqKtJyMm_313YlGX2-jBDfTssGqH3U'),
        )),
    ));



    //数组转换成json
    $post_data = json_encode($post_data);
    //url解码
    $post_data = urldecode($post_data);

    return c_post($url,$post_data);
}

//获取素材列表
function get_media_list(){
    $token = get_token();
    $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token={$token}";

//    素材的类型，图片（image）、视频（video）、语音 （voice）、图文（news）
    $post_data = array('type'=>'image','offset'=>'0','count'=>'20');

    $post_data = json_encode($post_data);
    return c_post($url,$post_data);
}

//上传图片永久资源
function upload_img(){

    $token = get_token();
    //媒体文件类型，分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb）
    $url ="https://api.weixin.qq.com/cgi-bin/material/add_material?access_token={$token}&type=thumb";

    //表单的形式上传图片
    //filename、filelength、content-type
    $post_data = array('media'=>'@/yjdata/www/www/a.png');

    return c_post($url,$post_data);
}

//上传图文资源
function upload_news(){
    $token = get_token();
    $url = "https://api.weixin.qq.com/cgi-bin/material/add_news?access_token={$token}";

    $post_data = array('articles'=>array(
        array(
        'title'=>urlencode('测试图文消息'),
        'thumb_media_id'=>'QkZVykzwm8guVPqKtJyMm6__yfygb3_4zteSvxh4hJs',
        'author'=>'superking',
        'digest'=>urlencode('描述消息'),
        'show_cover_pic'=>'1',
        'content'=>"a news title",
        'content_source_url'=>''
    )));

    $post_data = urldecode(json_encode($post_data));
    return c_post($url,$post_data);
}

//群发-测试
function push_all_test(){
    $token = get_token();
    $url = "https://api.weixin.qq.com/cgi-bin/message/mass/preview?access_token={$token}";
    $post_data = array(
        'touser'=>'ozaBM0QuCl80lkeHODQdPdeF_7o4',
        'mpnews'=>array('media_id'=>'QkZVykzwm8guVPqKtJyMm_313YlGX2-jBDfTssGqH3U'),
        'msgtype'=>'mpnews');


    $post_data = json_encode($post_data);
    return c_post($url,$post_data);
}

//群发
function push_all(){
    $token = get_token();
    $url = "https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token={$token}";

    $post_data = array(
        'filter'=>array(
            'is_to_all'=>TRUE),
        'mpnews'=>array('media_id'=>'QkZVykzwm8guVPqKtJyMm_313YlGX2-jBDfTssGqH3U'),
        'msgtype'=>'mpnews',
        'send_ignore_reprint'=>'1');


    $post_data = json_encode($post_data);
    return c_post($url,$post_data);
}

//模板消息
function push_model_msg(){
    $token = get_token();
    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$token}";

    $post_data = array(
        'touser'=>'ozaBM0YyfRVaXHugtVHowbsHmxuQ',
        'template_id'=>'qQsecj4ZJFvcrLFMP0Ol4jOKcypCZ1LaeRSu0aTtavc',
        'url'=>'http://www.baidu.com',
        'data'=>array(
            'title'=>array('value'=>urlencode('标题'),'color'=>'#173177'),
            'time'=>array('value'=>date('Y-m-d H:i:s',time()),'color'=>'#173177')
        ),
        );
    $post_data = urldecode(json_encode($post_data));
    return c_post($url,$post_data);
}

?>