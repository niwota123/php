<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<script src="<?php echo JS_PATH;?>easyzoom.js"></script>
<div class="com-banner">
	<img src="<?php echo IMG_PATH;?>index_banner.jpg" />
</div>
<div class="com-container">
	<div class="cms-g">
		<div class="am-hide-sm-only am-u-md-3 am-u-lg-3">
			<div class="com-nav-left">
				<h1><em><?php @session_start(); echo $_SESSION['catname'];?></em><i>PRODUCT</i></h1>
				<?php if($top_parentid) { ?>
				<ul>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=894824ec88c3701696ad9d879ede6b1d&action=category&catid=%24top_parentid&num=15&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'15',));}?>
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
					<!-- class="on" -->
					<li><a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li>
					<?php $n++;}unset($n); ?>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</ul>
				<?php } ?>
			</div>
		</div>
		<div class="am-u-sm-12 am-u-md-9 am-u-lg-9">
			<div class="com-nav-title">
				<a href="#doc-oc-demo1" class="font am-show-sm-only" data-am-offcanvas>&#xe68b;</a>
				<span>LED灯具</span>
				<ol class="com-position am-show-md-up">
					<li><a href="#">首页</a></li>
					<li><a href="#">产品中心</a></li>
					<li><a href="#">LED T8灯泡</a></li>
				</ol>
			</div>
			<div class="product-info">
				<div class="am-u-sm-12 am-u-md-6">
					<div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{&quot;animation&quot;:&quot;slide&quot;,&quot;controlNav&quot;:&quot;thumbnails&quot;}'>
						<ul class="am-slides">

							<?php $n=1; if(is_array($pictureurls)) foreach($pictureurls AS $pic_k => $r) { ?>
							<li data-thumb="<?php echo $r['url'];?>">
								<img src="<?php echo $r['url'];?>">
							</li>
							<?php $n++;}unset($n); ?>

						</ul>
					</div>
				</div>

				<?php echo $content;?>

			</div>
		</div>
	</div>
</div>
<div id="doc-oc-demo1" class="am-offcanvas">
	<div class="am-offcanvas-bar">
		<div class="am-offcanvas-content com-nav-left com-nav-left1">
			<ul>
				<li class="on"><span><a href="#">LED T8灯管</a></span></li>
				<li><span><a href="#">LED射灯</a></span></li>
				<li><span><a href="#">LED软光灯</a></span></li>
				<li><span><a href="#">LED泛光灯</a></span></li>
				<li><span><a href="#">LED洗墙灯</a></span></li>
			</ul>
		</div>
	</div>
</div>
﻿<?php include template("content","footer"); ?>
