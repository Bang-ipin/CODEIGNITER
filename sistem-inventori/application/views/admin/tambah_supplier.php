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
								<?php echo form_open('admin/supplier/tambah_supplier_proses');?>
								<div class="form-horizontal">
									<div class="form-group">
										<div class="col-xs-5">
											<label for="kode">Kode Supplier</label>
											<input type="text" class="form-control" readonly="readonly" name="kode" value="<?php echo $kode_supplier;?>" readonly="true">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('kode'); ?> </span>
									<div class="form-group">
										<div class="col-xs-6">
											<label for="Nama">Nama supplier</label>
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
											<input type="text" class="form-control" name="Telepon" onkeypress="return hanyaangka(event)">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Telepon'); ?> </span>
									<div class="form-group">
										<div class="col-xs-8">
											<button type="submit" name="submit" class="btn btn-success">Simpan</button>
											<a href="<?=base_url();?>admin/supplier">
												<button type="button" name="kembali" id="kembali" class="btn btn-warning">KEMBALI</button>
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