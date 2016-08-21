
<script type="text/javascript">

    function number(n) {
        var  i = 0;
        var str = '000';
        var a =0;
        for(i=3;i<n.length-2;i+=3){
            str = n.slice(n.length-i-3,n.length-i) + ','+str;
            a++;
        }
        var  b = n.length- str.length + a;
        return str
    }

    function add(productCode){
        $.ajax({
            url : "<?php echo base_url('cart/add')?>",
            type : "post",
            //dateType:"text",
            data : {
//                categoryId : categoryId,
                productCode :productCode
            },
            success : function (result){
                var getData = $.parseJSON(result);
                var tong = "  "+getData.tong;
                (document.getElementById("total_items").innerHTML) = getData.total_items;
//                (document.getElementById("gia").innerHTML) = number(tong)+' VNĐ';
                alert('Thêm vào giỏ hàng thành công')
            }

        });
    }
    function load(rowid,id,price){
        $.ajax({
            url : "<?php echo base_url('cart/update/')?>",
            type : "post",
            //dateType:"text",
            data : {
                rowid : rowid,
                id     : document.getElementById(id).value,

            },
            success : function (result){
                var getData = $.parseJSON(result);
                var tong_moi_sp = "  "+(getData.qty*price).toString();
                var tong = "  "+getData.tong;
                (document.getElementById("total_items").innerHTML) = getData.total_items;
//                (document.getElementById("gia").innerHTML) = number(tong)+' VNĐ';
                (document.getElementById("gia_1").innerHTML) = number(tong)+' đ';
                (document.getElementById('gia_'+getData.rowid).innerHTML) = number(tong_moi_sp)+' đ';
            }

        });
    }

    function addcart() {
        var name = document.getElementById('billing_name').value;
        var phone = document.getElementById('billing_phone').value;
        var address = document.getElementById('billing_address').value;
        var email = document.getElementById('billing_email').value;
        var identityCard = document.getElementById('billing_identityCard').value;

        $.ajax({
            url: "<?php echo base_url('cart/addorder')?>",
            type: "post",
            //dateType:"text",
            data: {
                name :  name,
                phone   : phone,
                address :address,
                email :email,
                identityCard:identityCard

            },
            success: function (result) {
                var getData = $.parseJSON(result);
                if (getData.name_erro){
                    (document.getElementById("name_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.phone_erro){
                    (document.getElementById("phone_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.address_erro){
                    (document.getElementById("address_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.email_erro){
                    (document.getElementById("email_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.total_items==0){
                    alert('Không có sản phẩm nào.')
                }
                if (getData.true){
                    alert('Đặt hàng thành công!');
                    window.location.href = 'http://localhost/Project/home/index'
                }

            }

        });

    }

    function addcart_user() {
        var name = document.getElementById('billing_name').innerHTML;
        var phone = document.getElementById('billing_phone').innerHTML;
        var address = document.getElementById('billing_address').innerHTML;
        var email = document.getElementById('billing_email').innerHTML;
//        var identityCard = document.getElementById('billing_identityCard').value;

        $.ajax({
            url: "<?php echo base_url('cart/addorder')?>",
            type: "post",
            //dateType:"text",
            data: {
                name :  name,
                phone   : phone,
                address :address,
                email :email,
                identityCard:'',

            },
            success: function (result) {
                var getData = $.parseJSON(result);
                if (getData.name_erro){
                    (document.getElementById("name_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.phone_erro){
                    (document.getElementById("phone_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.address_erro){
                    (document.getElementById("address_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.email_erro){
                    (document.getElementById("email_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.total_items==0){
                    alert('Không có sản phẩm nào.')
                }
                if (getData.true){
                    alert('Đặt hàng thành công!');
                    window.location.href = 'http://localhost/Project/home/index'
                }

            }

        });

    }

    function ad() {
        var name = document.getElementById('customer_username').value;
        var passwd = document.getElementById('customer_passwd').value;
        var customer_fullname = document.getElementById('customer_fullname').value;
        var passwd_confirm = document.getElementById('passwd_confirm').value;
        var email = document.getElementById('email').value;
        var customer_address = document.getElementById('customer_address').value;
        var customer_phone = document.getElementById('customer_phone').value;

        $.ajax({
            url: "<?php echo base_url('signup/register')?>",
            type: "post",
            //dateType:"text",
            data: {
                customerName : customer_fullname,
                email   : email,
                passwd_confirm: passwd_confirm,
                username :name,
                password:passwd,
                phone :customer_phone,
                address : customer_address,

            },
            success: function (result) {
                var getData = $.parseJSON(result);
                if (getData.customer_username_er){
                    (document.getElementById("username_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.passwd_er){
                    (document.getElementById("pass_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.passwd_confirm_er){
                    (document.getElementById("repass_error").innerHTML) = 'Bắt buộc.';
                }
                if (passwd != passwd_confirm && passwd_confirm != null){
                    (document.getElementById("repass_error").innerHTML) = 'Nhập lại mật khẩu!';
                }
                if (getData.customer_fullname_er){
                    (document.getElementById("fullname_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.email_er){
                    (document.getElementById("email_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.customer_address_er){
                    (document.getElementById("address_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.customer_phone_er){
                    (document.getElementById("phone_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.name_ton_tai){
                    alert('Tên đăng nhập đã tồn tại!')
                }else if(getData.phone_ton_tai){
                    alert('Số điện thoại đã tồn tại!')
                }else if (getData.thong_bao_tt){
                    alert('Đăng ký thất bại!!')
                }
                if (getData.thong_bao){
                    alert('Đăng ký thành công!')
                    window.location.href = 'http://localhost/Project/signin/index'
                }
            }

        });
    }

</script>

<body>
<div class="site-branding-area">
    <div class="container">
        <div class="row"">
        <div class="col-md-3">
            <div class="logo">
                <h1><a href="<?php echo base_url('home/index/')?>"><img src="<?php echo public_url('site/')?>/content/logo.png"></a></h1>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-5">
            <div class="row">
                <div class="shopping-item col-md-2" style="width: 80px;">
                    <?php $total_price = 0?>
                    <?php foreach ($carts as $row):?>
                        <?php $total_price = $total_price + $row['subtotal'] ?>
                    <?php endforeach;?>
                    <a href="<?php echo base_url('cart/index/')?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="product-count" style="font-size:15px;text-align: center;padding: 0px" id="total_items"><?php echo $total_items?></span>
                    </a>
                </div>
                <div class="shopping-item col-md-2" style="width: 70px;">
                    <div class="dropdown" style="padding-top: 0px; color: white;">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <div class="dropdown-content">
                            <ul style="list-style: none; text-transform: uppercase; font-size: 18px;">
                                <?php
                                if ($this->session->userdata("login") !=NULL ){
                                    $info = $this->session->userdata("login");
                                    ?>
                                    <li class="info"><a href="<?php echo base_url('customer_info/index/')?>">Trang cá nhân</a> </li>
                                    <li class="info"><a href="<?php echo base_url('signin/logout/')?>">Đăng xuất</a></li>
                                <?php }else{ ?>
                                    <li class="info"><a href="<?php echo base_url('signup/index/')?>">Đăng ký</a></li>
                                    <li class="info"><a href="<?php echo base_url('signin/index/')?>">Đăng nhập</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shopping-item col-md-3" style="color: #FFFFFF; background: transparent; border: none; top: -20px;">
                    <?php
                    if ($this->session->userdata("login") !=NULL ){
                        $info = $this->session->userdata("login");
                        ?>
                        <div style="font-size: 17px; text-align: center;">
                            <li class="info" style="list-style: none;"><?php echo "Chào ";?></li>
                            <li class="info" style="list-style: none;"><?php echo  $info['customerName'];?></li>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- End site branding area --> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('home/index/')?>">Trang chủ</a></li>
                    <li>
                        <div class="dropdown">
                            <a>Sản phẩm</a>
                            <div class="dropdown-content">
                                <ul>
                                    <?php foreach ($category_list as $row):?>
                                        <li><a href="<?php echo base_url('product/index/'.$row->categoryID); ?>"><?php echo $row->categoryName?></a></li>
                                    <?php endforeach;?>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url('cart/index/')?>">Giỏ hàng</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->



</body>
