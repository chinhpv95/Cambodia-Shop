

<body>
<div class="site-branding-area">
<div class="container">
    <div class="row"">
        <div class="col-md-3">
            <div class="logo">
                <h1><a href="<?php echo base_url('home/index/')?>"><img src="<?php echo public_url('site/')?>/content/logo.png"></a></h1>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-5">
            <div class="row">
                <div class="shopping-item col-md-2" style="width: 80px;">
                    <?php $total_price = 0?>
                    <?php foreach ($carts as $row):?>
                        <?php $total_price = $total_price + $row['subtotal'] ?>
                    <?php endforeach;?>
                    <a href="<?php echo base_url('cart/index/')?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="product-count" style="font-size:15px;text-align: center;padding: 0px"><?php echo $total_items?></span>
                    </a>
                </div>
                <div class="shopping-item col-md-2" style="width: 70px;">
                    <div class="dropdown" style="padding-top: 0px; color: white;">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <div class="dropdown-content">
                            <ul style="list-style: none; text-transform: uppercase; font-size: 18px;">
                                <?php
                                if ($this->session->userdata("login") !=NULL ){
                                    $info = $this->session->userdata("login");
                                    ?>
                                    <li class="info"><a href="<?php echo base_url('customer_info/index/')?>">Trang cá nhân</a> </li>
                                    <li class="info"><a href="<?php echo base_url('signin/logout/')?>">Đăng xuất</a></li>
                                <?php }else{ ?>
                                    <li class="info"><a href="<?php echo base_url('signup/index/')?>">Đăng ký</a></li>
                                    <li class="info"><a href="<?php echo base_url('signin/index/')?>">Đăng nhập</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shopping-item col-md-3" style="color: #FFFFFF; background: transparent; border: none; top: -20px;">
                    <?php
                    if ($this->session->userdata("login") !=NULL ){
                        $info = $this->session->userdata("login");
                        ?>
                        <div style="font-size: 15px; text-align: center; top: -15px;">
                            <li class="info" style="list-style: none;"><?php echo "Chào ";?></li>
                            <li class="info" style="list-style: none;"><?php echo  $info['customerName'];?></li>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!--abc-->
            <!--<div class="shopping-item">
                <form action="" class="search-form">
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="search" id="search" placeholder="Tìm kiếm">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>-->
        </div>
    </div>
</div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
                            <a>Sản phẩm</a>
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



</body>
