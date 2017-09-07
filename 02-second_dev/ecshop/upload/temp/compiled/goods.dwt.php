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



<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <?php echo $this->_var['ur_here']; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="main-content" class="col-md-8">
                <div class="product">
                    <div class="col-md-6">
                        <div class="image">
                            <?php if ($this->_var['pictures']): ?>
                            <a href="javascript:;" onclick="window.open('gallery.php?id=<?php echo $this->_var['goods']['goods_id']; ?>'); return false;">
                                <img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"/>
                            </a>
                            <?php else: ?>
                            <img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"/>
                            <?php endif; ?>

                            <div class="image-more">
                                <ul class="row">
                                    <?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');if (count($_from)):
    foreach ($_from AS $this->_var['picture']):
?>
                                    <li class="col-lg-3 col-sm-3 col-xs-4"><a href="gallery.php?id=<?php echo $this->_var['id']; ?>&amp;img=<?php echo $this->_var['picture']['img_id']; ?>" target="_blank"><img  src="<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" class="B_blue img-responsive" /></a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
                        <div class="col-md-6">
                            <div class="caption">
                                <div class="name"><h3><?php echo $this->_var['goods']['goods_style_name']; ?></h3></div>
                                <div class="info">
                                    <ul>
                                        <li><?php echo $this->_var['lang']['goods_brand']; ?><?php echo $this->_var['goods']['goods_brand']; ?></li>
                                        <li><?php echo $this->_var['lang']['goods_sn']; ?><?php echo $this->_var['goods']['goods_sn']; ?></li>
                                        <?php if ($this->_var['goods']['goods_number'] != "" && $this->_var['cfg']['show_goodsnumber']): ?>
                                        <?php if ($this->_var['goods']['goods_number'] == 0): ?>
                                        <li><?php echo $this->_var['lang']['goods_number']; ?>  <span style="color: red"><?php echo $this->_var['lang']['stock_up']; ?></span></li>
                                        <?php else: ?>
                                        <li><?php echo $this->_var['lang']['goods_number']; ?><?php echo $this->_var['goods']['goods_number']; ?> <?php echo $this->_var['goods']['measure_unit']; ?></li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="price"><?php echo $this->_var['goods']['shop_price']; ?><span><?php echo $this->_var['goods']['market_price']; ?></span></div>

                                
                                <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
                                <strong><?php echo $this->_var['spec']['name']; ?>:</strong><br />
                                
                                <?php if ($this->_var['spec']['attr_type'] == 1): ?>
                                <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
                                <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                                <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">
                                    <input type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> onclick="changePrice()" />
                                    <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>] </label><br />
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                                <?php else: ?>
                                <select name="spec_<?php echo $this->_var['spec_key']; ?>" onchange="changePrice()">
                                    <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                                    <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </select>
                                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                                <?php endif; ?>
                                <?php else: ?>
                                <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                                <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">
                                    <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
                                    <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>] </label><br />
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                                <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                


                                <div class="well">
                                    <strong><?php echo $this->_var['lang']['amount']; ?>：</strong>
                                    <span id="ECS_GOODS_AMOUNT" class="shop"></span>
                                </div>

                                <div class="well"><label><?php echo $this->_var['lang']['number']; ?>：</label> <input class="form-inline quantity" type="text" value="1" name="number" onblur="changePrice()"><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="btn btn-2 ">加入购物车</a></div>
                                <div class="share well">
                                    <strong style="margin-right: 13px;">Share :</strong>
                                    <a href="#" class="share-btn" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="share-btn" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="share-btn" target="_blank">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="clear"></div>
                </div>
                <div class="product-desc">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#description"><?php echo $this->_var['lang']['goods_brief']; ?></a></li>
                        <li><a href="#review"><?php echo $this->_var['lang']['goods_attr']; ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="description" class="tab-pane fade in active">
                            <?php echo $this->_var['goods']['goods_desc']; ?>
                        </div>
                        <div id="review" class="tab-pane fade">
                            <table class="table table-bordered" bgcolor="#dddddd">
                                <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
                                <tr>
                                    <th colspan="2" bgcolor="#FFFFFF"><?php echo htmlspecialchars($this->_var['key']); ?></th>
                                </tr>
                                <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
                                <tr>
                                    <td bgcolor="#FFFFFF" align="left" width="30%" class="f1">[<?php echo htmlspecialchars($this->_var['property']['name']); ?>]</td>
                                    <td bgcolor="#FFFFFF" align="left" width="70%"><?php echo $this->_var['property']['value']; ?></td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </table>
                        </div>
                    </div>
                </div>

                <?php if ($this->_var['bought_goods']): ?>
                <div class="product-related">
                    <div class="heading"><h2><?php echo $this->_var['lang']['shopping_and_other']; ?></h2></div>
                    <div class="products">

                        <?php $_from = $this->_var['bought_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bought_goods_data');if (count($_from)):
    foreach ($_from AS $this->_var['bought_goods_data']):
