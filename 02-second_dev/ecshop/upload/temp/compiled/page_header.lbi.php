

<body>

<nav id="top">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <select class="language">
                    <option value="English" selected>English</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                </select>
                <select class="currency">
                    <option value="USD" selected>USD</option>
                    <option value="EUR">EUR</option>
                    <option value="DDD">DDD</option>
                </select>
            </div>
            <div class="col-xs-6">
                <ul class="top-link">
                    <?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
                    <!--<li><a href="account.html"><span class="glyphicon glyphicon-user"></span> My Account</a></li>-->
                    <!--<li><a href="contact.html"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>-->
                </ul>
            </div>
        </div>
    </div>
</nav>

<header class="container">
    <div class="row">
        <div class="col-md-4">
            <div id="logo"><img src="themes/default_zy/images/logo.png" /></div>
        </div>
        <div class="col-md-4">
            <form class="form-search">
                <input type="text" class="input-medium search-query">
                <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
        <div class="col-md-4">
            <div id="cart"><a class="btn btn-1" href="<?php echo $this->_var['cart_data']['url']; ?>"><span class="glyphicon glyphicon-shopping-cart"></span>CART : <?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> ITEM</a></div>
        </div>
    </div>
</header>

<nav id="menu" class="navbar">
    <div class="container">
        <div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php"<?php if ($this->_var['navigator_list']['config']['index'] == 1): ?> class="cur"<?php endif; ?>><?php echo $this->_var['lang']['home']; ?><span></span></a></li>
                <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
                <li><a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?> <?php if ($this->_var['nav']['active'] == 1): ?> class="cur"<?php endif; ?>><?php echo $this->_var['nav']['name']; ?><span></span></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
    </div>
</nav>


