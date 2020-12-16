<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
	tampil_data();
	
	function tampil_data(){
		var kode = $("#kode_barcode").val();
		//alert(kode);
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/booking/DataDetail",
			data	: "kode="+kode,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
		//return false();
	}
	
	$("#kode_barcode").focus();
	
	$("#kode_barcode").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	
	$("#kode_barcode").focus(function(e){
		var isi = $(e.target).val();
		CariPasien();
	});
	
	$("#kode_barcode").keyup(function(){
		CariPasien();
		
	});
	
	function CariPasien(){
		var kode = $("#kode_barcode").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/InfoPasien",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				//
			}
		});
	}
	
	$("#simpan").click(function(){
		var kode_barcode	= $("#kode_barcode").val();
		var antri			= $("#no_antrian").val();
		var string 			= $("#form").serialize();
		
		if(antri.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Antrian tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#no_antrian").focus();
			return false();
		}
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
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/booking/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
				//tampil_data();
				window.location.reload('<?=site_url('booking')?>');

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
	
	$("#tambah_data").click(function(){
		$(".detail").val('');
		$("#kode_barcode").val('');
		$("#kode_barcode").focus();
		
	});
	
	$("#cetak").click(function(){
		var kode	= $("#kode_barcode").val();
		window.open('<?php echo site_url();?>/booking/cetak/'+kode);
		return false();
	});
	
	$("#cari_pasien").click(function(){
		AmbilDaftarPasien();
		$("#dlg").dialog('open');
	});
	
	$("#txt_cari").keyup(function(){
		AmbilDaftarPasien();
		//$("#dlg").dialog('open');
	});
	
	function AmbilDaftarPasien(){
		var cari = $("#txt_cari").val();
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/DataPasien",
			data	: "cari="+cari,
			cache	: false,
			success	: function(data){
				$("#daftar_pasien").html(data);
				$(".detail").val('');
			}
		});
	}
});	
</script>
<table width="100%">
	<tr>
		<td valign="top" width="50%">
			<form name="form" id="form">
				<fieldset class="atas">
					<table width="100%">
						<tr>    
							<td width="150">Nomor Antrian</td>
							<td width="5">:</td>
							<td><input type="text" name="no_antrian" id="no_antrian" size="12" maxlength="12" readonly="readonly" value="<?php echo $no_antrian;?>" /></td>
						</tr>
					</table>
				</fieldset>
		</td>
		<td valign="top" width="50%">
				<fieldset class="atas">
					<table width="100%">
						<tr>    
							<td width="150">Kode Barcode</td>
							<td width="5">:</td>
							<td><input type="text" name="kode_barcode" id="kode_barcode" size="12" maxlength="12"  value="<?=$kode_barcode;?>" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" />
							<button type="button" name="cari_pasien" id="cari_pasien" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
							</td>
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
							<a href="<?php echo base_url();?>index.php/booking/">
							<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-logout'">TUTUP</button>
							</a>
							</td>
						</tr>
					</table>  
				</fieldset>   
			</form>
				<fieldset>
					<!--div id="tampil_data"></div-->
				</fieldset>
				<div id="dlg" class="easyui-dialog" title="Daftar Pasien" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
					Cari : <input type="text" name="txt_cari" id="txt_cari" size="50" />
					<div id="daftar_pasien"></div>
				</div>