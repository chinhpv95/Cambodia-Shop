
<style type="text/css">
    @font-face {
        font-family: myFirstFont;
        src: url('public/fonts/custom.ttf');
    }

    div {
        font-family: myFirstFont;
    }
</style>

<div class="site-branding-area">
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="logo">
                <h1><a href="<?php echo base_url('home/index/')?>"><img src="<?php echo public_url('site/')?>/content/logo.png"></a></h1>
            </div>
        </div>
        <div class="col-md-6">
            <br><br>
            <center><h3>Cambodia Shop Vietnam </h3></center>
        </div>
        <div class="col-sm-3">
            <div class="shopping-item">
                <a href="<?php echo base_url('cart/index/')?>">Giỏ hàng - <span class="cart-amunt">0đ</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">0</span></a>
            </div>
        </div>
    </div>
</div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('home/index/')?>">Trang chủ</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="<?php echo base_url('home/index/')?>">Sản phẩm</a>
                            <div class="dropdown-content">
                                <ul>
                                    <?php foreach ($category_list as $row):?>
                                        <li><a href="<?php echo base_url('home/product'); ?>"><?php echo $row->categoryName?></a></li>
                                    <?php endforeach;?>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url('cart/index/')?>">Giỏ hàng</a></li>
                    <li><a href="<?php echo base_url('checkout/index/')?>">Thanh toán</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
