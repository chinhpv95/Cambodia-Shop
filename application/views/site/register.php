<head>
<meta charset="utf-8">
<title>ArtisansAngkor</title>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo public_url('/site')?>/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo public_url('/site')?>/css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo public_url('/site')?>/stie/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo public_url('/site')?>/css/style.css">
<link rel="stylesheet" href="<?php echo public_url('/site')?>/css/responsive.css">

<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="<?php echo public_url('/site')?>/js/owl.carousel.min.js"></script>
<script src="<?php echo public_url('/site')?>/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="<?php echo public_url('/site')?>/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="<?php echo public_url('/site')?>/js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="<?php echo public_url('/site')?>/js/bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('/site')?>/js/script.slider.js"></script>
<script type="text/javascript" src="<?php echo public_url('/site')?>/js/script.slider.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>

</head>

<body>
	<div class="container">
		<div class="col-md-4"></div>
		<div class="col-md-6">
		<div class="woocommerce">
			<form enctype="multipart/form-data" class="register" method="post" name="register">
				<div id="customer_details" class="col2-set">
					<div class="col-1">
						<div class="woocommerce-billing-fields">
							<h3>Your personal information</h3>
            				<p class="form-row form-row-last validate-required">
                				<label for="customer_fullname">Full name</label>
                				<input type="text" id="customer_fullname" name="customer_fullname" value="" class="account_input"/>
                				
            				</p>
            				<p class="form-row form-row-last validate-required">
                				<label for="customer_username">User name</label>
                				<input type="text" id="customer_username" name="customer_username" value="" class="account_input"/>
                				
            				</p>
            				<p class="form-row form-row-last validate-required">
                				<label for="customer_address">Date of birth</label>
                				<input type="date" placeholder="" id="datepicker" name="customer_dateofbirth" value="" class="account_input"/>
                				
            				</p>
            				<p class="form-row form-row-last validate-required">
                				<label for="email">E-mail</label>
                				<input type="text" id="email" name="email" value="" class="account_input"/>
                				
            				</p>
            				<p class="form-row form-row-last validate-required">
                				<label for="customer_address">Adress</label>
                				<input type="text" id="customer_address" name="customer_address" value="" class="account_input"/>
                				
            				</p>
            				<p class="required password">
                				<label for="passwd">Password</label>
                				<input type="password" name="passwd" id="passwd" class="account_input"/>
                				
                				<span class="form_info">(5 characters min.)</span>
            				</p>

            				<p class="form-row form-row-last validate-required">
                				<label for="passwd_confirm">Confirm password</label>
                				<input type="password" class="text" name="passwd_confirm" id="passwd_confirm" class="account_input"/>
                				
            				</p>
            				<p class="submit">
                                <input type="hidden" class="hidden" name="back" value="" /> 
                                <input type="submit" id="SubmitCreate" name="SubmitCreate" class="button_large" value="Create account" />
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