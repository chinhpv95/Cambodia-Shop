
<body>

<!-- Popular product -->
<div class="container">
    <br><br>
            
            <center><h1>Danh sách sản phẩm</h1></center;


    <br><br>
    <div class="row">
        <div class="col-md-12">
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
                        <h4><?php echo $row->productName ;  ?></h4>
                    </div>

                    <br>
                    <div class="product-carousel-price">
                        <ins><?php echo number_format($row->price)?> VNĐ</ins>
                    </div>
                </div>
            </div>
            <?php endforeach;?>    
        </div>
        
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

</body>