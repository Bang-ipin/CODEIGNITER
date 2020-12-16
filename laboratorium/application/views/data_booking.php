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
	$("#kodebooking").val(id);
	$("#kodebooking").focus();
	
}
</script>
<table id="dataTable" class="detailbooking" width="100%">
<tr>
	<th>No</th>
    <th>Kode Booking</th>
    <th>Tanggal Booking</th>
	<th>Jatuh Tempo</th>
    <th>Pelanggan</th>
    <th>Keterangan</th>
    <th>Kode Barang</th>
	<th>DP</th>
	<th>Keterangan</th>
    <th>Ambil</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1;
		foreach($data->result_array() as $db){
		if ($db['keterangan']==1){
			$keterangan =" <span>Lunas</lunas>";
		}
		else if ($db['keterangan']==2){
			$keterangan =" <span>Netral</span>";
		}else{
			$keterangan =" <span>Cancel</span>";
		}
		$selisih = $this->app_model->SisaTempo($db['kodebooking']);
		$q = "DELETE FROM booking WHERE 
			 DATEDIFF(tglbooking,jatuh_tempo) > $selisih";
		$this->app_model->manualQuery($q);
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="100" ><?php echo $db['kodebooking']; ?></td>
            <td align="center" width="100" ><?php echo $db['tglbooking']; ?></td>
            <td align="center" width="100" ><?php echo $db['jatuh_tempo']; ?></td>
            <td align="center" width="100" ><?php echo $db['pelanggan']; ?></td>
            <td align="center" width="100" ><?php echo $db['keterangan']; ?></td>
            <td align="center" width="80" ><?php echo $db['kode_barang']; ?></td>
            <td align="center" width="80" ><?php echo $db['dp']; ?></td>
			<td align="center" width="80" ><?php echo $keterangan; ?></td>
            <td align="center" width="80">
            <a href="javascript:pilih('<?php echo $db['kodebooking'];?>')" >
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