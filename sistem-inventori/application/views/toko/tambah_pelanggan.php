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
							<?php echo form_open('toko_ringroad/pelanggan/AddCheckout');?>
							<div class="form-horizontal">
								<div class="form-group">
									<div class="col-xs-6">
										<label for="Id">ID Pelanggan</label>
										<input type="text" class="form-control" name="Id" value="<?php echo $id_pelanggan;?>" readonly="true" >
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-6">
										<label for="Nama">Nama pelanggan</label>
										<input type="text" class="form-control" name="Nama"  >
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Nama'); ?> </span>
								<div class="form-group">
									<div class="col-xs-7">
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
									<div class="col-xs-8">
										<button type="submit" name="submit" class="btn btn-success">Simpan</button>
										<a href="<?=base_url('toko_ringroad/pelanggan')?>">
											<button type="button" name="kembali" id="kembali" class="btn btn-warning">Batal</button>
										</a>
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