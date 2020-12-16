<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	$("#nama").focus();

	
	$("#simpan").click(function(){
		var instansi	= $("#instansi").val();
		var aplikasi	= $("#aplikasi").val();
		var usaha		= $("#usaha").val();
		var alamat		= $("#alamat").val();
		var telp			= $("#telp").val();
		var email		= $("#email").val();
		var website	= $("#website").val();
		var author		= $("#author").val();
		
		var string = $("#form").serialize();
		
		if(instansi.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Instansi tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#nama").focus();
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
		if(email.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Email tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#email").focus();
			return false();
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/config/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
				window.location.reload('<?=site_url()?>');
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
<form name="form" id="form">
<fieldset class="atas">
<table width="100%">
 <td><input type="hidden" name="id" id="id" size="20" class="easyui-validatebox"   data-options="required:true,validType:'length[3,50]'"  maxlength="50" value="<?php echo $list['id'];?>" /></td>
<tr>    
	<td width="150">Perusahaan</td>
    <td width="5">:</td>
    <td><input type="text" name="instansi" id="instansi" size="20" class="easyui-validatebox"   data-options="required:true,validType:'length[3,50]'"  maxlength="50" value="<?php echo $list['instansi'];?>" /></td>
</tr>
<tr>    
	<td width="150">Aplikasi</td>
    <td width="5">:</td>
    <td><input type="text" name="aplikasi" id="aplikasi" size="50" maxlength="50"  value="<?php echo $list['aplikasi'];?>" /></td>
</tr>
<tr>    
	<td width="150">Usaha</td>
    <td width="5">:</td>
    <td><input type="text" name="usaha" id="usaha" size="60" maxlength="100"  value="<?php echo $list['usaha'];?>" /></td>
</tr>
<tr>    
	<td>Alamat</td>
    <td>:</td>
    <td><textarea name="alamat" id="alamat"  size="20" maxlength="50" ><?php echo $list['alamat'];?></textarea></td>
</tr>
<tr>    
	<td>Telp</td>
    <td>:</td>
    <td><input type="text" name="telp" id="telp"  size="20" maxlength="20" value="<?php echo $list['telp'];?>"/>
    </td>
</tr>
<tr>    
	<td>Email</td>
    <td>:</td>
    <td><input type="email" name="email" id="email"  size="20" maxlength="20" value="<?php echo $list['email'];?>"/>
    </td>
</tr>
<tr>    
	<td>Website</td>
    <td>:</td>
    <td><input type="text" name="website" id="website"  size="20" maxlength="20" value="<?php echo $list['website'];?>"/>
    Website kosongkan jika tidak di edit
    </td>
</tr>
<tr>    
	<td>Pemilik</td>
    <td>:</td>
    <td><input type="text" name="author" id="author"  size="20" maxlength="50" value="<?php echo $list['author'];?>"/>
    </td>
</tr>
</table>
</fieldset>
<fieldset class="bawah">
<table width="100%">
<tr>
	<td colspan="3" align="center">
    <button type="button" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    </td>
</tr>
</table>  
</fieldset>   	
</form>
												