<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title> Login Administrator</title>
		<link href="<?=base_url('asset/image/favicon.ico');?>" rel="shortcut icon" />
        <link href="<?=base_url('asset/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/plugins/font-awesome/css/font-awesome.css');?>" rel="stylesheet"/>
	
        <link href="<?=base_url('asset/login.css');?>" rel="stylesheet" />
    </head>
    <body style="background-image: url('asset/img/login/page_bg.jpg')">
       <div class="login-wrapper fadeInDown animated">
			<div class="logo">
				<a href="<?=site_url();?>">
					<img src="<?=base_url('asset/image/logo.png');?>"  style="width:300px;height:80px;" alt="Logo"/>
				</a>
			</div>
			
			<?=form_open('',array('class'=>"lobi-form login-form visible",'id'=>"form"))?>
			    <div class="login-header">
                    Login Admin
                </div>
                <div class="login-body no-padding">
                    <fieldset>
                        <div class="form-group">
                            <label>Username</label>
                            <label class="input">
                                <span class="input-icon input-icon-prepend fa fa-user"></span>
                                <?php echo form_input(array('name' => 'username', 'id' => 'username', 'class' => 'form-control placeholder-no-fix', 'autocomplete'=> 'off', 'autofocus' => 'autofocus','placeholder'=>'username',)); ?>
								<span class="tooltip tooltip-top-left"><i class="fa fa-user text-cyan-dark"></i> Please enter the username</span>
                            </label>
							<div class="login-validasi"><?= form_error('username'); ?></div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <label class="input">
                                <span class="input-icon input-icon-prepend fa fa-key"></span>
                                <?php echo form_password(array('name'	=> 'password', 'id'	=> 'password', 'class' => 'form-control placeholder-no-fix', 'placeholder'	=>'password',)); ?>		
                                <span class="tooltip tooltip-top-left"><i class="fa fa-key text-cyan-dark"></i> Please enter your password</span>
                            </label>
							<div class="login-validasi"><?= form_error('password'); ?></div>
                        </div>
                        <div>
                            <div class="col-xs-6">
                            	<button type="submit" name="submit" class="btn btn-md btn-info btn-sign-in pull-right"><span class="fa fa-sign-in"></span> Login</button>
							</div>
							<div class="col-xs-6">
                                <button type="reset" name="reset" class="btn btn-md btn-danger btn-sign-out pull-left"><span class="fa fa-sign-out"></span> Reset</button>
							</div>
                        </div>
                    </fieldset>
                </div>
				<div class="error">
					<?php if(isset($error)){echo $error; }?>
				</div>
			<?php echo form_close()?>
        </div>
        <script type="text/javascript" src="<?=base_url('asset/plugins/jquery/jquery.min.js');?>"></script>
        <script type="text/javascript" src="<?=base_url('asset/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
        <script type="text/javascript">
            $('.btn-sign-in').click(function(){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.login-form').addClass('visible');
            });
        </script>
    </body>
</html>
