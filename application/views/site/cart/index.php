
<body>

<div class="single-product-area">
    <div class="container">
        <div class="col-md-9">
            <div class="product-content-right">
                <div class="woocommerce" style="font-family: 'Open Sans Condensed', sans-serif;">
                    <form method="post" action="<?php echo base_url('cart/update/')?>">
                        <table cellspacing="0" class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name" style="width: 35%">Sản phẩm</th>
                                <th class="product-price">Đơn giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Thành tiền</th>
                                <th class="product-remove" style="width:1%">&nbsp;</th>
                            </tr>

                            </thead>

                            <tbody>
                            <?php $total_price = 0?>
                            <?php foreach ($carts as $row):?>
                            <tr class="cart_item">

                                <td class="product-thumbnail">
                                    <a href=""><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo base_url('upload/product/'.$row['image_link']) ?>"></a>
                                </td>

                                <td class="product-name">
                                    <a href=""><?php echo $row['name'] ?></a>
                                </td>

                                <td class="product-price">
                                    <span class="amount"><?php echo number_format($row['price']) ?>đ</span>
                                </td>

                                <td class="product-quantity">
                                    <div class="quantity buttons_added">
                                        <input type="number" size="5" name="qty_<?php echo $row['id']?>" class="input-text qty text" title="qty" value="<?php echo $row['qty']?>" min="0" step="1">
                                    </div>
                                </td>

                                <td class="product-subtotal">
                                    <span class="amount"><?php echo number_format($row['subtotal']) ?></span>đ
                                </td>

                                <td class="product-remove">
                                    <a title="Xóa khỏi giỏ hàng" class="remove" href="<?php echo base_url('cart/delete/'.$row['rowid']);  ?>"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                                <?php $total_price = $total_price + $row['subtotal'] ?>
                            <?php endforeach;?>
                            <div style="color: white; font-size: 17px;">
                                <?php 
                                    if ($total_items == 0) echo "Không có sản phẩm nào trong giỏ"; 
                                    else {
                                        echo "Có ";
                                        echo $total_items;
                                        echo " sản phẩm trong giỏ";
                                    } 
                                ?>
                            </div>
                            
                            <br><br>
                            <tr>
                                <td colspan="4">
                                    <div style="color: #ca6330; text-transform: uppercase; font-size: 25px;"> <b>Tổng cộng</b></div>
                                </td>
                                <td colspan="2">
                                    <span class="amount"><b><?php echo number_format($total_price)?> đ </b></span>
                                </td>
                            </tr>
                            <tr>
                               <td style="border: none;"></td> 
                            </tr>
                            <tr>
                               <td style="border: none;"></td> 
                            </tr>
                            <tr>
                                <td class="actions" colspan="6">
                                    <button type="submit" class="checkout-button button alt wc-forward">
                                        <a href="<?php echo base_url('home/index');  ?>">Tiếp Tục Mua Hàng</a>
                                    </button>
