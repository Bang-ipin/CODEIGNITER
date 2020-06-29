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
								<?php foreach($query as $rows);?>
								<?php echo form_open_multipart('toko_ringroad/stok_toko/checkout_edit');?>
								<div class="form-horizontal">
									<div class="form-group">
										<div class="col-xs-3">
											<label for="kode">Kode Barang</label>
										</div>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="kode" value="<?php echo $rows->kode_barang;?>" readonly="TRUE" >
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('kode'); ?> </span>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="Nama_Barang">Nama Barang</label>
										</div>
										<div class="col-xs-6">
											<input type="text" class="form-control" name="Nama_Barang" value="<?php echo $rows->nama_barang;?>" >
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Nama_Barang'); ?> </span>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="Kategori">Kategori</label>
										</div>
										<div class="col-xs-8">
										<?php
											$kategori_selected=$this->input->post('Kategori') ? $this->input->post('Kategori'):$rows->kode_kategori;
											$attribute="select name='Kategori' class='form-control select2'";
											echo form_dropdown('Kategori',$dd_kategori,$kategori_selected,$attribute);
											?>
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Kategori'); ?> </span>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="Jenis">Jenis Barang</label>
										</div>
										<div class="col-xs-7">
											<?php
											$jenis_selected=$this->input->post('Jenis') ? $this->input->post('Jenis'):$rows->id_jenis;
											$attribute="select name='Jenis' class='form-control select2'";
											echo form_dropdown('Jenis',$dd_jenis,$jenis_selected,$attribute);
											?>
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Jenis'); ?> </span>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="Hargabeli">Harga Beli</label>
										</div>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="Hargabeli" value="<?php echo $rows->harga_beli;?>" onkeypress="return hanyaangka(event)">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Hargabeli'); ?> </span>
								   <div class="form-group">
										<div class="col-xs-3">
											<label for="Hargajual">Harga Jual</label>
										</div>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="Hargajual" value="<?php echo $rows->harga_jual;?>" onkeypress="return hanyaangka(event)">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Hargajual'); ?> </span>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="Jumlah">Stock Awal</label>
										</div>
										<div class="col-xs-4">
											<input type="number" class="form-control" name="Stock" value="<?php echo $rows->stok;?>" onkeypress="return hanyaangka(event)">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Stock'); ?> </span>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="Satuan">Satuan Barang</label>
										</div>
										<div class="col-xs-6">
											<?php
											$satuan_selected=$this->input->post('Satuan') ? $this->input->post('Satuan'):$rows->id_satuan;
											$attribute="select name='Satuan' class='form-control select2'";
											echo form_dropdown('Satuan',$dd_satuan,$satuan_selected,$attribute);
											?>
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Satuan'); ?> </span>
									<!--<div class="form-group">
										<div class="col-xs-2">
											<label for="Keterangan">Keterangan</label>
										</div>
										<div class="col-xs-4">
											<?php
											$dd_selected=$this->input->post('Keterangan')? $this->input->post('Keterangan'):$rows->keterangan;
											echo form_dropdown('Keterangan',$dd_keterangan,$dd_selected,$attribute);?>
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Keterangan'); ?> </span>-->
									<div class="form-group">
										<label class="col-xs-2"></label>
										<div class="col-xs-7">
											<button type="submit" name="submit" class="btn btn-success">Simpan</button>
											<a href="<?=base_url();?>toko_ringroad/stok_toko">
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
		
		<script>
			function hanyaangka(evt) {
			 var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
			}
		</script>
	