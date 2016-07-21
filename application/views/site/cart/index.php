
<style type="text/css">
    @font-face {
        font-family: myFirstFont;
        src: url('public/fonts/custom.ttf');
    }

    div {
        font-family: myFirstFont;
    }
</style>


<body>

<div class="product-big-title-area" style="
            background: url(public/site/content/crossword.png) none repeat scroll 0 0 green;">
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
        <div class="col-md-12">
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

                    <div class="cart-collaterals">


                        <div class="cross-sells">
                            <h2>Sản phẩm liên quan</h2>
                            <ul class="products">
                                <li class="product">
                                    <a href="single-product.html">
                                        <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                        <h3>Thông itn</h3>
                                        <span class="price"><span class="amount">200000đ</span></span>
                                    </a>

                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Thông tin</a>
                                </li>

                                <li class="product">
                                    <a href="single-product.html">
                                        <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
                                        <h3>Thông tin</h3>
                                        <span class="price"><span class="amount">200000đ</span></span>
                                    </a>

                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Thông tin</a>
                                </li>
                            </ul>
                        </div>


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
</div>

</body>
