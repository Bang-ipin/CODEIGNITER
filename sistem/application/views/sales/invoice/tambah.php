<script type="text/javascript">
$(document).ready(function(){
	tampil_data();
	function tampil_data(){
		var kode = $("#faktur").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('sales/datadetailfaktur'); ?>",
			data	: "kode="+kode,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
	
	$("#outlet").focus();
	
	$("#form").on('submit',function(event){
		event.preventDefault();
		
		var faktur					= $("#faktur").val();
		var tanggal					= $("#tanggal").val();
		var outlet					= $("#outlet").val();
		var alamat					= $("#alamat").val();
		var telepon					= $("#telepon").val();
		var pemilik					= $("#pemilik").val();
		var items					= $("#items").val();
		
		var string 					= $("#form").serialize();
		
		if(faktur =="" || faktur==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, No Faktur tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#faktur').focus();
			return false;
		}
		if(tanggal =="" || tanggal==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Invoice tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#tanggal').focus();
			return false;
		}
		if(outlet=="" || outlet==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Pelanggan / Outlet tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#outlet').focus();
			return false;
		}
		if(alamat=="" || alamat==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Alamat tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#alamat').focus();
			return false;
		}
		if(telepon=="" || telepon==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor telepon tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#telepon').focus();
			return false;
		}
		if(pemilik=="" || pemilik==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama pemilik / penanggung jawab tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#pemilik').focus();
			return false;
		}
		if(items=="" || items==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama items tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#items').focus();
			return false;
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('sales/simpaninvoicedaging'); ?>",
			data	: string,
			error 	: function(xhr, ajaxOptions, thrownError) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon',
					timeout:2000,
					showType:'slide'
				});
				
			},
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
				tampil_data();
				
			}
		});
		
	});
	$("#tambah_data").click(function(){
		$(".detail").val('');
		$("#items").val('');
		$("#items").focus();
	});
	
	$("#cetak").click(function(){
		var kode	= $("#faktur").val();
		window.open('<?php echo site_url();?>sales/cetakinvoice/'+kode);
		return;
	});
	
});	
$(function(){
	$('#tanggal').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true,
	showAnim:'slide',
	});
});
$(function(){
	$('#lahir').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true,
	showAnim:'slide',
	});
});
$(document).ready(function() { 
	$("#telepon").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#harga").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});

	function hitung(){
		var qty 	= $("#qty").val();
		var harga 	= $("#harga").val();

		var subtotal =qty * harga;

		if(!isNaN(subtotal)){
			document.getElementById("subtotal").value = subtotal;
		}
	}
	$("#qty").keyup(function() {
		hitung();
	});
	$("#harga").keyup(function() {
		hitung();
	});
});

</script>
		
			<div class="content-wrapper">
				<section class="content-header">
					<h1>
						<?=$title;?>
					</h1>
				</section>
			
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-body">
									<div><?php echo $this->session->flashdata('pesan');?></div>
									<?=form_open('',array('name'=>'form','id'=>"form"))?>
										<div class="form-horizontal">
											<div class="col-md-6 jumbotron">
												<div class="form-group">
													<div class="col-md-6">
														<label for="faktur">No Invoice</label>
														<input type="text" class="form-control uneditable-input" name="faktur" id="faktur" size="12" readonly="readonly" value="<?php echo $faktur;?>" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label for="tanggal">Tanggal Invoice</label>
														<input type="text" class="form-control" name="tanggal" id="tanggal" size="12" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-8">
														<label for="outlet">Nama Outlet / Pelanggan</label>
														<input type="text" class="form-control" name="outlet" id="outlet" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-10">
														<label for="alamat">Alamat</label>
														<textarea rows="4" class="form-control" name="alamat" id="alamat"> </textarea>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-8">
														<label for="telepon">Telepon / HP</label>
														<input type="text" class="form-control" name="telepon" id="telepon" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-8">
														<label for="pemilik">Pemilik</label>
														<input type="text" class="form-control" name="pemilik" id="pemilik" />
													</div>
												</div>
											</div>
											<div class="col-md-6 jum">
												<div class="form-group">
													<div class="col-md-10">
														<label for="items">Nama Barang</label>
														<input type="text" class="form-control detail" name="items" id="items" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label for="qty">Qty</label>
														<input type="text" class="form-control detail" name="qty" id="qty" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-8">
														<label for="harga">Harga</label>
														<input type="text" class="form-control detail" name="harga" id="harga" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-8">
														<label for="subtotal">Sub Total</label>
														<input type="text" class="form-control detail" readonly="true" name="subtotal" id="subtotal" />
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-12">
												<fieldset class="atas" style="margin-top: 30px;margin-bottom: 30px;">
													<table width="100%">
														<tr>
															<td colspan="3" align="center">
															<button type="submit" name="simpan" id="simpan" class="easyui-linkbutton c1" data-options="iconCls:'icon-save'">SIMPAN</button>
															 <button type="button" name="tambah_data" id="tambah_data" class="easyui-linkbutton" data-options="iconCls:'icon-add'">TAMBAH</button>
															<button type="button" name="cetak" id="cetak" class="easyui-linkbutton" data-options="iconCls:'icon-print'">CETAK</button>
															<a href="<?php echo base_url('sales/invoicedaging');?>">
															<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-logout'">TUTUP</button>
															</a>
															</td>
														</tr>
													</table>  
												</fieldset>
											</div>
										</div>
									<?php form_close();?>
									<div class="col-md-12">
										<fieldset>
											<div id="tampil_data"></div>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		
		