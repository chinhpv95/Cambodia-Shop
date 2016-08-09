
<body>

<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <li>
                <img src="<?php echo public_url('site/')?>/content/h4-slide.png" alt="">
            </li>
            <li>
                <img src="<?php echo public_url('site/')?>/content/h3-slide.png" alt="">
            </li>
            <li>
                <img src="<?php echo public_url('site/')?>/content/h2-slide.png" alt="">
            </li>
            <li>
                <img src="<?php echo public_url('site/')?>/content/h1-slide.png" alt="">
            </li>
            <li>
                <img src="<?php echo public_url('site/')?>/content/h5-slide.png" alt="">
            </li>
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->

<!-- Popular product -->
<div class="container">
    <br><br>
    <h3 style="text-transform: uppercase; color: white; text-align: center; font-size: 35px"><b>danh mục sản phẩm</b> </h3>
    <br><br>
    <div class="row" style="border-bottom: 1px solid #ca6330">
        <div class="col-md-1 sort">Sắp xếp</div>
        <div class="col-md-2">
            <!--<select class="selectpicker form-control" name="sort_product" id="sort_product">
                <option disabled selected value> -- Sắp xếp theo -- </option>
                <optgroup label="Tên">
                    <option value="1">Từ A-Z</option>
                    <option value="2">Từ Z-A</option>
                    </optgroup>
                <optgroup label="Giá">
                    <option value="3">Từ cao xuống thấp</option>
                    <option value="4">Từ thấp lên cao</option>
                </optgroup>
            </select>-->
            <div class="dropdown" id="sort-dropdown">
                <button id="sort-button" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sắp xếp theo
                    <span class="caret" style="margin-left: 40px;"></span>
                </button>
                
                <ul class="dropdown-menu" id="sort-menu">
                    <li><a href="<?php echo base_url('home/sort/1'); ?>">Tên: A đến Z</a></li>
                    <li><a href="<?php echo base_url('home/sort/2'); ?>">Tên: Z dến A</a></li>
                    <li><a href="<?php echo base_url('home/sort/3'); ?>">Giá: Thấp đến cao</a></li>
                    <li><a href="<?php echo base_url('home/sort/4'); ?>">Giá: Cao đến thấp</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-9">
            <table width="100%" cellspacing="10" cellpadding="1" id="checkAll" class="sTable mTable myTable">
                <tr>
                    <td colspan="6" align="center">
                        <?php
                            echo $this->pagination->create_links();
                        ?>
                    </td>
                </tr>
            </table>
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
                    <center><h4><?php echo $row->productName ;  ?></h4></center>
                </div>

                <br>
                <div class="product-carousel-price">
                    <center><ins><?php echo number_format($row->price)?>đ</ins></center>
                </div>
            </div>
        </div>
        <?php endforeach;?>

    </div> <!-- End main content area -->
</div>

</body>
<!--<script>
    $(document).ready(function(){
        $('#sort_product').on('change',function(){
            window.location.href =window.location.href+'?&sort='+$(this).val();
        });
    });
</script>-->