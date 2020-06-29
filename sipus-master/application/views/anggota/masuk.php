		<link href="<?=config_item('asset');?>/loginanggota.css" rel="stylesheet" />
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					<?=$title;?>
				</h1>
			</section>
			<section class="content-ang">
				<div class="login-wrapper fadeInDown animated">
					<?=form_open('welcome/ceklogin',array('class'=>"lobi-form login-form visible",'id'=>"form"))?>
						<div class="login-header">
							Selamat Datang Pengunjung Perpustakaan SMK Piri Sleman
						</div>
						<div class="login-body no-padding">
							<fieldset>
								<div class="form-group">
									<label class="input">
										<?php echo form_input(array('name' => 'username', 'id' => 'username', 'class' => 'form-control placeholder-no-fix', 'autocomplete'=> 'off', 'autofocus' => 'autofocus','placeholder'=>'Id Anggota',)); ?>
										<span class="tooltip tooltip-top-left"><i class="fa fa-user text-cyan-dark"></i> Silakan Masukkan Id Anggota</span>
									</label>
									<div class="login-validasi"><?= form_error('username'); ?></div>
								</div>
								<div class="form-group m-b-65">
									<label class="input">
										<?php echo form_input(array('type' => 'password','name' => 'password', 'id' => 'password', 'class' => 'form-control placeholder-no-fix', 'autocomplete'=> 'off', 'autofocus' => 'autofocus','placeholder'=>'Password',)); ?>
										<span class="tooltip tooltip-top-left"><i class="fa fa-user text-cyan-dark"></i> Silakan Masukkan Id Anggota</span>
									</label>
									<div class="login-validasi"><?= form_error('password'); ?></div>
								</div>
								<div>
									<div class="col-xs-6">
										<button type="submit" name="submit" class="btn btn-lg btn-info btn-sign-in pull-right"><span class="fa fa-save"></span> Login</button>
									</div>
									<div class="col-xs-6">
										<button type="reset" name="reset" class="btn btn-lg btn-danger btn-sign-out pull-left"><span class="fa fa-reset"></span> Reset</button>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="error">
							<?php 
								if ($this->session->flashdata('message')){
							?>
							<div class="alert alert-dismissible alert-danger">
								<?php echo $this->session->flashdata('message');?>
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
					<?php echo form_close()?>
				</div>
			</section>
		</div>
		<script type="text/javascript">
		$("#username").keyup(function(e){
			var isi = $(e.target).val();
			$(e.target).val(isi.toUpperCase());
		});
		</script>