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
	$("#dlg").dialog('close');
	$("#kode_periksa").val(id);
	$("#kode_periksa").focus();
	
}
</script>
<table id="dataTable" class="detail" width="100%">
<tr>
	<th>No</th>
    <th>Kode Periksa</th>
    <th>Kode Barcode</th>
    <th>Tgl Periksa</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Tempat Lahir</th>
    <th>Tgl Lahir</th>
    <th>Gender</th>
    <th>Telp</th>
	<th>Kode Diagnosa</th>				
    <th>Ambil</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1;
		foreach($data->result_array() as $db){  
		//$stok = $this->app_model->CariStokAkhir($db['kode_barang']);
		if($db['gender']==1){
			$sex="Laki-Laki";
		}else{
			$sex="Perempuan";
		}
		if($db['status_pasien']==1){
			$stt="Umum";
		}else{
			$stt="Home Care";
		}
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="100" ><?php echo $db['kode_periksa']; ?></td>
            <td align="center" width="100" ><?php echo $db['kode_barcode']; ?></td>
            <td align="center" width="100" ><?php echo $this->app_model->tgl_str($db['tgl_periksa']); ?></td>
            <td align="center" width="100" ><?php echo $db['nama']; ?></td>
            <td align="center" width="100" ><?php echo $db['alamat']; ?></td>
            <td align="center" width="100" ><?php echo $db['tempat_lahir']; ?></td>
            <td  width="100" ><?php echo $this->app_model->tgl_indo($db['tgl_lahir']); ?></td>
            <td align="right" width="100" ><?php echo $sex; ?></td>
            <td align="center" width="80" ><?php echo $db['telp']; ?></td>
            <td align="center" width="80" ><?php echo $db['jenis_pemeriksaan']; ?></td>
            <td align="center" width="80">
            <a href="javascript:pilih('<?php echo $db['kode_periksa'];?>')" >
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
        	<td colspan="11" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>