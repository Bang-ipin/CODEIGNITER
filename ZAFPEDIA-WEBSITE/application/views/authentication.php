
			<!-- ========================================= MAIN ========================================= -->
			<main id="authentication" class="inner-bottom-md">
				<div class="container">
					<div class="row">

						<div class="col-md-6">
							<section class="section sign-in inner-right-xs">
								<h2 class="bordered">Sign In</h2>
								<p>Hello, Welcome to your account</p>

								<!--div class="social-auth-buttons">
									<div class="row">
										<div class="col-md-6">
											<button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
										</div>
										<div class="col-md-6">
											<button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
										</div>
									</div>
								</div-->
								<?php if($this->session->flashdata('SUCCESSMSG')) { ?>
								<div role="alert" class="alert alert-success">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
									<strong>Sukses!</strong>
									<?=$this->session->flashdata('SUCCESSMSG')?>
								</div>
								<?php } ?>
								<div class="error">
									<?php if(isset($error))
										{
										echo $error; 
										}
									?>
								</div>
								<?=form_open('member/login',array('class'=>"login-form cf-style-1",'id'=>"form",'role'=>"form"))?>
									<div class="field-row">
			                            <label>Email</label>
			                            <input type="text" class="le-input" name="email" id="email" required>
			                        </div><!-- /.field-row -->

			                        <div class="field-row">
			                            <label>Password</label>
			                            <input type="text" class="le-input" name="password" id="password" required >
			                        </div><!-- /.field-row -->

			                        <div class="field-row clearfix">
			                        	<span class="pull-left">
			                        		<label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Remember me</span></label>
			                        	</span>
			                        	<span class="pull-right">
			                        		<a href="#" class="content-color bold">Forgotten Password ?</a>
			                        	</span>
			                        </div>

			                        <div class="buttons-holder">
			                            <button type="submit" class="le-button huge">Secure Sign In</button>
			                        </div><!-- /.buttons-holder -->
								<?php echo form_close()?><!-- /.cf-style-1 -->

							</section><!-- /.sign-in -->
						</div><!-- /.col -->

						<div class="col-md-6">
							<section class="section register inner-left-xs">
								<h2 class="bordered">Create New Account</h2>
								<p>Create your own Media Center account</p>

								<?=form_open('member/save',array('id'=>"formregister",'class'=>"register-form cf-style-1",'role'=>"form"));?>
									<div class="field-row">
			                            <label>Email</label>
			                            <input type="text" name="email1" id="email1"  class="le-input" required>
			                        </div><!-- /.field-row -->
									<div class="field-row">
			                            <label>Username</label>
			                            <input type="text" name="username" id="username"  class="le-input" required>
			                        </div><!-- /.field-row -->
									<div class="field-row">
			                            <label>Nama Lengkap</label>
			                            <input type="text" name="fullname" id="fullname"  class="le-input" required>
			                        </div><!-- /.field-row -->
									<div class="field-row">
			                            <label>Password</label>
			                            <input type="password" name="passwordregister" id="passwordregister"  class="le-input" required>
			                        </div><!-- /.field-row -->
									<div class="field-row">
			                            <label>Confirm Password</label>
			                            <input type="password" name="confirm_password" id="confirm_password"  class="le-input" required>
			                        </div><!-- /.field-row -->

			                        <div class="buttons-holder">
			                            <button type="submit" id="submitregister" class="le-button huge">Sign Up</button>
			                        </div><!-- /.buttons-holder -->
								<?php echo form_close()?>

								<h2 class="semi-bold">Sign up today and you'll be able to :</h2>

								<ul class="list-unstyled list-benefits">
									<li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
									<li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
									<li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
								</ul>

							</section><!-- /.register -->

						</div><!-- /.col -->

					</div><!-- /.row -->
				</div><!-- /.container -->
			</main><!-- /.authentication -->
			<!-- ========================================= MAIN : END ========================================= -->
