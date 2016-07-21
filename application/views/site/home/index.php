<style type="text/css">
    @font-face {
        font-family: myFirstFont;
        src: url('public/site/fonts/custom.ttf');
    }

    div {
        font-family: myFirstFont;
    }
</style>


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
    <center><h1>Sản phẩm nổi bật</h1></center>
    <br><br>
    <div class="row">
        <?php foreach ($list as $row):?>
        <div class="col-md-3">
            <div class="thumbnail">
            <div class="single-product">
                <div class="product-hover">
                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                    <a href="<?php echo base_url('home/information'); ?>" class="view-details-link"><i class="fa fa-info"></i> Thông tin</a>
                </div>
                <div class="product-f-image">
                    <img src="<?php echo base_url('upload/product/'.$row->image_link) ?>" alt="">
                </div>
            </div>

                <h3><a href="single-product.html"><?php limit_display($row->productName);  ?></a></h3>


                <div class="product-carousel-price">
                    <ins><?php echo $row->price?>đ</ins>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div> <!-- End main content area -->

    <table width="100%" cellspacing="10" cellpadding="1" id="checkAll" class="sTable mTable myTable">
        <tr>
            <td colspan="6" align="center">
                <ul class="pagination" style=".....">
                    <?php 
                        echo '<li>';
                        echo $this->pagination->create_links();
                        echo '</li>';
                    ?>
                </ul>
            </td>
        </tr>
    </table>


    <?php
    function limit_display($string) {
        $string = strip_tags($string);

        if (strlen($string) > 25) {

            $stringCut = substr($string, 0, 25);

            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
        }
        echo $string;
    }
?>