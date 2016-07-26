<html>
<head>
    <?php $this->load->view('admin/head');?>

</head>

<body class="nobg loginPage" style="min-height:100%;">
<div style="top:45%;" class="loginWrapper">
    <div style="height:auto; margin:auto;" id="admin_login" class="widget">
        <div class="title"><img class="titleIcon" alt="" src="<?php echo public_url('admin') ?>/images/icons/dark/laptop.png">
            <h6>Xác nhận</h6>
        </div>

        <form method="post" action="" id="form" class="form">
            <fieldset>

                <div class="formRow">
                    <label for="param_confirm">Nhập mã xác nhận: </label>
                    <div style="margin:0px 0px 15px " class="loginInput"><input type="text" id="param_confirm" name="confirm" value="<?php echo $this->input->get('confirm')?>"></div>
                    <div class="clear"></div>
                    <!--                    <div name="name_error" class="clear error">--><?php //echo form_error('username')?><!--</div>-->
                    <b style="text-align: right;margin: 0px 0px 0px 109px">Chúng tôi đã gửi cho bạn mã đến:</b>
                    <b style="text-align: right;margin: 110px">
                        <?php $info = $this->session->userdata('forgot');
                        echo($info->email);?>
                    </b>
                </div>


                <div class="loginControl">
                    <div style="color:red;font-weight:bold;text-align:center;margin: -10px 0px 10px 19px"><?php echo form_error('confirm');?></div>
                    <input type="hidden" value="1" name="submit">
                    <input type="submit" class="dredB logMeIn" value="Xác nhận" style="margin: 0px 110px">
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php $this->load->view('admin/footer')?>
</body>
</html>
