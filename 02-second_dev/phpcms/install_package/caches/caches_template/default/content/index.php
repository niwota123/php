<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
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

<!--现获取子目录id&ndash;&gt;根据子目录的id获取子目录下的列表-->
<div class="index-content">
    <div class="cms-g">

        <?php $n=1;if(is_array(subcat(0,0,0,$siteid))) foreach(subcat(0,0,0,$siteid) AS $r) { ?>
        <?php if($r[catid]==23) { ?>
        <!--产品中心-->
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
            <div class="index-content-left">
                <h1><?php echo $r['catname'];?></h1>
                <div class="am-slider am-slider-default" data-am-flexslider id="demo-slider-0">
                    <!--得到图片文章的内容-->
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=15a618ac23cb04025c00b44c6ee9f0cb&action=lists&catid=%24r%5Bcatid%5D&num=1&order=id+DESC&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$info = $content_tag->lists(array('catid'=>$r[catid],'order'=>'id DESC','limit'=>'1',));}?>

                    <!--得到图片文章的id-->
                    <?php $pic = reset($info); $pic_id = $pic[id]; $pic_des = $pic[description];$pic_url = $pic[url];?>
                    <!--得到产品中心一条图片文章数据,根据id获取图片文章内的图片数组-->
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=74791a5084f7e909cb3ef2d9a29cddcc&sql=SELECT+pictureurls+FROM+v9_picture_data+WHERE+id%3D%24pic_id&cache=3600&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$tag_cache_name = md5(implode('&',array('sql'=>'SELECT pictureurls FROM v9_picture_data WHERE id=$pic_id',)).'74791a5084f7e909cb3ef2d9a29cddcc');if(!$data = tpl_cache($tag_cache_name,3600)){pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT pictureurls FROM v9_picture_data WHERE id=$pic_id LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
                    <!--处理json字符串数据,将字符串数据转换成数组-->
                    <?php $json_str = $data[0][pictureurls];$json_arr = json_decode($json_str,true);?>
                    <!--遍历图片数组-->
                    <ul class="am-slides">
                        <?php $n=1;if(is_array($json_arr)) foreach($json_arr AS $img) { ?>
                        <li><img src="<?php echo $img['url'];?>" /></li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
                <strong><a href="<?php echo $pic_url;?>"><?php echo $pic_des;?></a></strong>
                <em><a href="<?php echo $pic_url;?>">详情介绍<i class="font">&#xe78d;</i></a></em>

                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
        <?php } elseif ($r[catid]==17) { ?>
        <!--新闻动态-->
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
            <div class="index-content-center">
                <h1><?php echo $r['catname'];?><a href="<?php echo $r['url'];?>">MORE<i class="font">&#xe78d;</i></a></h1>
                <ul>
                    <!--通过栏目id,查找本栏目下的列表数据-->
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d9a5a0d61f080dbce4b2774d783edd34&action=lists&catid=%24r%5Bcatid%5D&num=5&order=id+DESC&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$info = $content_tag->lists(array('catid'=>$r[catid],'order'=>'id DESC','limit'=>'5',));}?>
                    <!--循环列表数据,显示在页面上-->
                    <?php $n=1;if(is_array($info)) foreach($info AS $new) { ?>
                    <li><a href="<?php echo $new['url'];?>"><span><?php echo $new['title'];?></span><em><?php echo date('Y-m-d H:i:s',$new[inputtime]);?></em></a></li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                </ul>
            </div>
        </div>
        <?php } else { ?>
        <!--产品应用-->
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
            <div class="index-content-right">
                <h1><?php echo $r['catname'];?><a href="<?php echo $r['url'];?>">MORE<i class="font">&#xe78d;</i></a></h1>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ef41dd2190feee94486d0264e7354ef2&action=lists&catid=%24r%5Bcatid%5D&order=updatetime+DESC&thumb=1&num=1&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$info = $content_tag->lists(array('catid'=>$r[catid],'order'=>'updatetime DESC','thumb'=>'1','limit'=>'1',));}?>
                <img src="<?php echo reset($info)[thumb];?>"/>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                <ul>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d9a5a0d61f080dbce4b2774d783edd34&action=lists&catid=%24r%5Bcatid%5D&num=5&order=id+DESC&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$info = $content_tag->lists(array('catid'=>$r[catid],'order'=>'id DESC','limit'=>'5',));}?>
                    <?php $n=1;if(is_array($info)) foreach($info AS $new) { ?>
                    <li><a href="<?php echo $new['url'];?>"><?php echo $new['title'];?></a></li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                </ul>
            </div>
        </div>
        <?php } ?>
        <?php $n++;}unset($n); ?>

    </div>
</div>


<?php include template("content","footer"); ?>