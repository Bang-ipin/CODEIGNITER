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
					<div class="box-body">
					<?php echo form_open('gudang/kategori/tambah_kategori_proses');?>
							<div class="form-horizontal">
								<div class="form-group">
									<div class="col-xs-6">
										<label for="kode">Kode Kategori</label>
										<input type="text" class="form-control" name="kode">
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('kode'); ?> </span>
								<div class="form-group">
									<div class="col-xs-7">
										<label for="nama">Nama Kategori</label>
										<input type="text" class="form-control" name="nama"  >
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('nama'); ?> </span>
								<div class="form-group">
									<div class="col-xs-8">
										<button type="submit" name="submit" class="btn btn-success">Simpan</button>
										<a href="<?=base_url();?>gudang/kategori">
											<button type="button" name="kembali" id="kembali" class="btn btn-warning">Kembali</button>
										</a>
									</div>
								</div>
							</div>
							<?php echo form_close();?>
									
					</div>
				</div>
			</div>
		</section>
	</div>