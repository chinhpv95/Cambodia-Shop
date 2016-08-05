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
</head>

<body>
        <div class="container">
            <div class="col-md-6">
                <div class="woocommerce">
                <form enctype="multipart/form-data" class="login" method="post" name="login">
                    <div id="customer_details" class="col2-set">
                    <div class="col-1">
                    <div class="woocommerce-billing-fields">
                        <h3>Create your account</h3>
                        <h4>Enter your e-mail address to create an account.</h4>
                            <p class="form-row form-row-last validate-required">
                                <label for="email_create">E-mail address</label>
                                <input type="text" id="email_create" name="email_create" value="" class="account_input" />
                            </p>
                            <p class="submit">
                                <input type="hidden" class="hidden" name="back" value="my-account.php" /> <input type="submit" id="SubmitCreate" name="SubmitCreate" class="button_large" value="Create your account" />
                                <input type="hidden" class="hidden" name="SubmitCreate" value="Create your account" />
                            </p>
                    </div>
                    </div>
                    </div>
                </form>
                </div>                       
            </div>
            <div class="col-md-6">
                <div class="woocommerce">
                    <form enctype="multipart/form-data"  class="checkout" method="post" name="checkout">
                        <div id="customer_details" class="col2-set">
                        <div class="col-1">
                        <div class="woocommerce-billing-fields">
                            <h3>Already registered?</h3>
                            <p class="form-row form-row-last validate-required">
                                <label for="email">E-mail address</label>
                                <input type="text" id="email" name="email" value="" class="account_input" />
                            </p>
                            <p class="form-row form-row-last validate-required">
                                <label for="passwd">Password</label>
                                <input type="password" id="passwd" name="passwd" value="" class="account_input" />
                            </p>
                            <p class="submit">
                                <input type="hidden" class="hidden" name="back" value="my-account.php" /> <input type="submit" id="SubmitLogin" name="SubmitLogin" class="button" value="Log in" />
                            </p>
                            <p class="lost_password form-row form-row-last validate-required validate-phone"><a href="#">Forgot your password?</a></p>
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