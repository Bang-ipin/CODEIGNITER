<!DOCTYPE html>
<!--Author     : @arboshiki-->
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?=$title;?></title>
        <link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>" />
        <link href="<?=base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/global/plugins/font-awesome/css/font-awesome.css');?>" rel="stylesheet"/>
	
        <link rel="stylesheet" href="<?=base_url('assets/admin/pages/css/login.css');?>"/>
    </head>
    <body style="background-image: url('assets/admin/layout/img/3_1920.jpg')">
       <div class="login-wrapper fadeInDown animated">
			<div class="logo">
				<?php if(empty($logo)){?>
					<h4><span><?=$situs;?></span></h4>
				<?php }else{?>
				<a href="<?=site_url();?>">
					<img src="<?=base_url('files/media/'.$logo.'');?>"  style="width:300px;height:50px;" alt=""/>
				</a>
				<?php } ?>
			</div>
			
			<?=form_open('',array('class'=>"lobi-form login-form visible",'id'=>"form"))?>
			    <div class="login-header">
                    Login to your account
                </div>
                <div class="login-body no-padding">
                    <fieldset>
                        <div class="form-group">
                            <label>Username</label>
                            <label class="input">
                                <span class="input-icon input-icon-prepend fa fa-user"></span>
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
								<span class="tooltip tooltip-top-left"><i class="fa fa-user text-cyan-dark"></i> Please enter the username</span>
                            </label>
							<div class="login-validasi"><?= form_error('username'); ?></div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <label class="input">
                                <span class="input-icon input-icon-prepend fa fa-key"></span>
                                <?php 
									echo form_password(array(
										'name'		 	=> 'password', 
										'id'		 	=> 'password', 
										'class' 		=> 'form-control placeholder-no-fix', 
										'placeholder'	=>'password',
										
									)); 
								?>		
                                <span class="tooltip tooltip-top-left"><i class="fa fa-key text-cyan-dark"></i> Please enter your password</span>
                            </label>
							<div class="login-validasi"><?= form_error('password'); ?></div>
                            <button type="button" class="btn-link btn-forgot-password">Forgot your password?</button>
                        </div>

                        <div class="row">
                            <div class="col-xs-8">
                                <label class="checkbox lobicheck lobicheck-info lobicheck-inversed lobicheck-lg">
                                    <input type="checkbox" name="remember_me" value="0"> 
                                    <i></i> Remember me
                                </label>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" name="submit" class="btn btn-info btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="error">
				<?php if(isset($error))
					{
					echo $error; 
					}
				?>
				<?php echo form_close()?>
				
				</div>
            
            <!--Forgot password form-->
            <form action class="lobi-form pass-forgot-form">
                <div class="login-header">
                    Forgot your password?
                </div>
                <div class="login-body">
                    <fieldset>
                        <div class="form-group">
                            <label>Email or username</label>
                            <label class="input">
                                <span class="input-icon input-icon-prepend fa fa-envelope"></span>
                                <span class="input-icon input-icon-append fa fa-user"></span>
                                <input type="text" name="username" placeholder="Email or username">
                                <span class="tooltip tooltip-bottom-right">Type the email or username used for registration</span>
                            </label>
                            <button type="button" class="btn-link btn-sign-in">Remember your password?</button>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-refresh"></i> Restore password</button>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="login-footer">
                    Punya Akun? <button type="button" class="btn btn-xs btn-info btn-sign-in pull-right">Sign In</button>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="<?=base_url('assets/global/plugins/jquery.min.js');?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
        <script type="text/javascript">
            $('.login-wrapper').ready(function(){
                /* $('.login-form').submit(function(){
                    window.location.href = window.location.href+"/../";
                    return false;
                });
                $('.signup-form').submit(function(){
                    return false;
                }); */
                $('.pass-forgot-form').submit(function(){
                    return false;
                });
            });
            $('.btn-forgot-password').click(function(ev){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.pass-forgot-form').addClass('visible');
            });
            $('.btn-sign-in').click(function(){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.login-form').addClass('visible');
            });
            /* $('.btn-sign-up').click(function(){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.signup-form').addClass('visible');
            }); */
        </script>
    </body>
</html>
