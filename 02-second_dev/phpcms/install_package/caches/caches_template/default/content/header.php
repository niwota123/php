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