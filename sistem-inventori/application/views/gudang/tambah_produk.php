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
								<?php echo $this->session->flashdata('pesan');?>
								<form class="form" action="<?=base_url('gudang/produk/tambah_produk_proses');?>" method="post">
									<div class="form-horizontal">
										<div class="form-group">
											<label for="kode" class="col-xs-3">Kode Barang</label>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="kode" value="<?php echo $kode_barang;?>"
												readonly="readonly">
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('kode_barang'); ?> </span>
										<div class="form-group">
											<label class="col-xs-3" for="Nama_Barang">Nama Barang</label>
											<div class="col-xs-6">
												<input type="text" class="form-control" name="Nama_Barang"  >
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Nama_Barang'); ?> </span>
										<div class="form-group">
											<label class="col-xs-3" for="Kategori">Kategori</label>
											<div class="col-xs-7">
												<?php echo form_dropdown('Kategori',$dd_kategori,$kategori_selected,$attribute);?>
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Kategori'); ?> </span>
										<div class="form-group">
											<label class="col-xs-3" for="Jenis">Jenis Barang</label>
												<div class="col-xs-7"><?php echo form_dropdown('Jenis',$dd_jenis,$jenis_selected,$attribute);?>
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Jenis'); ?> </span>
										<div class="form-group">
											<label class="col-xs-3" for="Hargabeli">Harga Beli</label>
											<div class="col-xs-6">
												<input type="text" class="form-control" name="Hargabeli" onkeypress="return hanyaangka(event)">
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Hargabeli'); ?> </span>
										<div class="form-group">
											<label class="col-xs-3" for="Hargajual">Harga Jual</label>
											<div class="col-xs-6">
												<input type="text" class="form-control" name="Hargajual" onkeypress="return hanyaangka(event)">
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Hargajual'); ?> </span>
										<div class="form-group">
											<label class="col-xs-3" for="Stock">Stock Awal</label>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="Stock" onkeypress="return hanyaangka(event)" >
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Stock'); ?> </span>
										<div class="form-group">
											<label class="col-xs-3" for="Satuan">Satuan</label>
											<div class="col-xs-5"><?php echo form_dropdown('Satuan',$dd_satuan,$satuan_selected,$attribute);?>
											</div>
										</div>
										<span class="help-block"> <?php echo form_error('Satuan'); ?> </span>
										<div class="form-group">
											<label class="col-xs-3" for="Gambar">Gambar</label>
											<div class="col-xs-8">
												<div style="margin-bottom:20px">
													<input class="easyui-filebox" labelPosition="top" name="Gambar" data-options="prompt:'Choose a file...'" style="width:100%">
													* ukuran file tidak boleh melebihi 1 MB<br>
												</div>
											</div>
										</div>
										<?php echo $this->session->flashdata('error'); ?> </span>
										<div class="form-group">
											<label class="col-xs-2"></label>
											<div class="col-xs-7">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>gudang/produk">
													<button type="button" name="kembali" id="kembali" class="btn btn-warning">KEMBALI</button>
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
	
	<script>
		function hanyaangka(evt) {
		 var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
		}
	</script>
	