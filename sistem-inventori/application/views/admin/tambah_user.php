		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Dashboard
						<small>Sistem Informasi Inventori dan Penjualan</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="box">
							<div class="box-body">
								<form method="post"  name="cekForm" action="<?=base_url('admin/user/checkout');?>" onsubmit="cekEmail(this)">
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="ID">ID</label>
											</div>
											<div class="col-xs-4">
												<input type="text" class="form-control" value="<?php echo $id_user;?>" name="ID" readonly="readonly"  >
												<span class="help-block"> <?php echo form_error('ID'); ?> </span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Username">Username</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="Username"  >
												<span class=" help-block"> <?php echo form_error('Username'); ?> </span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Password">Password</label>
											</div>
											<div class="col-xs-5">
												<input type="password" class="form-control" name="Password" >
												<span class="help-block"> <?php echo form_error('Password'); ?> </span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Email">Email</label>
											</div>
											<div class="col-xs-6">
												<input type="email" class="form-control" name="Email"  >
												<span class="help-block"> <?php echo form_error('Email'); ?> </span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="User">Nama pengguna</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="User"  >
												<span class="help-block"> <?php echo form_error('User'); ?> </span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Level">Usergroup</label>
											</div>
											<div class="col-xs-5">
												<?php echo form_dropdown('Level',$dd_usergroup,$usergroup_selected,$attribute);?>
												<span class="help-block"> <?php echo form_error('Level'); ?> </span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3"></div>
											<div class="col-xs-8">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>admin/user">
												<button type="button" name="kembali" class="btn btn-warning">Kembali</button>
												</a>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
