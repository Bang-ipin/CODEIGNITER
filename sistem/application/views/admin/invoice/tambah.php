<script type="text/javascript">
$(document).ready(function(){
	tampil_data();
	function tampil_data(){
		var kode = $("#kodeinvoice").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/datadetail'); ?>",
			data	: "kode="+kode,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
	
	$("#pelanggan").focus();
	
	$("#form").on('submit',function(event){
		event.preventDefault();
		
		var kodeinvoice				= $("#kodeinvoice").val();
		var tanggal					= $("#tanggal").val();
		var pelanggan				= $("#pelanggan").val();
		var telepon					= $("#telepon").val();
		
		var string 					= $("#form").serialize();
		
		if(kodeinvoice =="" || kodeinvoice==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, No Invoice tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#kodeinvoice').focus();
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
		if(pelanggan=="" || pelanggan==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Pelanggan tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#pelanggan').focus();
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
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/simpaninvoice'); ?>",
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
		$("#pelanggan").val('');
		$("#pelanggan").focus();
	});
	
	$("#cetak").click(function(){
		var kode	= $("#kodeinvoice").val();
		window.open('<?php echo site_url();?>admin/cetakinvoice/'+kode);
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
		$("#nominal").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
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
											<div class="form-group">
												<div class="col-md-3">
													<label for="faktur">No Invoice</label>
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control uneditable-input" name="kodeinvoice" id="kodeinvoice" size="12" readonly="readonly" value="<?php echo $kode_invoice;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="tanggal">Tanggal Invoice</label>
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control uneditable-input" name="tanggal" id="tanggal" size="12" />
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-3">
													<label for="pelanggan">Nama Pelanggan</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="pelanggan" id="pelanggan" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="institusi">Nama Institusi</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="institusi" id="institusi" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="kota">Kota</label>
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control uneditable-input" name="kota" id="kota" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="email">Email</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="email" id="email" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="telepon">Telepon</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="telepon" id="telepon" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="lahir">Tanggal Lahir</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="lahir" id="lahir" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="paket">Pilihan Paket</label>
												</div>
												<div class="col-md-2">
													<?php
													$attr			= "class='form-control select2' id='paket'";
													$paket_select	= $this->input->post('paket')? $this->input->post('paket'):'';
													echo form_dropdown('paket',$dd_paket,$paket_select,$attr);
													?>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="bank">Pembayaran Via Bank</label>
												</div>
												<div class="col-md-3">
													<?php
													$attr			= "class='form-control select2' id='bank'";
													$bank_select	= $this->input->post('bank')? $this->input->post('bank'):'';
													echo form_dropdown('bank',$dd_bank,$bank_select,$attr);
													?>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="nominal">Nominal</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="nominal" id="nominal" />
												</div>
											</div>
											<fieldset class="atas" style="margin-top: 30px;margin-bottom: 30px;">
												<table width="100%">
													<tr>
														<td colspan="3" align="center">
														<button type="submit" name="simpan" id="simpan" class="easyui-linkbutton c1" data-options="iconCls:'icon-save'">SIMPAN</button>
														<button type="button" name="cetak" id="cetak" class="easyui-linkbutton" data-options="iconCls:'icon-print'">CETAK</button>
														<a href="<?php echo base_url('admin/invoice');?>">
														<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-logout'">TUTUP</button>
														</a>
														</td>
													</tr>
												</table>  
											</fieldset>
										</div>
									<?php form_close();?>
									<fieldset>
										<div id="tampil_data"></div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		
		