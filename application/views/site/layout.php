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
            <div id="goTop" style="float:right; margin-right:100px;" class="nav navbar-right">
                <i class="fa fa-arrow-circle-up fa-4x" aria-hidden="true" title="Lên đầu trang"></i>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="footer">
        <?php $this->load->view('site/footer');?>
    </div>

</div>

<script type="text/javascript">
    $(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 600) $('#goTop').fadeIn();
        else $('#goTop').fadeOut();
    });
    $('#goTop').click(function () {
        $('body').animate({scrollTop: 100}, 'slow');
    });
    });
</script>

</body>
</html>