<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#diagnosa").focus();
	$("#diagnosa").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#tarif").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#simpan").click(function(){
		var diagnosa	= $("#diagnosa").val();
		var id_diagnosa	= $("#id_diagnosa").val();
		var tarif		= $("#tarif").val();
		
		var string = $("#form").serialize();
		
		if(diagnosa.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Diagnosa tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#diagnosa").focus();
			return false();
		}
		if(tarif.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tarif tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#tarif").focus();
			return false();
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/diagnosa/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
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
		<td valign="top" width="100%">
		<form name="form" id="form">
			<fieldset class="atas">
				<table width="100%">
					<tr>    
						<td width="150">Diagnosa</td>
						<td width="5">:</td>
						<?php if (isset($id_diagnosa)){?>
							<input type="hidden" name="id_diagnosa" id="id_diagnosa" size="12" maxlength="100" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $id_diagnosa;?>" />
						<?php } ?>
						<td><input type="text" name="diagnosa" id="diagnosa" size="12" maxlength="100" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $diagnosa;?>" />
						  <strong>Nama Diagnosa tidak boleh kosong</strong>
						 </td>
					</tr>
					<tr>    
						<td width="150">Tarif</td>
						<td width="5">:</td>
						<td><input type="text" name="tarif" id="tarif" size="12" maxlength="100" class="easyui-validatebox" data-options="required:true,validType:'length[3,12]'" value="<?php echo $tarif;?>" />
						  <strong>Tarif</strong>
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
							<a href="<?php echo base_url();?>index.php/diagnosa/tambah">
								<button type="button" name="tambah_data" id="tambah_data" class="easyui-linkbutton" data-options="iconCls:'icon-add'">TAMBAH</button>
							</a>
							<a href="<?php echo base_url();?>index.php/diagnosa/">
								<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
							</a>
						</td>
					</tr>
				</table>  
			</fieldset>   
		</form>