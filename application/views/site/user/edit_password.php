<?php
/**
 * Created by PhpStorm.
 * User: dell-pc
 * Date: 8/15/2016
 * Time: 3:23 PM
 */
?>

<body xmlns="http://www.w3.org/1999/html">

<div class="container">
    <?php $this->load->view('site/user/customer-info',$this->data)?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
        <?php foreach ($list as $row):?>
            <!-- customer infor -->
            <div class="bhoechie-tab-content active">
                <div id="customer_details" >
                    <div class="woocommerce-billing-fields">
                        <h3>Sửa mật khẩu</h3>
                        <form method="post" action="">
                            <p>
                                <label for="name">Mật khẩu hiện tại : </label>
                                <input type="password" id="password_recent" name="password_recent" value="" class="" />
                                <div class="error" id="passrecent_error"><?php echo form_error('password_recent')?></div>
                            </p>

                            <p>
                                <label for="passwd">Mật khẩu mới</label>
                                <input type="password" name="password_new" id="password_new" size="78" class=""/>
                                <div class="error" id="passnew_error"><?php echo form_error('password_new')?></div>
                            </p>

                            <p class="form-row form-row-last validate-required">
                                <label for="passwd_confirm">Nhập lại mật khẩu mới</label>
                                <input type="password" class="text" name="password_confirm" size="78" id="password_confirm" class=""/>
                                <div class="error" id="repass_error"><?php echo form_error('password_confirm')?></div>
                            </p>

                            <p class="submit">
                                <input type="hidden" class="hidden" name="back" value="" />
                                <input type="submit" id="SubmitCreate" name="SubmitCreate" class="btn btn-danger" value="Xác nhận" />
                                <input type="hidden" class="hidden" name="SubmitChange" value="" />
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- shopping history -->
        <?php endforeach;?>
        <div class="bhoechie-tab-content">

        </div>
    </div>
</div>
</div>
</div>


</body>

