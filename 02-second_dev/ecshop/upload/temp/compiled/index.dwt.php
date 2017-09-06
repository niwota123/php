<!DOCTYPE html>
<html lang="en">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mobile Shop</title>

    
    <link href="themes/default_zy/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    
    <link href="themes/default_zy/css/style.css" rel="stylesheet" type="text/css" />

    
    <link href="themes/default_zy/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="themes/default_zy/fonts/font-slider.css" rel="stylesheet" type="text/css" />


    <?php echo $this->smarty_insert_scripts(array('files'=>'jquery-2.1.1.js,bootstrap.min.js')); ?>

</head>

<?php echo $this->fetch('library/page_header.lbi'); ?>






<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
<div id="page-content" class="home-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    
                    <ol class="carousel-indicators hidden-xs">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="themes/default_zy/images/main-banner1-1903x600.jpg" alt="First slide">
                            
                            <div class="header-text hidden-xs">
                                <div class="col-md-12 text-center">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="themes/default_zy/images/main-banner2-1903x600.jpg" alt="Second slide">
                            
                            <div class="header-text hidden-xs">
                                <div class="col-md-12 text-center">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="themes/default_zy/images/main-banner3-1903x600.jpg" alt="Third slide">
                            
                            <div class="header-text hidden-xs">
                                <div class="col-md-12 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="banner">
                <div class="col-sm-4">
                    <img src="themes/default_zy/images/sub-banner1.png" />
                </div>
                <div class="col-sm-4">
                    <img src="themes/default_zy/images/sub-banner2.png" />
                </div>
                <div class="col-sm-4">
                    <img src="themes/default_zy/images/sub-banner3.png" />
                </div>
            </div>
        </div>


        <?php if ($this->_var['best_goods']): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading"><h2>精品推荐</h2></div>
                <div class="products">

                    <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="product">

                            <div class="image"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="goodsimg" /></a></div>
                            <div class="caption">

                                <div class="name"><h3><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a></h3></div>
                                <div class="price"><?php echo $this->_var['goods']['shop_price']; ?><span><?php echo $this->_var['goods']['market_price']; ?></span></div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                </div>
            </div>
        </div>
        <?php endif; ?>


        <div class="row">
            <div class="banner">
                <div class="col-sm-6">
                    <img src="themes/default_zy/images/sub-banner4.jpg" />
                </div>
                <div class="col-sm-6">
                    <img src="themes/default_zy/images/sub-banner5.png" />
                </div>
            </div>
        </div>

        <?php if ($this->_var['new_goods']): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading"><h2>新品推荐</h2></div>
                <div class="products">

                    <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="product">

                            <div class="image"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="goodsimg" /></a></div>
                            <div class="caption">

                                <div class="name"><h3><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a></h3></div>
                                <div class="price"><?php echo $this->_var['goods']['shop_price']; ?><span><?php echo $this->_var['goods']['market_price']; ?></span></div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this->_var['hot_goods']): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading"><h2>热卖商品</h2></div>
                <div class="products">

                    <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="product">

                            <div class="image"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="goodsimg" /></a></div>
                            <div class="caption">

                                <div class="name"><h3><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a></h3></div>
                                <div class="price"><?php echo $this->_var['goods']['shop_price']; ?><span><?php echo $this->_var['goods']['market_price']; ?></span></div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>


