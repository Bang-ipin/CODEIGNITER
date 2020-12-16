<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#kode_barcode").focus();
	$("#kode_barcode").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
		CariDataPasien();
	});
	function CariDataPasien(){
		var kode = $("#kode_barcode").val()
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/InfoPasien",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				$("#nama").val(data.nama);
				$("#alamat").val(data.alamat);
				$("#tempat_lahir").val(data.tempat_lahir);
				$("#tgl_lahir").val(data.tgl_lahir);
				$("#telp").val(data.telp);
				$("#gender").val(data.gender);
			}
		});
	}
	$("#telp").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#tgl_lahir").datepicker({
			dateFormat:"dd-mm-yy"
    });
	$("#simpan").click(function(){
		var kode_barcode	= $("#kode_barcode").val();
		var nama			= $("#nama").val();
		var alamat			= $("#alamat").val();
		var tempat_lahir	= $("#tempat_lahir").val();
		var tgl_lahir		= $("#tgl_lahir").val();
		var gender			= $("#gender").val();
		var telp			= $("#telp").val();
		
		var string = $("#form").serialize();
		
		if(kode_barcode.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Barcode tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#kode_barcode").focus();
			return false();
		}
		if(nama.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Pasien tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#nama").focus();
			return false();
		}
		if(form.gender.value=='' || form.gender.value==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis kelamin tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			form.gender.focus();
			return false();
		}
		if(form.stt.value=='' || form.stt.value==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Status Pasien tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			form.stt.focus();
			return false();
		}
		if(alamat.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Alamat tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#alamat").focus();
			return false();
		}
		if(tempat_lahir.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tempat lahir tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#tempat_lahir").focus();
			return false();
		}
		if(tgl_lahir.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal lahir tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#tgl_lahir").focus();
			return false();
		}
		if(telp.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Telepon tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#telp").focus();
			return false();
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/pasien/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
				CariSimpanan();
			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});
		return false();		
	});
	
});	
</script>
<table width="100%">
	<tr>
		<td valign="top" width="50%">
		<form name="form" id="form">
			<fieldset class="atas">
				<table width="100%">
					<tr>    
						<td width="150">Kode Barcode</td>
						<td width="5">:</td>
						<td><input type="text" name="kode_barcode" id="kode_barcode" size="12" maxlength="12" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $kode_barcode;?>" readonly="true" />
						  <strong>Kode Barcode tidak bisa di ubah</strong>
						  </td>
					</tr>
					<tr>    
						<td width="150">Nama</td>
						<td width="5">:</td>
						<td><input type="text" name="nama" id="nama" size="25" class="easyui-validatebox" data-options="required:true" value="<?php echo $nama;?>" /></td>
					</tr>
					<tr>    
						<td width="150">Gender</td>
						<td width="5">:</td>
						<td>
							<?php
							$gender_select=$this->input->post('gender')? $this->input->post('gender'):$gender;
							echo form_dropdown('gender',$l_gender,$gender_select,$attr);
							?>
						</td>
					</tr>
					<tr>    
						<td width="150">Alamat</td>
						<td width="5">:</td>
						<td><input type="text" name="alamat" id="alamat" size="35" value="<?php echo $alamat;?>" class="easyui-validatebox" data-options="required:true"/></td>
					</tr>
				</table>
			</fieldset>
		</td>
		<td valign="top" width="50%">
			<fieldset class="atas">
				<table>
					<tr>    
						<td width="150">Status Pasien</td>
						<td width="5">:</td>
						<td>
							<?php
							$stt_select=$this->input->post('stt')? $this->input->post('stt'):$stt;
							echo form_dropdown('stt',$l_stt,$stt_select,$attr);
							?>
						</td>
					</tr>
					<tr>    
						<td>Tempat Lahir</td>
						<td>:</td>
						<td><input type="text" name="tempat_lahir" id="tempat_lahir"  size="30" maxlength="50" class="easyui-validatebox" data-options="required:true,validType:'length[3,20]'" value="<?php echo $tempat_lahir;?>"/></td>
					</tr>
					<tr>    
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td><input type="text" name="tgl_lahir" id="tgl_lahir"  size="15" maxlength="15" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $tgl_lahir;?>"/></td>
					</tr>
					<tr>    
						<td>Telepon/HP</td>
						<td>:</td>
						<td><input type="text" name="telp" id="telp"  size="15" maxlength="13" class="easyui-validatebox" data-options="required:true,validType:'length[3,13]'" value="<?php echo $telp?>"/></td>
					</tr>
				</table>
			</fieldset>
		</td>
	</tr>
</table>
			<fieldset class="bawah">
				<table width="100%">
					<tr>
						<td colspan="3" align="center">
							<button type="button" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
							<a href="<?php echo base_url();?>index.php/pasien/tambah">
								<button type="button" name="tambah_data" id="tambah_data" class="easyui-linkbutton" data-options="iconCls:'icon-add'">TAMBAH</button>
							</a>
							<a href="<?php echo base_url();?>index.php/pasien/">
								<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
							</a>
						</td>
					</tr>
				</table>  
			</fieldset>   
		</form>