
<body>

<!-- Popular product -->
<div class="container">
    <br><br>

    <br><br>
    <h3 style="text-transform: uppercase; color: white; text-align: center; font-size: 35px;"> <b>danh mục sản phẩm </b></h3>

    <div class="row" style="border-bottom: 1px solid #ca6330; padding-bottom: 10px;">
        <div class="col-md-1 sort">Sắp xếp</div>
        <div class="col-md-2">
            <div class="dropdown" id="sort-dropdown">
                <button id="sort-button" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sắp xếp theo
                    <span class="caret" style="margin-left: 40px;"></span>
                </button>
                <?php foreach ($list as $row):?>
                    <ul class="dropdown-menu" id="sort-menu">
                        <li><a href="<?php echo base_url('product/sort/'.$row->categoryId."/1"); ?>">Tên: A đến Z</a></li>
                        <li><a href="<?php echo base_url('product/sort/'.$row->categoryId."/2"); ?>">Tên: Z dến A</a></li>
                        <li><a href="<?php echo base_url('product/sort/'.$row->categoryId."/3"); ?>">Giá: Thấp đến cao</a></li>
                        <li><a href="<?php echo base_url('product/sort/'.$row->categoryId."/4"); ?>">Giá: Cao đến thấp</a></li>
                    </ul>
                <?php endforeach;?>
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
        <div class="col-md-12">
            <?php foreach ($list as $row):?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="single-product">
                            <div class="product-hover">
                                <a onclick="add('<?php echo $row->productCode?>')" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
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