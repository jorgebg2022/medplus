<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>MedPlus</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css');?>">
	</head>
	<body>
		<div class="wrapper fadeInDown">
			<div id="formContent">
				<div class="fadeIn first">
					<img src="<?php echo base_url('assets/images/medplus-logo.png');?>" \
						id="icon" alt="User Icon" class="icon-logo"/>
				</div>
				<form action="auth-login" method="POST" enctype="multipart/form-data">
					<input type="text" id="login" class="fadeIn second" \
						name="cpf" placeholder="EX: 000.000.000-00" maxlength="14" minlength="14" \
						onkeydown="javascript: fMasc(this, mCPF);" required>
					<input type="password" id="password" class="fadeIn third" name="password" \
						placeholder="password" required>
					<input type="submit" class="fadeIn fourth" value="Logar">
				</form>
				<div id="formFooter">
					<a class="underlineHover" href="<?php echo base_url('/register');?>">Registrar</a>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/form.js');?>"></script>
	</body>
</html>