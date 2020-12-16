<script>
$("#ukuran").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
$("#barcode").keyup(function(e){
	var isi = $(e.target).val();
	$(e.target).val(isi.toUpperCase());
});
$("#telepon").keypress(function(data){
	if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
		return false;
	}
});
</script>
<div id="view">
	<div style="float:left; padding-bottom:5px;">
	<?php if($this->session->userdata('level')==01 || $this->session->userdata('level')==02){ ?>
		<a href="<?php echo base_url();?>index.php/pasien/tambah">
			<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
		</a>
		<?php } ?>
		<a href="<?php echo base_url();?>index.php/pasien">
			<button type="button" name="refresh" id="refresh" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
		</a>
	</div>
	<br/>
	&nbsp;
	<fieldset class="atas">
		<form name="form" method="post" action="<?php echo base_url();?>index.php/pasien">
			<table class="table-responsive" style="float:left;"width="100%">
				<tr>
					<td>
						<input type="text" name="barcode" id="barcode" placeholder="Kode Barcode" size="15%" >
					</td>
					<td>
						<input type="text" name="telepon" id="telepon" placeholder="No. Telepon" size="15%" />
					</td>
					<td>
						<input type="text" name="nama" id="nama" placeholder="Nama Pasien" size="20%"  />
					</td>
					<td>
						<button type="submit" name="cari" id="cari" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	<div id="gird" style="width:100%;">
		<table id="dataTable" class="table-responsive" width="100%">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Tempat Lahir</th>
				<th>Tgl Lahir</th>
				<th>Gender</th>
				<th>Telepon</th>
				<th>Status Pasien</th>
				<th>Barcode</th>
				<th>Aksi</th>
			</tr>
			<?php
			if($data->num_rows() > 0){
			$no =1+$hal;
			foreach($data->result_array() as $db){
			if($db['gender'] == 1){
				$sex = " Laki-laki";
			}
			else{
				$sex = " Perempuan";
			}
			
			if($db['status_pasien'] == 1){
				$stt = " Umum";
			}
			else{
				$stt = " Home Care";
			}
			if($db['verifikasi'] == 1){
				$act = " Aktif";
			}
			else{
				$act = " Belum Aktif";
			}
			?>    
			<tr>
				<td align="center" width="2%"><?php echo $no; ?></td>
				<td align="center" width="8%"><?php echo $db['nama']; ?></td>
				<td align="center" width="25%"><?php echo $db['alamat']; ?></td>
				<td align="center" width="8%"><?php echo $db['tempat_lahir']; ?></td>
				<td align="center" width="8%"><?php echo $db['tgl_lahir']; ?></td>
				<td align="center" width="8%"><?php echo $sex ?></td>
				<td align="center" width="8%"><?php echo $db['telp']; ?></td>
				<td align="center" width="8%"><?php echo $stt ?></td>
				<td align="center" width="8%"><?php echo $db['kode_barcode']; ?></td>
				<td align="center" width="15%">
				<?php if ($db['verifikasi']==0){ ?>
				<a data-toggle="tooltip" title="Belum Aktif" href="<?=site_url();?>/pasien/status/<?=$db['kode_barcode'];?>/1">
					<img src="<?php echo base_url();?>asset/images/delete.png" title="Ubah Status ke Aktif">
				</a>
				<?php } else { ?>
				<a data-toggle="tooltip" title="Aktif" href="<?=site_url();?>/pasien/status/<?=$db['kode_barcode'];?>/0">
					<img src="<?php echo base_url();?>asset/images/accept.png" title="Ubah Status ke Belum Aktif">
				</a>		
				<?php } ?>
				<a href="<?php echo base_url();?>index.php/pasien/cetak/<?php echo $db['kode_barcode'];?>" target="_blank">
					<img src="<?php echo base_url();?>asset/images/print.png" title='Cetak Kartu'>
				</a>
				<a href="<?php echo base_url();?>index.php/pasien/edit/<?php echo $db['kode_barcode'];?>">
				<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
				</a>
				<a href="<?php echo base_url();?>index.php/pasien/hapus/<?php echo $db['kode_barcode'];?>"
				onClick="return confirm('Anda yakin ingin menghapus data ini?')">
				<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
				</a>
				</td>
			</tr>
			<?php
				$no++;
				}
			}else{
			?>
				<tr>
					<td colspan="11" align="center" >Tidak Ada Data</td>
				</tr>
			<?php	
			}
			?>
		</table>
		<?php echo "<table align='center'><tr><td>".$paginator."</td></tr></table>"; ?>
	</div>
</div>