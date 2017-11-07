<?php

//1,获取xml
$postXml = $GLOBALS['HTTP_RAW_POST_DATA'];

//2,处理
$postObj = simplexml_load_string($postXml);

//自定义关键字回复
if ($postObj->MsgType == 'image') {
    //处理图片消息
    /*收到的文本格式
     * <xml>
 <ToUserName><![CDATA[toUser]]></ToUserName>
 <FromUserName><![CDATA[fromUser]]></FromUserName>
 <CreateTime>1348831860</CreateTime>
 <MsgType><![CDATA[image]]></MsgType>
 <PicUrl><![CDATA[this is a url]]></PicUrl>
 <MediaId><![CDATA[media_id]]></MediaId>
 <MsgId>1234567890123456</MsgId>
 </xml>
     * */
    //从收到的文本数据中提取数据
    $from_user = $postObj->ToUserName;
    $to_user = $postObj->FromUserName;
    $media_id = $postObj->MediaId;
    $time = time();

    //回复图片数据
//    $template = "<xml>
//<ToUserName><![CDATA[%s]]></ToUserName>
//<FromUserName><![CDATA[%s]]></FromUserName>
//<CreateTime>%s</CreateTime>
//<MsgType><![CDATA[image]]></MsgType>
//<Image>
//<MediaId><![CDATA[%s]]></MediaId>
//</Image>
//</xml>";
    $template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[music]]></MsgType>
<Music>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<MusicUrl><![CDATA[%s]]></MusicUrl>
<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
</Music>
</xml>";

    $title = '小猫';
    //定义音乐描述
    $desc = "你会经常上翘的嘴角,出现在我每一个美好...";
    //定义音乐链接
    $url = 'http://bd.kuwo.cn/yinyue/3327666?from=baidu';
    //定义高清音乐链接
    $hqurl = 'http://bd.kuwo.cn/yinyue/3327666?from=baidu';

    echo sprintf($template,$to_user,$from_user,$time,$title,$desc,$url,$hqurl,$media_id);
}

?>