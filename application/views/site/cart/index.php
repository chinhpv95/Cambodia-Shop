
<body>

<div class="product-big-title-area" style="
            background: none repeat scroll 0 0 green;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Giỏ hàng</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="col-md-6">
            <div class="product-content-right">
                <div class="woocommerce">
                    <form method="post" action="#">
                        <table cellspacing="0" class="shop_table cart">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Sản phẩm</th>
                                <th class="product-price">Đơn giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Tổng cộng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cart_item">
                                <td class="product-remove">
                                    <a title="Remove this item" class="remove" href="#">×</a>
                                </td>

                                <td class="product-thumbnail">
                                    <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/product-thumb-2.jpg"></a>
                                </td>

                                <td class="product-name">
                                    <a href="single-product.html">Thông tin</a>
                                </td>

                                <td class="product-price">
                                    <span class="amount">150000đ</span>
                                </td>

                                <td class="product-quantity">
                                    <div class="quantity buttons_added">
                                        <input type="button" class="minus" value="-">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="0" step="1">
                                        <input type="button" class="plus" value="+">
                                    </div>
                                </td>

                                <td class="product-subtotal">
                                    <span class="amount">150000đ</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="actions" colspan="6">
                                    <input type="submit" value="Tiếp tục mua hàng" name="proceed" class="checkout-button button alt wc-forward">
                                    <input type="submit" value="Cập nhật" name="update_cart" class="button">
                                    <input type="submit" value="Thanh toán" name="proceed" class="checkout-button button alt wc-forward">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-collaterals">
                            <div class="cart_totals ">
                            <h2>Thông tin đơn hàng</h2>

                            <table cellspacing="0">
                                <tbody>
                                <tr class="cart-subtotal">
                                    <th>Đơn giá</th>
                                    <td><span class="amount"></span></td>
                                </tr>

                                <tr class="shipping">
                                    <th>Phí vận chuyển</th>
                                    <td>Miễn phí</td>
                                </tr>

                                <tr class="order-total">
                                    <th>Tổng cộng</th>
                                    <td><strong><span class="amount"></span></strong> </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>    
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="woocommerce">
                <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">
                     <div id="customer_details" class="col2-set">
                        <div class="col-1">
                            <div class="woocommerce-billing-fields">
                                <center><h2 style="color:green;">Thông tin khách hàng</h2></center>

                                <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                    <label class="" for="billing_name">Họ tên <abbr title="required" class="required">*</abbr>
                                   </label>
                                    <input type="text" value="" placeholder="" id="billing_first_name" name="billing_name" class="input-text ">
                                </p>

                                <div class="clear"></div>

                                    <p id="billing_company_field" class="form-row form-row-wide">
                                        <label class="" for="billing_phone">Số điện thoại <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <input type="text" value="" placeholder="" id="billing_company" name="billing_phone" class="input-text ">
                                    </p>

                                    <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                        <label class="" for="billing_address_1">Địa chỉ <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <input type="text" value="" id="billing_address" name="billing_address" class="input-text ">
                                    </p>

                                    <div class="clear"></div>

                                    <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                        <label class="" for="billing_email">Email<abbr title="required"></abbr>
                                        </label>
                                        <input type="text" value="" placeholder="" id="billing_email" name="billing_email" class="input-text ">
                                    </p>

                                    <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                        <label class="" for="billing_id">Số CMTND <abbr title="required"></abbr>
                                        </label>
                                        <input type="text" value="" placeholder="" id="billing_phone" name="billing_id" class="input-text ">
                                    </p>
                                    <div class="clear"></div>
                                           
                                </div>
                            </div>
                        </div>            
                    </form>
                    <div>
                        <center>
                            <input type="submit" value="Đặt hàng" id="place_order" name="woocommerce_checkout_place_order" data-toggle="modal" data-target="#myModal">
                        </center>
                    </div>
                </div>                       
            </div> 
        </div>
    </div>
</div>
</div>

</body>
