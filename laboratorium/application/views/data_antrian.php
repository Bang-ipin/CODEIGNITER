<script type="text/javascript">
$(function() {
	$("#dataTable.detail tr:even").addClass("stripe1");
	$("#dataTable.detail tr:odd").addClass("stripe2");
	$("#dataTable.detail tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
function pilih(id){
	$("#dlgs").dialog('close');
	$("#kode_barcode").val(id);
	$("#kode_barcode").focus();
	
}
</script>
<table id="dataTable" class="detailantrian" width="100%">
<tr>
	<th>No</th>
    <th>Kode Barcode</th>
    <th>Tanggal Antrian</th>
	<th>Tempo</th>
    <th>Pasien</th>
    <th>Alamat</th>
    <th>Tempat Lahir</th>
	<th>Tgl Lahir</th>
	<th>Gender</th>		<th>Telp</th>	<th>Status</th>
    <th>Ambil</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1;
		foreach($data->result_array() as $db){
		if ($db['status']==1){
			$keterangan =" <span>Belum Diperiksa</lunas>";
		}
		else if ($db['status']==2){
			$keterangan =" <span>Sudah Diperiksa</span>";
		}else{
			$keterangan =" <span>Cancel</span>";
		}				if ($db['gender']==1){
			$gender =" <span>Laki-Laki</lunas>";
		}		else{
			$gender =" <span>Perempuan</span>";
		}
		$selisih = $this->app_model->Tempo($db['kode_barcode']);
		$q = "DELETE FROM antrian WHERE 
			 DATEDIFF(tgl_antrian,tempo) > $selisih";
		$this->app_model->manualQuery($q);
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="100" ><?php echo $db['kode_barcode']; ?></td>
            <td align="center" width="100" ><?php echo $db['tgl_antrian']; ?></td>
            <td align="center" width="100" ><?php echo $db['tempo']; ?></td>
            <td align="center" width="100" ><?php echo $db['nama']; ?></td>
            <td align="center" width="100" ><?php echo $db['alamat']; ?></td>
            <td align="center" width="80" ><?php echo $db['tempat_lahir']; ?></td>
            <td align="center" width="80" ><?php echo $db['tgl_lahir']; ?></td>						<td align="center" width="80" ><?php echo $gender; ?></td>						<td align="center" width="80" ><?php echo $db['telp']; ?></td>
			<td align="center" width="80" ><?php echo $keterangan; ?></td>
            <td align="center" width="80">
            <a href="javascript:pilih('<?php echo $db['kode_barcode'];?>')" >
        	<img src="<?php echo base_url();?>asset/images/add.png" title='Ambil'>
        	</a>
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="6" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>