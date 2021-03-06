<?php $this->load->view('admin/admin/head', $this->data)?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">

        <div class="title">
            <h6>Cập nhập thông tin Admin</h6>
        </div>
        <form class="form" id="form"  method="post" enctype="multipart/form-data" action="">
            <fieldset>
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value="<?php echo $info->name?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_username">UserName:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="username" id="param_username" _autocheck="true" type="text" value="<?php echo $info->username?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('username')?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_email">Email:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="email" id="param_email" _autocheck="true" type="text" value="<?php echo $info->email?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('email')?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_password">Password:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="password" id="param_password" _autocheck="true" type="password">
                            <p>Nếu cập nhập mật khẩu thì nhập.</p>
                        </span>
                        <span name="name_autocheck" class="autocheck"></span>

                        <div name="name_error" class="clear error"><?php echo form_error('password')?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_re_password">Nhập lại password:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="re_password" id="param_re_password" _autocheck="true" type="password"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('re_password')?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formSubmit">
                    <input type="submit" value="Cập Nhập" class="redB">
                </div>
            </fieldset>

        </form>
    </div>
</div>