<?php $data = json_decode($response,true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { ?>
	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-gift"></i><?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?>&nbsp;@&nbsp;<?php echo $berat;?>&nbsp;KG
			</div>
		</div>
		<div class="portlet-body form">
			 <div class="administrator-group">
				 <div class="administrator administrator-primary">
					 <div class="administrator-body">
						 <table class="table table-striped table-bordered table-hover">
							 <thead>
								 <tr role="row" class="heading">
									 <th>#</th>
									 <th>Service</th>
									 <th>Estimasi</th>
									 <th>Tarif</th>
								 </tr>
							 </thead>
							<?php
							 for ($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++) {
							 # code...
							 ?>
							<tbody>
								<tr>
									<td align="center">
										<input type="radio" name="pilihlayanan" id="pilihlayanan" value="<?=$j+1;?>" 
										data-service="<?=$data['rajaongkir']['results'][$i]['costs'][$j]['service'];?>" 
										data-etd="<?=$data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'];?>"
										data-tarif="<?=$data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value'];?>"
										> 
									</td>
									<td align="center">
										<div style="font:bold 16px Arial">
											<?php echo $data['rajaongkir']['results'][$i]['costs'][$j]['service'];?>
										</div>
									</td>
									<td align="center">
										<?php echo $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'];?> 
									</td>
									<td align="center">Rp&nbsp;<?php echo number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']);?>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div id="form_pilihlayanan_error"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<script>
	$('input[name=pilihlayanan]').change(function(){
		var a = $(this).attr("data-service"); 
		var b = $(this).attr("data-etd"); 
		var c = $(this).attr("data-tarif"); 
		
		$("#servis").val(a);
		$("#etd").val(b);
		$("#biaya").val(c);
		
		hitung();
	});
	$("#biaya").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#subtotal").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});

	$("#ongkir").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#weight").keyup(function(){
		hitung();
	});

	$("#biaya").keyup(function(){
		hitung();
	});
	function hitung(){
		var subtotal = $("#subtotal").val();
		var jml = $("#weight").val();
		var harga = $("#biaya").val();
		var totalberat;
		if(jml < 1000){
			totalberat = 1000;
		}else{
			totalberat = jml;
		}
		var ongkir = parseInt(totalberat) * parseInt(harga) /1000 ;
		if (!isNaN(ongkir)) {
		   $("#ongkir").val(ongkir);
		  
		}

		 var total = parseInt(subtotal) + parseInt(ongkir);
		if (!isNaN(total)) {
		   $("#grandtotal").val(total);
		 
		} 
	}
</script>