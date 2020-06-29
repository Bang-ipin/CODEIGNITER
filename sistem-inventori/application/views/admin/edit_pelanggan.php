<div class="side-content">
	<div id="container-fluid">	
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="glyphicon glyphicon-home">
					<span><label> Edit pelanggan</label></span>
				</div>
			</div>
			<div class="container-fluid page-content">
				<div class="well well-sm"><h4>Edit pelanggan</h4></div>
				<hr>
				<?php foreach($query as $rows);?>
				<?php echo form_open('data/pelanggan/edit_pelanggan_proses');?>
				<div class="well well-sm">
				<div class="form-horizontal">
					<div class="form-group">
						<div class="col-xs-4">
							<label for="Id">Kode pelanggan</label>
							<input type="text" class="form-control" readonly="TRUE" name="Id" value="<?php echo $rows->id_pelanggan;?>" readonly="true">
						</div>
					</div>
					<span class="help-block"> <?php echo form_error('Kode'); ?> </span>
                    <div class="form-group">
						<div class="col-xs-6">
							<label for="Nama">Nama pelanggan</label>
							<input type="text" class="form-control" name="Nama"  value="<?php echo $rows->nama_pelanggan;?>">
						</div>
					</div>
					<span class="help-block"> <?php echo form_error('Nama'); ?> </span>
                    <div class="form-group">
						<div class="col-xs-7">
							<label for="Alamat">Alamat</label>
							<input type="text" class="form-control" name="Alamat"  value="<?php echo $rows->alamat_pelanggan;?>">
						</div>
					</div>
					<span class="help-block"> <?php echo form_error('Alamat'); ?> </span>
					<div class="form-group">
						<div class="col-xs-5">
							<label for="Telepon">Telepon</label>
							<input type="text" class="form-control" name="Telepon"  value="<?php echo $rows->telepon;?>">
						</div>
					</div>
					<span class="help-block"> <?php echo form_error('Telepon'); ?> </span>
                    <div class="form-group">
						<div class="col-xs-8">
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