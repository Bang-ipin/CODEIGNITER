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
							<?php echo form_open('admin/kategori/edit_kategori_proses');?>
							<div class="form-horizontal">
								<div class="form-group">
									<div class="col-xs-5">
										<label for="kode">Kode Kategori</label>
										<input type="text" readonly="TRUE" class="form-control" name="kode" value="<?php echo $rows->kode_kategori;?>">
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('kode'); ?> </span>
								<div class="form-group">
									<div class="col-xs-5">
										<label for="Nama">Nama Kategori</label>
										<input type="text" class="form-control" name="Nama"  value="<?php echo $rows->kategori;?>">
									</div>
								</div>
								<span class="help-block"> <?php echo form_error('Nama'); ?> </span>
								<div class="form-group">
									<div class="col-xs-4">
										<button type="submit" name="submit" class="btn btn-success">Simpan</button>
										<a href="<?=base_url();?>admin/kategori">
											<button type="button" name="kembali" id="kembali" class="btn btn-warning">Kembali</button>
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