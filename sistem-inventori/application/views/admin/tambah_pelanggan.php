<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Dashboard
				<small>Sistem Informasi Inventori dan Penjualan</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<?php echo $this->session->flashdata('pesan');?>
						<?php echo form_open('data/pelanggan/tambah_pelanggan_proses');?>
							<div class="form-horizontal">
								<div class="form-group">
									<div class="col-xs-6">
										<label for="Nama">Nama pelanggan</label>
										<input type="text" class="form-control" name="Nama"  >
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Nama'); ?> </span>
								<div class="form-group">
									<div class="col-xs-8">
										<label for="Alamat">Alamat</label>
										<input type="text" class="form-control" name="Alamat"  >
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Alamat'); ?> </span>
								<div class="form-group">
									<div class="col-xs-5">
										<label for="Telepon">Telepon</label>
										<input type="text" class="form-control" name="Telepon"  >
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Telepon'); ?> </span>
								<div class="form-group">
									<div class="col-xs-4">
										<button type="submit" name="submit" class="btn btn-success">Simpan</button>
										<button type="reset" name="reset" class="btn btn-warning">Batal</button>
									</div>
								</div>
							</div>
						<?php echo form_close();?>
					</div>			
				</div>
			</div>
		</div>
	</section>
</div>