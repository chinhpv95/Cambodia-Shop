<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ជំរាបសួរ</title>
	<style type="text/css">
		@font-face {
   			font-family: myFirstFont;
   			src: url('public/site/fonts/custom.ttf');
   		}

		div {
   			font-family: myFirstFont;
		}
	</style>
</head>
<body>

<?php
	$this->load->view('site/header.php');
?>

<?php
	$this->load->view('site/body.php');
?>

<?php
	$this->load->view('site/cart.php');
?>

<?php
	$this->load->view('site/footer.php');
?>


</body>
</html>