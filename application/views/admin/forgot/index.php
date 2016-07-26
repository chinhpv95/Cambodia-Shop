<html>
<head>
    <?php $this->load->view('admin/head');?>

</head>

<body class="nobg loginPage" style="min-height:100%;">
<div style="top:45%;" class="loginWrapper">
    <div style="height:auto; margin:auto;" id="admin_login" class="widget">
        <div class="title"><img class="titleIcon" alt="" src="<?php echo public_url('admin') ?>/images/icons/dark/laptop.png">
            <h6>Quên mật khẩu</h6>
        </div>

        <form method="post" action="" id="form" class="form">
            <fieldset>

                <div class="formRow">
                    <label for="param_username">Tên đăng nhập:</label>
                    <div class="loginInput"><input type="text" id="param_username" name="username" value="<?php echo $this->input->get('username')?>"></div>
                    <div class="clear"></div>
<!--                    <div name="name_error" class="clear error">--><?php //echo form_error('username')?><!--</div>-->
                </div>

                <div class="formRow">
                    <label for="param_email">Email xác nhận:</label>
                    <div class="loginInput"><input type="text" id="param_email" name="email" value="<?php echo $this->input->get('email')?>"></div>
                    <div class="clear"></div>
<!--                    <div name="name_error" class="clear error">--><?php //echo form_error('email')?><!--</div>-->
                </div>

                <div class="loginControl">
                    <div style="color:red;font-weight:bold;text-align:center;margin: -10px 0px 10px 19px"><?php echo form_error('login');?></div>
                    <input type="hidden" value="1" name="submit" >
                    <input type="submit" class="dredB logMeIn" value="Gửi xác nhận" style="margin: 0px 88px" >
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php $this->load->view('admin/footer')?>
</body>
</html>
