<script type="text/javascript">
$(function() {
	$("#dataTable tr:even").addClass("stripe1");
	$("#dataTable tr:odd").addClass("stripe2");
	$("#dataTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<style type="text/css">
.stripe1 {
    background-color:#FBEC88;
}
.stripe2 {
    background-color:#FFF;
}
.highlight {
	-moz-box-shadow: 1px 1px 2px #fff inset;
	-webkit-box-shadow: 1px 1px 2px #fff inset;
	box-shadow: 1px 1px 2px #fff inset;		  
	border:             #aaa solid 1px;
	background-color: #fece2f;
}
</style>
<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Kode Periksa</th>
    <th>Tgl Periksa</th>
    <th>Kode Barcode</th>
    <th>Dokter</th>
	<th>Pasien</th>
    <th>Alamat</th>
    <th>Tgl Lahir</th>
    <th>Gender</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1;
		foreach($data->result_array() as $db){  
		
		if($db['gender']==1){
			$sex="Laki-Laki";
		}else{
			$sex="Perempuan";
		}
		
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="100" ><?php echo $db['kode_periksa']; ?></td>
			<td align="center" width="80" ><?php echo $db['tgl_periksa']; ?></td>
			<td align="center" width="80" ><?php echo $db['kode_barcode']; ?></td>
			<td align="center" width="80" ><?php echo $db['nama_dokter']; ?></td>
			<td align="center" width="80" ><?php echo $db['nama']; ?></td>
			<td align="center" width="100" ><?php echo $db['alamat']; ?></td>
			<td align="center" width="100" ><?php echo $this->app_model->tgl_indo($db['tgl_lahir']); ?></td>
            <td align="center" width="100" ><?php echo $sex; ?></td>
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