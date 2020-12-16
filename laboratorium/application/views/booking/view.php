<script type="text/javascript">
$(document).ready(function(){
	$("#cari_tgl").datepicker({
			dateFormat:"dd-mm-yy"
    });
});
$("#kode_barcode").keyup(function(e){
	var isi = $(e.target).val();
	$(e.target).val(isi.toUpperCase());
});
</script>
<div id="view">
	<div style="padding-bottom:5px;">
		<a href="<?php echo base_url();?>index.php/booking/tambah">
			<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
		</a>
		<a href="<?php echo base_url();?>index.php/booking">
			<button type="button" name="refresh" id="refresh" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
		</a>
	</div>
	<fieldset class="atas">
		<form name="form" method="post" action="<?php echo base_url();?>index.php/booking">
			<table class="table-responsive"  style="float:left;"width="100%">
				<tr>
					<td>
						<input type="text" size="20%" name="kode_barcode" id="kode_barcode" placeholder="kode barcode" >
					</td>
					<td>
						<button type="submit" name="cari" id="cari" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	<div id="gird" style="float:left; width:100%;">
		<table id="dataTable" class="table-responsive"  width="100%">
			<tr>
				<th>No</th>
				<th>Antrian</th>
				<th>Kode</th>
				<th>Tanggal</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Tgl Lahir</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
			<?php
				if($data->num_rows()>0){
					$no =1+$hal;
					foreach($data->result_array() as $db){  
					$tgl = $this->app_model->tgl_indo($db['tgl_antrian']);
					//$tgllunas = $this->app_model->tgl_indo($db['tgl_antrian']);
					//$sisa = $this->app_model->KekuranganBooking($db['kodebooking']);
					$selisih = $this->app_model->Tempo($db['kode_barcode']);
					$q = "DELETE FROM antrian WHERE 
						DATEDIFF(CURDATE(),tempo) > $selisih";
					$this->app_model->manualQuery($q);	
					//$jml = $this->app_model->JmlBooking($db['kodebooking']);
					if($db['status']== 1){
						$ket = "<span class='label label-primary'>Belum Diperiksa</span>";
					}else if($db['status']== 2){
						$ket = "<span class='label label-warning'>Sudah Diperiksa</span>";
					}else{
						$ket = "<span class='label label-error'>Cancel</span>";
					}
					?>    
					<tr>
						<td align="center" width="20"><?php echo $no; ?></td>
						<td align="center" width="100" ><?php echo $db['no_antrian']; ?></td>
						<td align="center" width="100" ><?php echo $db['kode_barcode']; ?></td>
						<td align="center" width="100" ><?php echo $tgl; ?></td>
						<td align="center" width="100" ><?php echo $db['nama']; ?></td>
						<td align="center" width="100" ><?php echo $db['alamat']; ?></td>
						<td align="center" width="100" ><?php echo $this->app_model->tgl_indo($db['tgl_lahir']); ?></td>
						<td align="center" width="100" ><?php echo $ket; ?></td>
						<td align="center" width="80">
						<?php if ($db['status']==1){ ?>
						<a data-toggle="tooltip" title="Belum Diperiksa" href="<?=site_url();?>/booking/status/<?=$db['kode_barcode'];?>/2">
							<img src="<?php echo base_url();?>asset/images/delete.png" title="Ubah Status ke Sudah Diperiksa">
						</a>
						<?php } else { ?>
						<a data-toggle="tooltip" title="Sudah Diperiksa" href="<?=site_url();?>/booking/status/<?=$db['kode_barcode'];?>/1">
							<img src="<?php echo base_url();?>asset/images/accept.png" title="Ubah Status ke Belum Diperiksa">
						</a>		
						<?php } ?>
						<a href="<?php echo base_url();?>index.php/booking/edit/<?php echo $db['kode_barcode'];?>">
						<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
						</a>
						<?php 
						if($this->session->userdata('level')==01){ ?>
							<a href="<?php echo base_url();?>index.php/booking/hapus/<?php echo $db['kode_barcode'];?>"
								onClick="return confirm('Anda yakin ingin menghapus data ini?')">
								<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
							</a>
						<?php } ?> 
						</td>
				</tr>
				<?php
					$no++;
					}
				}else{
				?>
					<tr>
						<td colspan="12" align="center" >Tidak Ada Data</td>
					</tr>
				<?php	
				}
			?>
		</table>
		<?php echo "<table align='center'><tr><td>".$paginator."</td></tr></table>"; ?>
	</div>
</div>