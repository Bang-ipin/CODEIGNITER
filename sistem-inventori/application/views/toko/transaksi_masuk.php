	<script type="text/javascript">
		$(function(){
			$('#tanggal').datetimepicker({
			lang:'en',
			timepicker:false,
			format:'d-m-Y',
			closeOnDateSelect:true,
			showAnim:'slide',
			});
		});
	
		function checkdata()
		{     
			var stock = $('#stock').val();
			var jumlah = $('#jumlah').val();
			if(jumlah=="0")
			{
				alert('Jumlah tidak boleh 0');
				$('#jumlah').val('0');
				$('#jumlah').focus();
				return false;
			}else{
				return true;
			}		
		}
		
		var ajaxku;
			function ambildata(kode_supplier){
				ajaxku = buatajax();
				var url="<?php echo base_url('toko_ringroad/pembelian/ajaxsupplier')?>";
				url=url+"?q="+kode_supplier;
				url=url+"&sid="+Math.random();
				ajaxku.onreadystatechange=stateChanged;
				ajaxku.open("GET",url,true);
				ajaxku.send(null);
			}
			function buatajax(){
				if(window.XMLHttpRequest){
					return new XMLHttpRequest();
				}
				if (window.ActiveXObject){
					return new ActiveXObject("Microsoft.XMLHTTP");
				}
				return null;
				
			}
			
		function stateChanged(){
		var data;
		if (ajaxku.readyState==4){
			data=ajaxku.responseText;
			if (data.length>0){
				document.getElementById("supplier").value=data;
				}else{
				document.getElementById("supplier").value="";
				}
			}
		}
		
		function hanyaangka(evt) {
		 var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
		}
	
		function getcart() {
		$.get('<?= base_url('toko_ringroad/pembelian/lihat');?>', function(data) {
			$('#responsecontainer').html(data);
			});
		}
		  $(function () {
			$('input[name=submit]').click(function (e) {
			 var stock = $('#stock').val();
			var jumlah = $('#jumlah').val();
			var kode=$('#kode_barang').val();
			if (kode=="pilih" || kode==null){
				alert('Anda belum memilih kode barang');
				$('#kode_barang').focus();
				return false;
			}else
			if(jumlah=="" || jumlah==null){
				alert('Tambahkan Qty');
				$('#jumlah').focus();
				return false;
			}else
			if(jumlah=="0")
			{
				alert('Jumlah tidak boleh 0');
				$('#jumlah').val('0');
				$('#jumlah').focus();
				return false;
			}else{
			  $.ajax({
				type: 'get',
				url: '<?= base_url('toko_ringroad/pembelian/cart');?>',
				data: $('form').serialize(),
				error: function (xhr, ajaxOptions, thrownError) {
					return false;		  	
				},			
				beforeSend: function() {
				
				$('#responsecontainer').html("<img src='<?= base_url();?>/asset/image/ajax-loader.gif' />");
				 },
				success: function () {			
					getcart();
				}
			  });
			  e.preventDefault();
			}
			});
		  });
			
	</script>
		
			<div class="content-wrapper">
				<section class="content-header">
					<h1>
						Dashboard
						<small>Sistem Informasi Inventori dan Penjualan</small>
					</h1>
				</section>
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-body">
									<div><?php echo $this->session->flashdata('pesan');?></div>
									<form action="<?=base_url('toko_ringroad/pembelian/checkout')?>" method="post" onsubmit="return validasi(this)">
										<div class="form-horizontal">
											<div class="form-group">
												<div class="col-xs-3">
													<label for="faktur">Faktur</label>
												</div>
												<div class="col-xs-5">
													<input class="form-control uneditable-input" type="text" name="faktur"  value="<?php echo $kode_transaksi;?>" readonly="true">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="tanggal">Tanggal</label>
												</div>
												<div class="col-xs-6">
													<input class="form-control" name="tanggal"  id="tanggal" data-options="validType:'length[3,10]'" value="<?php echo $tanggal;?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="supplier">Supplier</label>
												</div>
												<div class="col-xs-6">
													<?php 
													$supplier_selected= $this->input->post('supplier')?$this->input->post('supplier'):'';
													echo form_dropdown('supplier',$dd_supplier,$supplier_selected,$attribute);
													?>
												</div>
											</div>
											<hr>
											<div class="table-responsive" style="padding:5px;">
												<table class="table table-bordered table-striped" width="100%">
													<thead>
														<tr>
															<th width="25%">Nama Item</th>
															<th width="25%">Barang</th>
															<th width="12%">Satuan</th>
															<th width="12%">Harga Beli</th>
															<th width="12%">Stok</th>
															<th width="10%">Jumlah</th>
															<th width="12%">Aksi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<select name="kode_barang" class="form-control select2"  id="kode_barang" onchange="changeValue(this.value)" required >
																	<option value="pilih">---pilih---</option>
																	<?php
																		$this->db->join('satuan','stok_toko2.id_satuan=satuan.id_satuan');		
																		$query = $this->db->get('stok_toko2');  
																		$jsArray = "var dtbrg = new Array();\n";  
																		if ($query->num_rows() > 0) { //jika ada maka jalankan
																			foreach($query->result_array() as $data){
																			echo '<option value="' . $data['kode_barang'] . '">' . $data['nama_barang'] . '</option>';    
																				$jsArray .= "dtbrg['" . $data['kode_barang'] . "'] = {stock:'".addslashes($data['stok'])."',
																				satuan:'".addslashes($data['nama_satuan'])."',
																				harga:'".addslashes($data['harga_beli'])."',barang:'".addslashes($data['nama_barang'])."'};\n";    
																			}
																		} 
																	?>
																</select>
																<script type="text/javascript">
																	<?php echo $jsArray; ?>  
																	function changeValue(kode_barang){  
																	document.getElementById("stock").value = dtbrg[kode_barang].stock;  
																	document.getElementById("satuan").value = dtbrg[kode_barang].satuan;
																	document.getElementById("harga").value = dtbrg[kode_barang].harga;
																	document.getElementById("barang").value = dtbrg[kode_barang].barang;  
																	};
																</script>
															</td>
															<td><input type="text" class="form-control" name="barang" id="barang"  placeholder="barang" readonly required></td>
															<td><input type="text" class="form-control" name="satuan" id="satuan"  placeholder="satuan" readonly required></td>
															<td><input type="text" class="form-control" name="harga"  id="harga"   placeholder="harga"  readonly required></td>
															<td><input type="text" class="form-control" name="stock"  id="stock"   placeholder="stock"  readonly required></td>
															<td><input type="text" class="form-control" name="jumlah" id="jumlah"  placeholder="qty" 	onkeypress="return hanyaangka(event)"></td>
															<td><input type="submit" class="btn btn-small btn-primary" name="submit"  value="Input"></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div id="responsecontainer" align="center"></div>
											<div>
												<button type="submit" name="submit2" class="btn btn-success">Save</button>
												<a href="<?=base_url('toko_ringroad/pembelian')?>" class="btn btn-danger">Cancel</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		<script type="text/javascript">
			function validasi(form){
				var totalharga = $('#total').val();
				var qty=$('#jumlah').val();
				var tgl=$('#tanggal').val();
				if(	tgl == '' || tgl==null)
				{
					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html('Oops !');
					$('#ModalContent').html("Tanggal harus diisi !");
					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
					$('#ModalGue').modal('show');
					return (false);
				}else
				if (form.supplier.value==null || form.supplier.value==""){
				alert("Anda belum memilih Supplier!");
				form.supplier.focus();
				return (false);
				}else
				if (form.kode_barang.value=="pilih"){
				alert("Anda belum memilih Kode Barang!");
				form.kode_barang.focus();
				return false;
				}else
				if(	qty =="" || qty==null){
			  	alert("Tambahkan Qty ");
				$('#jumlah').focus();
				return (false);
				}else
				if(	totalharga =="" || totalharga== 0){
			  	alert("Tambahkan Transaksi terlebih dahulu");
				$('#total').focus();
				return false;
				}
			}
		</script>
		