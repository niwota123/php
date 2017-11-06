<?php

header('content-type:text/html;charset=utf-8');
//1,获取xml
$postXml = $GLOBALS['HTTP_RAW_POST_DATA'];
//2,处理
$postObj = simplexml_load_string($postXml);

//自定义关键字回复
//实现天气预报功能
if ($postObj->MsgType == 'text') {
    $key = $postObj->Content;
    //将微信用户发送的内容,传递给三方api接口来获取数据
    $jsonArr = cityTianqi($key);
    if ($jsonArr) {
        //返回文本内容

        $city = $jsonArr['HeWeather data service 3.0'][0]['basic']['city'];
        $tianqi = $jsonArr['HeWeather data service 3.0'][0]['aqi']['city']['qlty'];
        $r_content = $city."\n".$tianqi;

        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;
        $time = time();

        $template = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[text]]></MsgType>
    <Content><![CDATA[%s]]></Content>
    </xml>";

        echo  sprintf($template, $toUser,$fromUser,$time,$r_content);

    }
}

function cityTianqi($city){
    //http://apistore.baidu.com/microservice/weather?cityname=北京
    //curl
    //PHP中的常用的 api请求工具
     //curl使用
    $ch = curl_init();

    $url = 'http://apis.baidu.com/heweather/pro/weather?city='.$city;
    $header = array(
        'apikey: f087325ca8cce25cd894541e0ff3d9f4',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);

    //这是返回数据输出
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);

    $res = curl_exec($ch);

    $jsonArr = json_decode($res,true);
    return $jsonArr;
}

?>