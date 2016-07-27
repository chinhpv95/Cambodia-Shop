
<body>

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

<!-- Popular product -->
<div class="container">
    <br><br>
    <h3 style="text-transform: uppercase; color: green; text-align: center">Sản phẩm nổi bật </h3>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <div class="flag navbar-left">
                Tên loại sản phẩm
            </div> 
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
            <select class="selectpicker form-control">
                <option disabled selected value> -- Sắp xếp theo -- </option>
                <optgroup label="Tên">
                    <option>Từ A-Z</option>
                    <option>Từ Z-A</option>
                    </optgroup>
                <optgroup label="Giá">
                    <option>Từ cao xuống thấp</option>
                    <option>Từ thấp lên cao</option>
                </optgroup>
            </select>
        </div>
        
    </div>
    <br><br>

    <div class="row">
        <?php foreach ($list as $row):?>
        <div class="col-md-3">
            <div class="thumbnail">
            <div class="single-product">
                <div class="product-hover">
                    <a href="<?php echo base_url('cart/add/'.$row->productCode); ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                   <a href="<?php echo base_url('home/information/'.$row->productCode); ?>" class="view-details-link"><i class="fa fa-info"></i> Thông tin</a>
                </div>
                <div class="product-f-image">
                    <img src="<?php echo base_url('upload/product/'.$row->image_link) ?>" alt="">
                </div>
            </div>
                <br>
                <div class="product-title">
                    <h4 ><?php echo $row->productName ;  ?></h4>
                </div>

                <br>
                <div class="product-carousel-price">
                    <ins><?php echo number_format($row->price)?>đ</ins>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div> <!-- End main content area -->

    <table width="100%" cellspacing="10" cellpadding="1" id="checkAll" class="sTable mTable myTable">
       <tr>
            <td colspan="6" align="center">
                    <?php
                        echo $this->pagination->create_links();
                    ?>
            </td>
        </tr>
    </table>

</body>