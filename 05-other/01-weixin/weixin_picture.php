<?php

//1,获取xml
$postXml = $GLOBALS['HTTP_RAW_POST_DATA'];
//2,处理
$postObj = simplexml_load_string($postXml);

//自定义关键字回复
if ($postObj->MsgType == 'text') {
    //处理关键字
    if ($postObj->Content == 'pic') {

       //图文回复-

        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;
        $time = time();

        $items = array(
            array(
                'title'=>'one',
                'des'=>'tow des',
                'pic_url'=>'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=2141237488,2750765765&fm=27&gp=0.jpg',
                'url'=>'https://www.hao123.com'
                ),
            array(
                'title'=>'tow',
                'des'=>'tow des',
                'pic_url'=>'https://www.baidu.com/img/bd_logo1.png',
                'url'=>'https://www.baidu.com'
                ),
            array(
                'title'=>'three',
                'des'=>'tow des',
                'pic_url'=>'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3113311221,65557021&fm=27&gp=0.jpg',
                'url'=>'https://www.soso.com'
                ),
            );


        $count = count($items);
        $template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>{$count}</ArticleCount>
<Articles>";

        foreach ($items as $key => $value) {
            $template .= "<item>
<Title><![CDATA[".$value['title']."]]></Title>
<Description><![CDATA[".$value['des']."]]></Description>
<PicUrl><![CDATA[".$value['pic_url']."]]></PicUrl>
<Url><![CDATA[".$value['url']."]]></Url>
</item>";
        }

        $template.= "</Articles>
</xml>";

        echo sprintf($template,$toUser,$fromUser,$time);
     }
}

?>