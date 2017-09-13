<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>制造工业</title>
    ﻿<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="<?php echo IMG_PATH;?>favicon.png">
    <link rel='icon' href='favicon.ico' type='image/x-ico' />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>default.min.css?t=227" />
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script type="text/javascript" src="<?php echo JS_PATH;?>lib/jquery/jquery.min.js"></script>
    <!--<![endif]-->
    <!--[if lte IE 8 ]>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="<?php echo JS_PATH;?>lib/amazeui/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo JS_PATH;?>lib/handlebars/handlebars.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>lib/iscroll/iscroll-probe.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>lib/amazeui/amazeui.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>lib/raty/jquery.raty.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>main.min.js?t=1"></script>
</head>
<body>
<header class="header">
    <div class="header-container">
        <div class="header-div pull-left">
            <a class="header-logo">
                <img src="<?php echo IMG_PATH;?>logo.png" />
            </a>
            <button class="am-show-sm-only am-collapsed font f-btn" data-am-collapse="{target: '.header-nav'}">&#xe68b;</button>
        </div>


        <nav>
            <ul class="header-nav am-collapse">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                <ul class="nav-site">
                    <li><a href="<?php echo siteurl($siteid);?>"><span>首页</span></a></li>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li><a href="<?php echo $r['url'];?>"><span><?php echo $r['catname'];?></span></a></li>
                    <?php $n++;}unset($n); ?>
                </ul>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
            <div class="header-serch  am-hide-md-down">
                <input type="text" name="name" value="" />
                <em class="font">&#xe632;</em>
            </div>
        </nav>


    </div>
</header>
<div  class="am-cf"></div>
<div class="am-slider am-slider-default" data-am-flexslider="{playAfterPaused: 8000}">
    <ul class="am-slides">
        <li><img src="<?php echo IMG_PATH;?>index_banner.jpg" /></li>
        <li><img src="<?php echo IMG_PATH;?>index_banner.jpg" /></li>
        <li><img src="<?php echo IMG_PATH;?>index_banner.jpg" /></li>
    </ul>
</div>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
<div class="index-nav">
    <div class="cms-g">
        <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
            <div class="index-nav-item">
                <div class="index-nav-img">
                    <img src="<?php echo IMG_PATH;?>index_nav01.png" />
                </div>
                <div class="index-nav-info">
                    <h1>芯片封装</h1>
                    <h2>优越品质 绿色环保</h2>
                    <em class="font"><a href="#">详细介绍&#xe72f;</a></em>
                </div>
            </div>
        </div>
        <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
            <div class="index-nav-item">
                <div class="index-nav-img">
                    <img src="<?php echo IMG_PATH;?>index_nav02.png" />
                </div>
                <div class="index-nav-info">
                    <h1>LED电源</h1>
                    <h2>专业技术 高效耐用</h2>
                    <em class="font"><a href="#">详细介绍&#xe72f;</a></em>
                </div>
            </div>
        </div>
        <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
            <div class="index-nav-item">
                <div class="index-nav-img">
                    <img src="<?php echo IMG_PATH;?>index_nav03.png" />
                </div>
                <div class="index-nav-info">
                    <h1>LED灯具</h1>
                    <h2>领先科技 节能高效</h2>
                    <em class="font"><a href="#">详细介绍&#xe72f;</a></em>
                </div>
            </div>
        </div>
        <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
            <div class="index-nav-item">
                <div class="index-nav-img">
                    <img src="<?php echo IMG_PATH;?>index_nav04.png" />
                </div>
                <div class="index-nav-info">
                    <h1>通讯模块</h1>
                    <h2>超强信号 优质体验</h2>
                    <em class="font"><a href="#">详细介绍&#xe72f;</a></em>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="index-content">
    <div class="cms-g">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
            <div class="index-content-left">
                <h1>产品中心</h1>
                <div class="am-slider am-slider-default" data-am-flexslider id="demo-slider-0">
                    <ul class="am-slides">
                        <li><img src="<?php echo IMG_PATH;?>index-content-left-01.png" /></li>
                        <li><img src="<?php echo IMG_PATH;?>index-content-left-01.png" /></li>
                        <li><img src="<?php echo IMG_PATH;?>index-content-left-01.png" /></li>
                        <li><img src="<?php echo IMG_PATH;?>index-content-left-01.png" /></li>
                        <li><img src="<?php echo IMG_PATH;?>index-content-left-01.png" /></li>
                        <li><img src="<?php echo IMG_PATH;?>index-content-left-01.png" /></li>
                    </ul>
                </div>
                <strong><a href="#">E27射灯是220V LED射灯的理想替代品。这款GU10 / E27射灯是高效的LED射灯产品，仅仅只消耗了5W的电压，真正意义降低的能源E27射灯是220V LED射灯的理想替代品。这款GU10 / E27射灯是高效的LED射灯产品，仅仅只消耗了5W的电压，真正意义降低的能源</a></strong>
                <em><a href="#">详情介绍<i class="font">&#xe78d;</i></a></em>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
            <div class="index-content-center">
                <h1>新闻动态<a href="#">MORE<i class="font">&#xe78d;</i></a></h1>
                <ul>
                    <li><a href="#"><span>热看LED产业，组建光电技术公司激流扬帆 </span><em>2017-4-6</em></a></li>
                    <li><a href="#"><span>LED灯具国内业务市场研讨会 LED灯具国内业务</span><em>2017-4-6</em></a></li>
                    <li><a href="#"><span>LED灯具国内业务市场研讨会 LED灯具国内业务</span><em>2017-4-6</em></a></li>
                    <li><a href="#"><span>LED灯具国内业务市场研讨会 LED灯具国内业务</span><em>2017-4-6</em></a></li>
                    <li><a href="#"><span>LED灯具国内业务市场研讨会 LED灯具国内业务</span><em>2017-4-6</em></a></li>
                    <li><a href="#"><span>LED灯具国内业务市场研讨会 LED灯具国内业务</span><em>2017-4-6</em></a></li>
                </ul>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
            <div class="index-content-right">
                <h1>产品应用<a href="#">MORE<i class="font">&#xe78d;</i></a></h1>
                <img src="<?php echo IMG_PATH;?>index-content-right-01.jpg"/>
                <ul>
                    <li><a href="#">惠州市重点路段LED路灯项目 ·惠州市重点路段LED路灯项</a></li>
                    <li><a href="#">惠州市重点路段LED路灯项目 ·惠州市重点路段LED路灯项</a></li>
                    <li><a href="#">惠州市重点路段LED路灯项目 ·惠州市重点路段LED路灯项</a></li>
                    <li><a href="#">惠州市重点路段LED路灯项目 ·惠州市重点路段LED路灯项</a></li>
                    <li><a href="#">惠州市重点路段LED路灯项目 ·惠州市重点路段LED路灯项</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


﻿<footer>
    <div class="cms-g">
        <div class="footer">
            <ul>
                <li><a href="#"><span>网站地图</span></a></li>
                <li><a href="#"><span>访问统计</span></a></li>
                <li><a href="#"><span>友情链接</span></a></li>
                <li><a href="#"><span>法律申明</span></a></li>
            </ul>
            <span style="color:#fff;"><a href="http://www.haothemes.com/" target="_blank" title="好主题">好主题</a>提供 - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></span>
        </div>

    </div>
</footer>
</body>
</html>