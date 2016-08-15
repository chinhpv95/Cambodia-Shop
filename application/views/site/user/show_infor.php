<?php
/**
 * Created by PhpStorm.
 * User: dell-pc
 * Date: 8/15/2016
 * Time: 10:52 AM
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
                <p >
                    <label for="name">Tên đầy đủ : </label>
                    <label><?php echo $row->customerName ;?></label>
                </p>
                <p >
                    <label for="address">Địa chỉ : </label>
                    <label> <?php echo $row->address ; ?></label>
                </p>
                <p >
                    <label for="email">Email : </label>
                    <label> <?php echo $row->email ; ?></label>
                </p>
                <p >
                    <label for="tel">Số điện thoại : </label>
                    <label> <?php echo $row->phone ; ?></label>
                </p>
                <p >
                    <label for="identityCard">Số chứng minh thư : </label>
                    <label> <?php echo $row->identityCard ; ?></label>
                </p>
                <p class="submit">
                    <input type="hidden" class="hidden" name="back" value="" />
                    <a href="<?php echo base_url('customer_info/edit_infor'); ?>" type="button" id="SubmitChange" name="SubmitChange" class="btn btn-danger">Sửa thông tin</a>
                    <a href="<?php echo base_url('customer_info/edit_password'); ?>" type="button" class="btn btn-danger" name="SubmitEditPass">Đổi mật khẩu </a>
                </p>
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