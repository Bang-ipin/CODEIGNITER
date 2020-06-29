<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE | Login Administrator</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?=config_item('asset')?>/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=config_item('asset')?>/dist/css/AdminLTE.min.css">

	<script src="<?=config_item('asset')?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?=config_item('asset')?>/bootstrap.min.js"></script>

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?=config_item('asset')?>/index2.html"><b>Admin</b>LTE</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<form action="<?php echo base_url('login/cek_login');?>" method="post">
				<?php 
					if ($this->session->flashdata('pesan')){
				?>
				<div class="alert alert-dismissible alert-danger">
					<?php echo $this->session->flashdata('pesan');?>
				</div>
				<?php }?>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
        
				</div>
			</form>
		</div>
	</div>
</body>
</html>
