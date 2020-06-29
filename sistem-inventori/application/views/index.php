<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>AdminLTE | Login Administrator</title>
		<!-- Tell the browser to be responsive to screen width -->
		<link href='<?=config_item('asset'); ?>/image/favicon.png' type='image/x-icon' rel='shortcut icon'>
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?=config_item('asset')?>/bootstrap/css/bootstrap.css">
		<!-- Theme style -->
		<link href="<?=config_item('asset'); ?>bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<link href="<?php echo config_item('asset'); ?>/plugins/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo config_item('asset'); ?>/login.css" rel="stylesheet">
		<script src="<?=config_item('asset')?>/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=config_item('asset')?>/plugins/jQuery/jquery-3.min.js"></script>
	</head>
	<body id="body">
		<div class="container-fluid">
			<div class="login-panel">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="<?php echo base_url('login/cek_login');?>" method="post">
							<div class="form-group">
								<label>Username</label>
								<div class="input-group">
									<div class="input-group-addon">
										<span class='glyphicon glyphicon-user'></span>
									</div>
									<?php 
									echo form_input(array(
										'name' => 'username', 
										'class' => 'form-control', 
										'autocomplete' => 'off', 
										'autofocus' => 'autofocus'
									)); 
									?>
								</div>
							</div>
							<div class="form-group">
								<label>Password</label>
								<div class="input-group">
									<div class="input-group-addon">
										<span class='glyphicon glyphicon-lock'></span>
									</div>
									<?php 
									echo form_password(array(
										'name' => 'password', 
										'class' => 'form-control', 
										'id' => 'InputPassword'
									)); 
									?>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">
							<span class='glyphicon glyphicon-log-in' aria-hidden="true"></span> Sign In </button>
							<button type="reset" class="btn btn-default" id='ResetData'>Reset</button>
						</form>
                        <div>&nbsp;</div>
                        <?php 
								if ($this->session->flashdata('pesan')){
							?>
							<div class="alert alert-dismissible alert-danger">
								<?php echo $this->session->flashdata('pesan');?>
							</div>
							<?php }?>
							<?php 
								if (!empty($pesan)){
							?>
							<div class="alert alert-dismissible alert-danger">
								<?php echo $pesan;?>
							</div>
							<?php }?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
