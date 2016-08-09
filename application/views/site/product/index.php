
<body>

<!-- Popular product -->
<div class="container">
    <br><br>

    <br><br>
    <h3 style="text-transform: uppercase; color: white; text-align: center; font-size: 35px;"> <b>danh mục sản phẩm </b></h3>

    <div class="row" style="border-bottom: 1px solid #ca6330; padding-bottom: 10px;">
        <div class="col-md-1 sort">Sắp xếp</div>
        <div class="col-md-2">
            <select class="selectpicker form-control" name="sort_product" id="sort_product">
                <option disabled selected value> -- Sắp xếp theo -- </option>
                <optgroup label="Tên">
                    <option value="1">Từ A-Z</option>
                    <option value="2">Từ Z-A</option>
                    </optgroup>
                <optgroup label="Giá">
                    <option value="3">Từ cao xuống thấp</option>
                    <option value="4">Từ thấp lên cao</option>
                </optgroup>
            </select>
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
        <div class="col-md-12">
            <?php foreach ($list as $row):?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="single-product">
                            <div class="product-hover">
                                <a href="<?php echo base_url('cart/add/'.$row->categoryId.'/'.$row->productCode); ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                <a href="<?php echo base_url('home/information/'.$row->productCode); ?>" class="view-details-link"><i class="fa fa-info"></i> Thông tin</a>
                            </div>
                            <div class="product-f-image">
                                <img src="<?php echo base_url('upload/product/'.$row->image_link) ?>" title="<?php echo $row->productName ;  ?>">
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
        </div>

    </div> <!-- End main content area -->

</body>
<script>
    $(document).ready(function(){
        $('#sort_product').on('change',function(){
            window.location.href =window.location.href+'?&sort='+$(this).val();
        });
    });
</script>