?>
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="product">
                                <div class="image"><a href="<?php echo $this->_var['bought_goods_data']['url']; ?>"><img src="<?php echo $this->_var['bought_goods_data']['goods_img']; ?>" alt="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>"  class="goodsimg" /></a></div>

                                <div class="caption">
                                    <div class="name"><h3><a href="<?php echo $this->_var['bought_goods_data']['url']; ?>" title="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>"><?php echo $this->_var['bought_goods_data']['short_name']; ?></a></h3></div>
                                    <div class="price"><?php echo $this->_var['bought_goods_data']['shop_price']; ?><span><?php echo $this->_var['bought_goods_data']['market_price']; ?></span></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                    </div>
                    <div class="clear"></div>
                </div>
                <?php endif; ?>


            </div>
            <div id="sidebar" class="col-md-4">
                <div class="widget wid-categories">
                    <div class="heading"><h4>CATEGORIES</h4></div>
                    <div class="content">
                        <ul>
                            <li><a href="#">PC Computers</a></li>
                            <li><a href="#">Laptops & Notebooks</a></li>
                            <li><a href="#">Mobiles & Tablet</a></li>
                            <li><a href="#">Software</a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget wid-type">
                    <div class="heading"><h4>TYPE</h4></div>
                    <div class="content">
                        <select>
                            <option value="EL" selected>Electronics</option>
                            <option value="MT">Mice and Trackballs</option>
                            <option value="WC">Web Cameras</option>
                            <option value="TA">Tablates</option>
                            <option value="AP">Audio Parts</option>
                        </select>
                    </div>
                </div>
                <div class="widget wid-discouts">
                    <div class="heading"><h4>DISCOUNTS</h4></div>
                    <div class="content">
                        <label class="checkbox"><input type="checkbox" name="discount" checked="">Upto - 10% (20)</label>
                        <label class="checkbox"><input type="checkbox" name="discount">40% - 50% (5)</label>
                        <label class="checkbox"><input type="checkbox" name="discount">30% - 20% (7)</label>
                        <label class="checkbox"><input type="checkbox" name="discount">10% - 5% (2)</label>
                        <label class="checkbox"><input type="checkbox" name="discount">Other(50)</label>
                    </div>
                </div>
                <div class="widget wid-brand">
                    <div class="heading"><h4>BRAND</h4></div>
                    <div class="content">
                        <label class="checkbox"><input type="checkbox" name="brand">Nokia</label>
                        <label class="checkbox"><input type="checkbox" name="brand">Samsung</label>
                        <label class="checkbox"><input type="checkbox" name="brand">Iphone</label>
                        <label class="checkbox"><input type="checkbox" name="brand">HTC</label>
                        <label class="checkbox"><input type="checkbox" name="brand">Oppo</label>
                        <label class="checkbox"><input type="checkbox" name="brand">Kings</label>
                        <label class="checkbox"><input type="checkbox" name="brand">Zumba</label>
                    </div>
                </div>
                <div class="widget wid-product">
                    <div class="heading"><h4>LATEST</h4></div>
                    <div class="content">
                        <div class="product">
                            <a href="#"><img src="themes/default_zy/images/galaxy-note.jpg" /></a>
                            <div class="wrapper">
                                <h5><a href="#">Samsung Galaxy Tab</a></h5>
                                <div class="price">$122</div>
                                <div class="rating"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></div>
                            </div>
                        </div>
                        <div class="product">
                            <a href="#"><img src="themes/default_zy/images/galaxy-s4.jpg" /></a>
                            <div class="wrapper">
                                <h5><a href="#">Samsung Galaxy Tab</a></h5>
                                <div class="price">$122</div>
                                <div class="rating"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></div>
                            </div>
                        </div>
                        <div class="product">
                            <a href="#"><img src="themes/default_zy/images/Z1.png" /></a>
                            <div class="wrapper">
                                <h5><a href="#">Samsung Galaxy Tab</a></h5>
                                <div class="price">$122</div>
                                <div class="rating"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script>

    var goodsId = <?php echo $this->_var['goods_id']; ?>;

    $(document).ready(function(){
        //计算商品总价格
        changePrice();

        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();         // active tab
            var y = $(event.relatedTarget).text();  // previous tab
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });
    /**
     * 点选可选属性或改变数量时修改商品价格的函数
     */
    function changePrice()
    {
        var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
        var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

        $.ajax({
            url:'goods.php?act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty,
            Type:'GET',
            dataType:'JSON',
            success:changePriceResponse
        })


//        Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');

    }

    /**
     * 接收返回的信息
     */
    function changePriceResponse(res)
    {
        console.log(res);
        if (res.err_msg.length > 0)
        {
            alert(res.err_msg);
        }
        else
        {
        console.log(res.qty);
        console.log(res.result);

            document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

            if (document.getElementById('ECS_GOODS_AMOUNT'))
                document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
        }
    }


    function addToCart(goodsId, parentId)
    {
        var goods        = new Object();
        var spec_arr     = new Array();
        var fittings_arr = new Array();
        var number       = 1;
        var formBuy      = document.forms['ECS_FORMBUY'];
        var quick		   = 0;

        // 检查是否有商品规格
        if (formBuy)
        {
            spec_arr = getSelectedAttributes(formBuy);

            if (formBuy.elements['number'])
            {
                number = formBuy.elements['number'].value;
            }

            quick = 1;
        }

        goods.quick    = quick;
        goods.spec     = spec_arr;
        goods.goods_id = goodsId;
        goods.number   = number;
        goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);

        var json_data = 'goods='+JSON.stringify(goods)

        $.ajax({
            url:'flow.php?step=add_to_cart',
            type:'POST',
            dataType:'JSON',
            data:json_data,
            success:addToCartResponse,
        });
    }


    function getSelectedAttributes(formBuy)
    {
        var spec_arr = new Array();
        var j = 0;

        for (i = 0; i < formBuy.elements.length; i ++ )
        {
            var prefix = formBuy.elements[i].name.substr(0, 5);

            if (prefix == 'spec_' && (
                ((formBuy.elements[i].type == 'radio' || formBuy.elements[i].type == 'checkbox') && formBuy.elements[i].checked) ||
                formBuy.elements[i].tagName == 'SELECT'))
            {
                spec_arr[j] = formBuy.elements[i].value;
                j++ ;
            }
        }

        return spec_arr;
    }

    function addToCartResponse(result)
    {
        if (result.error > 0)
        {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
                if (confirm(result.message))
                {
                    location.href = 'user.php?act=add_booking&id=' + result.goods_id + '&spec=' + result.product_spec;
                }
            }
            // 没选规格，弹出属性选择框
            else if (result.error == 6)
            {
                openSpeDiv(result.message, result.goods_id, result.parent);
            }
            else
            {
                alert(result.message);
            }
        }
        else
        {
            var cartInfo = document.getElementById('ECS_CARTINFO');
            var cart_url = 'flow.php?step=cart';
            if (cartInfo)
            {
                cartInfo.innerHTML = result.content;
            }

            if (result.one_step_buy == '1')
            {
                location.href = cart_url;
            }
            else
            {
                switch(result.confirm_type)
                {
                    case '1' :
                        if (confirm(result.message)) location.href = cart_url;
                        break;
                    case '2' :
                        if (!confirm(result.message)) location.href = cart_url;
                        break;
                    case '3' :
                        location.href = cart_url;
                        break;
                    default :
                        break;
                }
            }
        }
    }
</script>
<?php echo $this->fetch('library/page_footer.lbi'); ?>

