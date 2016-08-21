<?php
/**
 * Created by PhpStorm.
 * User: dell-pc
 * Date: 8/15/2016
 * Time: 11:21 AM
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
                    <div class="edit-info">
                        <h3>Sửa thông tin</h3>
                        <form method="post" action="">
                            <p >
                                <label for="name">Tên đầy đủ : </label>
                                <input type="text" id="name" name="name" value="<?php echo $row->customerName ;?>" class="account_show" />
                            <div class="error" id="username_error"><?php echo form_error('name')?></div>
                            </p>
                            <!--  <p >
                            <label for="password">Password : </label>
                            <input type="password" id="password" name="password" value="<?php /*echo $row->password ;*/?>" class="account_show" />
                        </p>-->
                            <p >
                                <label for="address">Địa chỉ : </label>
                                <input type="text" id="address" name="address" value="<?php echo $row->address ;?>" class="account_show" />
                            <div class="error" id="username_error"><?php echo form_error('address')?></div>
                            </p>
                            <p >
                                <label for="email">Email : </label>
                                <input type="text" id="email" name="email" value="<?php echo $row->email ;?>" class="account_show" />
                            <div class="error" id="username_error"><?php echo form_error('email')?></div>
                            </p>
                            <p >
                                <label for="tel">Số điện thoại : </label>
                                <input type="text" id="tel" name="tel" value="<?php echo $row->phone ;?>" class="account_show" />
                            <div class="error" id="username_error"><?php echo form_error('tel')?></div>
                            </p>
                            <p >
                                <label for="identityCard">Số chứng minh thư : </label>
                                <input type="text" id="identityCard" name="identityCard" value="<?php echo $row->identityCard ;?>" class="account_show" />
                            <div class="error" id="username_error"><?php echo form_error('identityCard')?></div>
                            </p>
                            <br>
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
