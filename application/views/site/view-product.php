
<?php foreach ($infor as $row): ?>

<?php endforeach; ?>

<?php foreach ($infor as $row):?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">              
                <div class="col-md-12">
                    <div class="product-content-right">
                        
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img class="img-thumbnail" src="<?php echo base_url('upload/product/'.$row->image_link) ?>" alt="">
                                    </div>

                                </div>
                            </div>
                            

                            <div class="col-md-5 col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name " style="color: white; text-transform: uppercase;"><?php echo $row->productName; ?> </h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo number_format($row->price) ?> VNĐ</ins>
                                    </div>    
                                    
                                    <form action="" class="cart">
                                        <button type="submit">
                                            <a href="<?php echo base_url('cart/add/'.$row->categoryId.'/'.$row->productCode); ?>" class="add-to-cart-link">
                                            <i  style="height: 100px" class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>

                                       </button>
                                    </form>   
                                    
                                   
                                    <br><br><br><br>
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="text-transform: uppercase; font-size: 17px;">Giới thiệu</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="text-transform: uppercase; font-size: 17px;">Đánh giá</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Giới thiệu sản phẩm</h2>  
                                                <p><?php echo $row->description; ?></p>


                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Đánh giá</h2>
                                                <div class="submit-review">
                                                    <div class="rating-chooser">
                                                        <p>Đánh giá của bạn</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Lời nhắn</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Xác nhận"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>
