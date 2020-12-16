<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?=$title;?></title>
        <link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>" />
        <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.css');?>" rel="stylesheet"/>
        <link rel="stylesheet" href="<?=base_url('assets/admin/css/login.css');?>"/>
    </head>
    <body style="background-image: url('assets/admin/img/3_1920.jpg')">
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
                            
                        </div>

                        <div>
                            <div class="col-xs-12">
                                <button type="submit" name="submit" class="btn btn-md btn-info btn-sign-in pull-right"><span class="fa fa-sign-in"></span> Login</button>
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
				</div>
			<?php echo form_close()?>
        </div>
        <script type="text/javascript" src="<?=base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
        <script type="text/javascript">
            $('.btn-sign-in').click(function(){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.login-form').addClass('visible');
            });
        </script>
    </body>
</html>
