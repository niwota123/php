
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
    
    <?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
    <style type="text/css">
        p a{color:#006acd; text-decoration:underline;}
    </style>

</head>

<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="blank"></div>
<div class="block">
  <div class="box">
   <div class="box_1">
    <h3><span><?php echo $this->_var['lang']['system_info']; ?></span></h3>
    <div class="boxCenterList RelaArticle" align="center">
      <div style="margin:20px auto;">
      <p style="font-size: 14px; font-weight:bold; color: red;"><?php echo $this->_var['message']['content']; ?></p>
        <div class="blank"></div>
        <?php if ($this->_var['message']['url_info']): ?>
          <?php $_from = $this->_var['message']['url_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('info', 'url');if (count($_from)):
    foreach ($_from AS $this->_var['info'] => $this->_var['url']):
?>
          <p><a href="<?php echo $this->_var['url']; ?>"><?php echo $this->_var['info']; ?></a></p>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
      </div>
    </div>
   </div>
  </div>
</div>
<div class="blank5"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
