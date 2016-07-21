<html>
<head>
    <?php $this->load->view('site/head');?>
</head>
<body>
<div class="wraper">
    <div class="header">
        <?php $this->load->view('site/header',$this->data)?>
    </div>
    <div id="container">
        <div class="left">
        </div>

        <div class="content">
            <?php if(isset($message)):?>
                <h3 style="color:red"><?php echo $message?></h3>
            <?php endif;?>
            <?php $this->load->view($temp , $this->data);?>
        </div>

        <div class="right">
        </div>
        <div class="clear"></div>
    </div>
    <div class="footer">
        <?php $this->load->view('site/footer');?>
    </div>

</div>

</body>
</html>