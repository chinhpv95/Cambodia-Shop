<body>
        <div class="container">
            <br><br>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="woocommerce">
                    <form enctype="multipart/form-data"  class="checkout" method="post" name="checkout">
                        <div id="customer_details" class="col2-set">
                        <div class="col-1">
                        <div class="login-form">
                            <h3>Đăng nhập</h3>
                            <p class="form-row form-row-last validate-required">
                                <label for="email">Tên đăng nhập</label>
                                <input type="text" id="email" name="email" size="50" value="" class="account_input" />
                            </p>
                            <p class="form-row form-row-last validate-required">
                                <label for="passwd">Mật khẩu</label>
                                <input type="password" id="passwd" name="passwd" size="78" value="" class="account_input" />
                            </p>
                            <br>
                            <p class="submit">
                                <input type="hidden" class="hidden" name="back" value="my-account.php" /> <input type="submit" id="SubmitLogin" name="SubmitLogin" class="button" value="Đăng nhập" />
                            </p>
                            <p class="lost_password form-row form-row-last validate-required validate-phone"><a href="<?php echo base_url('forget_password/index/')?>">Quên mật khẩu?</a></p>
                        </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="col-md-3"></div>
        </div>
    <script>
        var require = {
            paths: {"jquery": "../../lib/jquery-1.11.1"}
        };
    </script>
    <script src="../../lib/require.js" data-main="app.js"></script>
</body>