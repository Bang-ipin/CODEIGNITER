<script>
$("#diagnosa").keyup(function(e){
	var isi = $(e.target).val();
	$(e.target).val(isi.toUpperCase());
});
</script>
<div id="view">
	<div style="float:left; padding-bottom:5px;">
	<?php if($this->session->userdata('level')==01 || $this->session->userdata('level')==02){ ?>
		<a href="<?php echo base_url();?>index.php/diagnosa/tambah">
			<button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
		</a>
		<?php } ?>
		<a href="<?php echo base_url();?>index.php/diagnosa">
			<button type="button" name="refresh" id="refresh" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
		</a>
	</div>
	<br/>
	&nbsp;
	<fieldset class="atas">
		<form name="form" method="post" action="<?php echo base_url();?>index.php/diagnosa">
			<table class="table-responsive" style="float:left;"width="100%">
				<tr>
					<td>
						<input type="text" name="diagnosa" id="diagnosa" placeholder="Nama Diagnosa" size="20%"  />
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
				<th width="2%">No</th>
				<th width="25%">Nama Diagnosa</th>
				<th width="15%">Tarif</th>
				<th width="10%">Aksi</th>
			</tr>
			<?php
			if($data->num_rows() > 0){
			$no =1+$hal;
			foreach($data->result_array() as $db){
			
			?>    
			<tr>
				<td align="center" width="2%"><?php echo $no; ?></td>
				<td width="15%"><?php echo $db['nama_diagnosa']; ?></td>
				<td width="15%">Rp&nbsp;<?php echo number_format($db['tarif'],0,',','.'); ?></td>
				<td align="center">
				<a href="<?php echo base_url();?>index.php/diagnosa/edit/<?php echo $db['id_diagnosa'];?>">
				<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
				</a>
				<a href="<?php echo base_url();?>index.php/diagnosa/hapus/<?php echo $db['id_diagnosa'];?>"
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