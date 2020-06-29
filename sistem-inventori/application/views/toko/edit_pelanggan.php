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
						<?php foreach($query as $rows);?>
						<?php echo form_open('toko_ringroad/pelanggan/EditCheckout');?>
							<div class="form-horizontal">
								<div class="form-group">
									<div class="col-xs-3">
										<label for="Id">Id pelanggan</label>
										<input type="text" class="form-control" readonly="TRUE" name="Id" value="<?php echo $rows->id_pelanggan;?>" readonly="true">
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Id'); ?> </span>
								<div class="form-group">
									<div class="col-xs-4">
										<label for="Nama">Nama pelanggan</label>
										<input type="text" class="form-control" name="Nama"  value="<?php echo $rows->nama_pelanggan;?>">
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Nama'); ?> </span>
								<div class="form-group">
									<div class="col-xs-4">
										<label for="Alamat">Alamat</label>
										<input type="text" class="form-control" name="Alamat"  value="<?php echo $rows->alamat;?>">
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Alamat'); ?> </span>
								<div class="form-group">
									<div class="col-xs-4">
										<label for="Telepon">Telepon</label>
										<input type="text" class="form-control" name="Telepon"  value="<?php echo $rows->telepon;?>">
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Telepon'); ?> </span>
								<div class="form-group">
									<div class="col-xs-4">
										<button type="submit" name="submit" class="btn btn-success">Simpan</button>
										<a href="<?=base_url('toko_ringroad/pelanggan')?>">
										 <button type="button" name="Kembali" id="kembali" class="btn btn-warning">Batal</button>
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