<!--                                    <input type="submit" value="Cập nhật" name="update_cart" class="button"  href="--><?php //echo base_url('cart/add/')?><!--">-->
<!--                                    <input type="submit" value="Thanh toán" name="proceed" class="checkout-button button alt wc-forward">-->
                                    <button type="submit" class="checkout-button button alt wc-forward">
                                        <a>Cập nhật</a>
                                    </button>
                                    
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>

                    <br><br>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="woocommerce" style="font-family: 'Open Sans Condensed', sans-serif;">
                <?php if ($this->session->userdata("login") ==NULL ){?>

                    <form enctype="multipart/form-data"  class="checkout" method="post" name="checkout" action="<?php echo base_url('cart/index/')?>">


                        <div id="customer_details" class="col2-set">

                         <div class="col-1">

                            <div class="woocommerce-billing-fields">

                                <center><h3 style="color:#ca6330; font-size: 25px">Đặt hàng</h3></center>



                                <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                    <label class="checkout-info" for="billing_name">Họ tên (*)
                                    </label>
                                    <input type="text" value="" placeholder="" id="billing_first_name" name="name" class="input-text " required>
                                <div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                                </p>


                                <div class="clear"></div>


                                    <p id="billing_company_field" class="form-row form-row-wide">

                                        <label class="checkout-info" for="billing_phone">Số điện thoại (*)</label>


                                        <input type="text" value="" placeholder="" id="billing_company" name="phone" class="input-text " required>

                                        <div class="clear error" name="name_error"><?php echo form_error('phone')?></div>

                                    </p>

                                    <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                        <label class="checkout-info" for="billing_address_1">Địa chỉ (*)
                                        </label>
                                        <input type="text" value="" id="billing_address" name="address" class="input-text " required>
                                         <div class="clear error" name="name_error"><?php echo form_error('address')?></div>
                                    </p>

                                    <div class="clear"></div>

                                    <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                        <label class="checkout-info" for="billing_email">Email (*)
                                        </label>
                                        <input type="text" value="" placeholder="" id="billing_email" name="email" class="input-text" >
                                    </p>

                                    <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                        <label class="checkout-info" for="billing_id">Số CMTND (*)
                                        <input type="text" value="" placeholder="" id="billing_phone" name="identityCard" class="input-text ">
                                    </p>
                                    <div class="clear"></div>
                                           
                                </div>
                            </div>
                        </div>

                    <div style="color:#ca6330; font-size: 18px">
                        <br>
                        <center>
                            <input type="submit" value="Đặt hàng" id="place_order" name="woocommerce_checkout_place_order" data-toggle="modal" data-target="#myModal" onclick="process()">
                        </center>
                    </div>
                    </form>
                    <?php }?>

                    <?php if ($this->session->userdata("login") !=NULL ){
                        $this->load->model('customers_model');
                        $id = $this->session->userdata("id");
                        $input = array();
                        $input['where']['id'] = $id;
                        $list = $this->customers_model->get_list($input);
                        foreach ($list as $row):
                            ?>
                            <form enctype="multipart/form-data"  class="checkout" method="post" name="checkout" action="<?php echo base_url('cart/index/')?>">
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <center><h3 style="color:#ca6330; font-size: 25px">Đặt hàng</h3></center>
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="checkout-info" style="color: #CA6330;" for="billing_name">Họ tên</label>
                                                <label><?php echo $row->customerName; ?></label>
                                            </p>
                                            <div class="clear"></div>
                                            <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="checkout-info" style="color: #CA6330;" for="billing_phone">Số điện thoại</label>
                                                <label><?php echo $row->phone; ?></label>
                                            </p>
                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="checkout-info" style="color: #CA6330;" for="billing_address_1">Địa chỉ</label>
                                                <label><?php echo $row->address; ?></label>
                                            </p>
                                            <div class="clear"></div>
                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="checkout-info" style="color: #CA6330;" for="billing_email">Email</label>
                                                <label><?php echo $row->email; ?></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div style="color:#ca6330; font-size: 18px">
                                    <br>
                                    <center>
                                        <input type="submit" value="Đặt hàng" id="place_order" name="woocommerce_checkout_place_order" data-toggle="modal" data-target="#myModal" onclick="process()">
                                    </center>
                                </div>
                            </form>
                        <?php endforeach; }?>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    function process() {
        var a; 
        a = <?php echo $total_items; ?>;
        if(a == 0) 
            window.alert("Không có sản phẩm trong giỏ, bạn không thể đặt hàng");
        else {
            var $ok = confirm("Bạn có chắc chắn đặt hàng?");
            if($ok==true) {
                window.alert("Bạn đã đặt hàng thành công");
            }
            else {
                location.reload();
            }
        }
    }

    function validate() {
        
    }
</script>

<!-- Modal -->
<!--<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
    	<div class="modal-content">
        	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
          		<h4 class="modal-title">Thông báo</h4>
        	</div>
        	<div class="modal-body">
          		<p>Bạn đã đặt hàng thành công</p>
        	</div>
        	<div class="modal-footer">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Xác nhận</button>
        	</div>
    	</div>
      
    </div>
</div> -->

</body>


