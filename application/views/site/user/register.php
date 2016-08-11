
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>


<body>
	<div class="container">
        <br><br>
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<div class="woocommerce">
			<form enctype="multipart/form-data" class="register" method="post" name="register">
				<div id="customer_details" class="col2-set">
					<div class="col-1">
						<div class="login-form">
							<h3>Đăng ký</h3>
            				<p class="form-row form-row-last validate-required">
                				<label for="customer_fullname">Tên đầy đủ</label>
                				<input type="text" id="customer_fullname" name="customer_fullname" value="" class="account_input"/>
                				
            				</p>
            				<p class="form-row form-row-last validate-required">
                				<label for="customer_username">Tên đăng nhập</label>
                				<input type="text" id="customer_username" name="customer_username" value="" class="account_input"/>
                				
            				</p>
            				<p class="form-row form-row-last validate-required">
                				<label for="customer_address">Ngày sinh</label>
                				<input type="date" placeholder="" id="datepicker" name="customer_dateofbirth" value="" class="account_input"/>
                				
            				</p>
            				<p class="form-row form-row-last validate-required">
                				<label for="email">E-mail</label>
                				<input type="text" id="email" name="email" value="" class="account_input"/>
                				
            				</p>
            				<p class="form-row form-row-last validate-required">
                				<label for="customer_address">Địa chỉ</label>
                				<input type="text" id="customer_address" name="customer_address" value="" class="account_input"/>
                				
            				</p>
            				<p class="required password">
                				<label for="passwd">Mật khẩu</label>
                				<input type="password" name="passwd" id="passwd" class="account_input"/>
                				
                				<span class="form_info">(có ít nhất 5 ký tự)</span>
            				</p>

            				<p class="form-row form-row-last validate-required">
                				<label for="passwd_confirm">Nhập lại mật khẩu</label>
                				<input type="password" class="text" name="passwd_confirm" id="passwd_confirm" class="account_input"/>
                				
            				</p>
                            <br>
            				<p class="submit">
                                <input type="hidden" class="hidden" name="back" value="" /> 
                                <input type="submit" id="SubmitCreate" name="SubmitCreate" class="button_large" value="Tạo tài khoản" />
                                <input type="hidden" class="hidden" name="SubmitCreate" value="Create your account" />
                            </p>
						</div>
					</div>
				</div>
			</form>
		</div>
		</div>
	</div>
  

	<script>
        var require = {
            paths: {"jquery": "../../lib/jquery-1.11.1"}
        };
    </script>
    <script src="../../lib/require.js" data-main="app.js"></script>
</body>