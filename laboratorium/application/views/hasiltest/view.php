<script type="text/javascript">
$("#kode_barcode").keyup(function(e){
	var isi = $(e.target).val();
	$(e.target).val(isi.toUpperCase());
});
</script>
<div id="view">
	<div style="padding-bottom:5px;">
		<?php if($this->session->userdata('level')==01 || $this->session->userdata('level')==02 ){ ?>
		<a href="<?php echo base_url();?>index.php/hasiltest/tambah">
			<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
		</a>
		<a href="<?php echo base_url();?>index.php/hasiltest">
			<button type="button" name="refresh" id="refresh" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
		</a>
		<?php } ?>
	</div>
	<fieldset class="atas">
		<form name="form" method="post" action="<?php echo base_url();?>index.php/hasiltest">
			<table class="table-responsive"  style="float:left;"width="100%">
				<tr>
					<td>
						<input type="text" size="20%" name="kode_barcode" id="kode_barcode" placeholder="Kode Barcode" >
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
				<th>Kode Periksa</th>
				<th>Kode Barcode</th>
				<th>Tgl Periksa</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Tgl Lahir</th>
				<th>Aksi</th>
			</tr>
			<?php
				if($data->num_rows()>0){
					$no =1+$hal;
					foreach($data->result_array() as $db){  
					$tgl = $this->app_model->tgl_indo($db['tgl_periksa']);
					?>    
					<tr>
						<td align="center" width="20"><?php echo $no; ?></td>
						<td align="center" width="100" ><?php echo $db['kode_periksa']; ?></td>
						<td align="center" width="100" ><?php echo $db['kode_barcode']; ?></td>
						<td align="center" width="100" ><?php echo $tgl; ?></td>
						<td align="center" width="100" ><?php echo $db['nama']; ?></td>
						<td align="center" width="100" ><?php echo $db['alamat']; ?></td>
						<td align="center" width="100" ><?php echo $this->app_model->tgl_indo($db['tgl_lahir']); ?></td>
						<td align="center" width="80">
						<?php if($this->session->userdata('level')==03){ ?>
						<a href="<?php echo base_url();?>index.php/hasiltest/cetakfaktur/<?php echo $db['kode_periksa'];?>" target="_blank">
							<img src="<?php echo base_url();?>asset/images/print.png" title='Cetak Faktur'>
						</a>
						<?php } ?>
						<?php if($this->session->userdata('level')==01 || $this->session->userdata('level')==02){ ?>
						<a href="<?php echo base_url();?>index.php/hasiltest/cetak/<?php echo $db['kode_periksa'];?>" target="_blank">
							<img src="<?php echo base_url();?>asset/images/print.png" title='Cetak Hasil Lab'>
						</a>
						<?php } ?>
						<?php 
						if($this->session->userdata('level')==01 || $this->session->userdata('level')==02){ ?>
						<a href="<?php echo base_url();?>index.php/hasiltest/edit/<?php echo $db['kode_periksa'];?>">
							<img src="<?php echo base_url();?>asset/images/ed.png" title='Lihat hasil'>
						</a>
						<?php } ?> 
						<?php 
						if($this->session->userdata('level')==01){ ?>
							<a href="<?php echo base_url();?>index.php/hasiltest/hapus/<?php echo $db['kode_periksa'];?>"
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