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
								<?php foreach($query as $rows)?>
								<form action="<?php echo base_url('admin/user/checkoutedit');?>" name="cekForm" method="POST" onsubmit="cekEmail(this)">
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Id">ID</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name ="Id" readonly ="TRUE"
												value="<?php echo $rows->id_user?>">
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Id'); ?> </span>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Username">Username</label>
											</div>
											<div class="col-xs-6">
												<input type="text" class="form-control" name="Username"
												value="<?php echo $rows->username;?>">
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Username'); ?> </span>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Password">Password</label>
											</div>
											<div class="col-xs-6">
												<input type="password" class="form-control" name="Password" 
												value="<?php echo $rows->password;?>" >
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Password'); ?> </span>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Email">Email</label>
											</div>
											<div class="col-xs-8">
												<input type="email" class="form-control" name="Email"  
												value="<?php echo $rows->email;?>" >
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Email'); ?> </span>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="User">Nama pengguna</label>
											</div>
											<div class="col-xs-7">
												<input type="text" class="form-control" name="User" 
												value="<?php echo $rows->nama_pengguna;?>" >
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('User'); ?> </span>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="Level">Usergroup</label>
											</div>
											<div class="col-xs-8">
												<?php 
													$usergroup_selected= $this->input->post('Level')?$this->input->post('Level'):$rows->id_usergroup;
													echo form_dropdown('Level',$dd_usergroup,$usergroup_selected,$attribute);
												?>
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Level'); ?> </span>
										<div class="form-group">
											<div class="col-xs-3">
											</div>
											<div class="col-xs-7">
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
		