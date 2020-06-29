		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Dashboard
						<small>Sistem Informasi Inventori dan Penjualan</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="box">
						<div class="box-body">
							<div class="col-sm-12">
								<?php foreach($query as $rows);?>
								<?php echo form_open('gudang/supplier/edit_supplier_proses');?>
								<div class="form-horizontal">
									<div class="form-group">
										<div class="col-xs-5">
											<label for="kode">Kode Supplier</label>
											<input type="text" class="form-control" readonly="TRUE" name="kode" value="<?php echo $rows->kode_supplier;?>" readonly="true">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('kode'); ?> </span>
									<div class="form-group">
										<div class="col-xs-6">
											<label for="Nama">Nama supplier</label>
											<input type="text" class="form-control" name="Nama"  value="<?php echo $rows->nama_supplier;?>">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Nama'); ?> </span>
									<div class="form-group">
										<div class="col-xs-8">
											<label for="Alamat">Alamat</label>
											<input type="text" class="form-control" name="Alamat"  value="<?php echo $rows->alamat_supplier;?>">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Alamat'); ?> </span>
									<div class="form-group">
										<div class="col-xs-5">
											<label for="Telepon">Telepon</label>
											<input type="text" class="form-control" name="Telepon"  value="<?php echo $rows->telepon;?>" onkeypress="return hanyaangka(event)">
										</div>
									</div>
									<span class="help-block"> <?php echo form_error('Telepon'); ?> </span>
									<div class="form-group">
										<div class="col-xs-8">
											<button type="submit" name="submit" class="btn btn-success">Simpan</button>
											<a href="<?=base_url();?>gudang/supplier">
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