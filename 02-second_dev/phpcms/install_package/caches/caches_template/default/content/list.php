<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div class="com-banner">
    <img src="<?php echo IMG_PATH;?>index_banner.jpg" />
</div>
<div class="com-container">
    <div class="cms-g">
        <div class="am-hide-sm-only am-u-md-3 am-u-lg-3">
            <div class="com-nav-left">
                <h1><em><?php @session_start(); echo $_SESSION['catname'];?></em><i>NEWS</i></h1>

                <?php if($top_parentid) { ?>
                <ul>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=894824ec88c3701696ad9d879ede6b1d&action=category&catid=%24top_parentid&num=15&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'15',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <!-- class="on" -->
                    <li <?php if($catid==$r[catid]) { ?> class="on" <?php } ?>><a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
                <?php } ?>

            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-9 am-u-lg-9">
            <div class="com-nav-title">
                <a href="#doc-oc-demo1" class="font am-show-sm-only" data-am-offcanvas>&#xe68b;</a>
                <span>公司新闻</span>
            </div>

            <?php $subCatid = reset(subcat($catid))[catid];?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fdd667dde353c173fa84f94aa0432180&action=lists&catid=%24catid&num=1&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 1;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
            <?php if($top_parentid==17) { ?>
            <!--新闻列表begin-->
            <div class="new-list">
                <ul>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li><a href="<?php echo $r['url'];?>"><span><?php echo $r['title'];?></span><em><?php echo date('Y-m-d H:i:s',$r[inputtime]);?></em></a></li>
                    <?php $n++;}unset($n); ?>
                </ul>
            </div>
            <!--新闻列表end-->
            <?php } else { ?>
            <!--应用列表 begin-->
            <div class="case-list">
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                    <div class="case-list-item">
                        <a href="<?php echo $r['url'];?>"><img src="<?php echo $r['thumb'];?>" /><span><?php echo $r['title'];?></span></a>
                    </div>
                </div>
                <?php $n++;}unset($n); ?>
            </div>
            <!--应用列表end-->
            <?php } ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

            <div class="page-list">
                <?php echo $pages;?>
            </div>
        </div>
    </div>
</div>
<div id="doc-oc-demo1" class="am-offcanvas">
    <div class="am-offcanvas-bar">
        <div class="am-offcanvas-content com-nav-left com-nav-left1">
            <ul>
                <li class="on"><a href="#">公司新闻</a></li>
                <li><a href="#">产品资讯</a></li>
                <li><a href="#">营销动态</a></li>
            </ul>
        </div>
    </div>
</div>
﻿<?php include template("content","footer"); ?>