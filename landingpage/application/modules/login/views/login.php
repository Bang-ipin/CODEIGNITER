<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8"/>
		<title><?=$title;?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
		<link href="<?=base_url('asset/global/plugins/font-awesome/css/font-awesome.css');?>" rel="stylesheet"/>

		<!-- Global styles START -->
		<link href="<?=base_url('asset/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
		<!--<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css" rel="stylesheet">-->
		<!-- Global styles END -->

		<!-- Page level plugin styles START -->
		<link href="<?=base_url('asset/global/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css"/>
		<!-- Page level plugin styles END -->

		<link href="<?=base_url('asset/global/css/components-md.css');?>" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/global/css/plugins.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/admin/layout/css/layout.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/admin/pages/css/login.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/admin/layout/css/themes/default.css');?>" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="<?=base_url('asset/admin/layout/css/custom.css');?>" rel="stylesheet" type="text/css"/>
		<link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>">

	</head>
	<body class="login">
		<div class="logo">
			<?php if(empty($logo)){?>
				<h4><span><?=$situs;?></span></h4>
			<?php }else{?>
			<a href="<?=site_url();?>">
				<img src="<?=base_url('files/media/'.$logo.'');?>"  style="width:300px;height:50px;" alt=""/>
			</a>
			<?php } ?>
		</div>
		<div class="menu-toggler sidebar-toggler"></div>
		<div class="content">
			<?=form_open('',array('class'=>"login-form",'id'=>"form"))?>
			<h3 class="form-title">Sign In</h3>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="input-icon">
					<i class="fa fa-user"></i>
					<?php
						echo form_input(array(
							'name' 			=> 'username',
							'id' 			=> 'username',
							'class' 		=> 'form-control placeholder-no-fix',
							'autocomplete'	=> 'off',
							'autofocus' 	=> 'autofocus',
							'placeholder'	=>'username',
							));
						?>
				</div>
				<div class="login-validasi"><?= form_error('username'); ?></div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
						<?php
						echo form_password(array(
							'name'		 	=> 'password',
							'id'		 	=> 'password',
							'class' 		=> 'form-control placeholder-no-fix',
							'placeholder'	=>'password',

						));
					?>
				</div>
				<div class="login-validasi"><?= form_error('password'); ?></div>
			</div>
			<div class="form-actions">
				<label class="checkbox"></label>
				<button type="submit" name="submit" class="btn green-haze pull-right">Login <i class="m-icon-swapright m-icon-white"></i></button>
			</div>
			<?php echo form_close()?>
			<div class="forget-password">
				<h4>Forgot your password ?</h4>
				<p>
					no worries, click <a href="javascript:;" id="forget-password">
					here </a>
					to reset your password.
				</p>
			</div>
		</div>
		<div class="error">
		<?php if(isset($error))
			{
			echo $error;
			}
		?>
		</div>
		<div class="copyright">
			Metronic ©  <?php date_default_timezone_set('Asia/Jakarta'); echo date('Y');?> . Admin Dashboard Template.
		</div>
		<!-- BEGIN CORE PLUGINS -->
		<script src="<?=base_url('asset/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->

		<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
		<script src="<?=base_url('asset/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/uniform/jquery.uniform.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery.cokie.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery.validate.min.js');?>" type="text/javascript" ></script>
		<!-- END PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->

		<script src="<?=base_url('asset/global/scripts/metronic.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/admin/layout/scripts/layout.js');?>" type="text/javascript"></script>
		<script>
			jQuery(document).ready(function() {
			Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			});
		</script>
	</body>
</html>
