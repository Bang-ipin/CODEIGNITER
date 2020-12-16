<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#dokter").focus();
	$("#dokter").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	
	$("#simpan").click(function(){
		var dokter	= $("#dokter").val();
		var id_dokter	= $("#id_dokter").val();
		
		var string = $("#form").serialize();
		
		if(dokter.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Dokter tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#dokter").focus();
			return false();
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/dokter/simpan",
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
						<td width="150">Dokter</td>
						<td width="5">:</td>
						<?php if (isset($id_dokter)){?>
						<input type="hidden" name="id_dokter" id="id_dokter" size="12" maxlength="100" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $id_dokter;?>" ></td>
						<?php } ?>
						<td><input type="text" name="dokter" id="dokter" size="12" maxlength="100" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $dokter;?>" />
						  <strong>Nama Dokter tidak boleh kosong</strong>
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
							<a href="<?php echo base_url();?>index.php/dokter/tambah">
								<button type="button" name="tambah_data" id="tambah_data" class="easyui-linkbutton" data-options="iconCls:'icon-add'">TAMBAH</button>
							</a>
							<a href="<?php echo base_url();?>index.php/dokter/">
								<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
							</a>
						</td>
					</tr>
				</table>  
			</fieldset>   
		</form>