

<body>
<div class="site-branding-area">
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="logo">
                <h1><a href="<?php echo base_url('home/index/')?>"><img src="<?php echo public_url('site/')?>/content/logo.png"></a></h1>
            </div>
        </div>
        <div class="col-md-5">
            
        </div>
        <div class="col-sm-4">
            <div class="shopping-item">
                <?php $total_price = 0?>
                <?php foreach ($carts as $row):?>
                    <?php $total_price = $total_price + $row['subtotal'] ?>
                <?php endforeach;?>

                <a href="<?php echo base_url('cart/index/')?>">Giỏ hàng - <span class="cart-amunt"><?php echo number_format($total_price)?> VNĐ</span> <i class="fa fa-shopping-cart"></i> <span class="product-count" style="font-size:15px;text-align: center;padding: 0px"><?php echo $total_items?></span></a>
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
                                        <li><a href="<?php echo base_url('product/index/'.$row->categoryID); ?>"><?php echo $row->categoryName?></a></li>
                                    <?php endforeach;?>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url('cart/index/')?>">Giỏ hàng</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->


<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <li>
                <img src="<?php echo public_url('site/')?>/content/h4-slide.png" alt="Khăm Krama">
                <div class="caption-group">
                    <h2 class="caption title">
                        Khăn <span class="primary"> <strong>Krama</strong></span>
                    </h2>
                    <h4 class="caption subtitle">Ngại gì thời tiết</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Mua ngay</a>
                </div>
            </li>
            <li><img src="<?php echo public_url('site/')?>/content/h3-slide.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        Bí mật đế chế <span class="primary"><strong>Angkor</strong></span>
                    </h2>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Mua ngay</a>
                </div>
            </li>
            <li><img src="<?php echo public_url('site/')?>/content/h2-slide.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        Lụa <span class="primary"> <strong>Angkor</strong></span>
                    </h2>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Mua ngay</a>
                </div>
            </li>
            <li><img src="<?php echo public_url('site/')?>/content/h1-slide.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        Bức tranh <span class="primary">làng quê <strong>Campuchia</strong></span>
                    </h2>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Mua ngay</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->

</body>
