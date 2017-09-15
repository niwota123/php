<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<div class="com-banner">
    <img src="<?php echo IMG_PATH;?>index_banner.jpg"/>
</div>

<div class="com-container">
    <div class="cms-g">
        <div class="am-hide-sm-only am-u-md-3 am-u-lg-3">
            <div class="com-nav-left">
                <h1><em><?php @session_start(); echo $_SESSION['catname'];?></em><i>ABOUT US</i></h1>
                <ul >
                    <?php $n=1;if(is_array($arrchild_arr)) foreach($arrchild_arr AS $cid) { ?>
                    <li<?php if($catid==$cid) { ?> class="on"<?php } ?>><a href="<?php echo $CATEGORYS[$cid]['url'];?>"><?php echo $CATEGORYS[$cid]['catname'];?></a></li>
                    <?php $n++;}unset($n); ?>
                </ul>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-9 am-u-lg-9">
            <div class="com-nav-title">
                <a href="#doc-oc-demo1" class="font am-show-sm-only" data-am-offcanvas>&#xe68b;</a>
                <span><?php echo $title;?></span>
            </div>
            <div class="com-nav-content">
                <span><?php echo $content;?></span>
            </div>
        </div>
    </div>
</div>
﻿<?php include template("content","footer"); ?>

﻿