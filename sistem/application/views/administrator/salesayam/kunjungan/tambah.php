<script type="text/javascript">
$(document).ready(function(){
	tampil_data();
	function tampil_data(){
		var id = $("#id").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('sales/datadetail'); ?>",
			data	: "id="+id,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
	
	$("#pelanggan").focus();
	
	$("#form").on('submit',function(event){
		event.preventDefault();
		
		var id						= $("#id").val();
		var tanggal					= $("#tanggal").val();
		var pelanggan				= $("#pelanggan").val();
		var alamat					= $("#alamat").val();
		var kontak					= $("#kontak").val();
		var pj						= $("#pj").val();
		
		var string 					= $("#form").serialize();
		
		if(id =="" || id==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, ID tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#id').focus();
			return false;
		}
		if(tanggal =="" || tanggal==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Kunjungan tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#tanggal').focus();
			return false;
		}
		if(pelanggan=="" || pelanggan==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Tempat tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#pelanggan').focus();
			return false;
		}
		if(kontak=="" || kontak==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kontak tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#kontak').focus();
			return false;
		}
		if(pj=="" || pj==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Penanggung Jawab tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#pj').focus();
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
		if(kontak=="" || kontak==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Telepon tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#kontak').focus();
			return false;
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('sales/simpankunjungan'); ?>",
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
$(document).ready(function() { 
		$("#kontak").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#telepon").keypress(function(data){
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
						<?php echo form_open_multipart('',array('name'=>'form','id'=>"form"))?>
							<div class="form-horizontal">
								<div class="form-group">
									<div class="col-md-3">
										<label for="tanggal">Tanggal Kunjungan</label>
									</div>
									<div class="col-md-3">
										<input type="hidden" class="form-control uneditable-input" name="id" id="id" size="12" value="<?=$id;?>" />
										<input type="text" class="form-control uneditable-input" name="tanggal" id="tanggal" size="12" />
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-3">
										<label for="pelanggan">Nama Tempat</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control uneditable-input" name="pelanggan" id="pelanggan" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<label for="alamat">Alamat</label>
									</div>
									<div class="col-md-8">
										<textarea rows="8" class="form-control uneditable-input" name="alamat" id="alamat"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<label for="kontak">Kontak</label>
									</div>
									<div class="col-md-3">
										<input type="text" class="form-control uneditable-input" name="kontak" id="kontak" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<label for="pemilik">Pemilik</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control uneditable-input" name="pemilik" id="pemilik" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<label for="pj">Penanggung Jawab</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control uneditable-input" name="pj" id="pj" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<label for="kebutuhan">Kebutuhan</label>
									</div>
									<div class="col-md-8">
										<textarea rows="4" class="form-control uneditable-input" name="kebutuhan" id="kebutuhan"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<label for="keterangan">Keterangan</label>
									</div>
									<div class="col-md-8">
										<textarea rows="4" class="form-control uneditable-input" name="keterangan" id="keterangan"></textarea>
									</div>
								</div>
								<fieldset class="atas" style="margin-top: 30px;margin-bottom: 30px;">
									<table width="100%">
										<tr>
											<td colspan="3" align="center">
											<button type="submit" name="simpan" id="simpan" class="easyui-linkbutton c1" data-options="iconCls:'icon-save'">SIMPAN</button>
											<a href="<?php echo site_url('sales/kunjungan');?>">
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

