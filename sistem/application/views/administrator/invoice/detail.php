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
    <th>Paket Iklan</th>
    <th>Harga</th> 
</tr>
<?php
	if($data->num_rows()>0){
		$no =1;
		foreach($data->result_array() as $db){  
			if ($db['paket']==1){
				$paket =" Paket Basic";
			}else
			if ($db['paket']==2){
				$paket ="Paket Premium";
			}
			else if($db['paket']==3){
				$paket = " Paket Pro";
			}
			else{
				$paket = "Paket Special";
			}
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="80" ><?php echo $paket; ?></td>
			<td align="center" width="80" ><?php echo $db['nominal']; ?></td>
			
		</tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="3" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>