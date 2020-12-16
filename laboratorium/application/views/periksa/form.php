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
		var kode = $("#kode_periksa").val();
		//alert(kode);
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/periksa/DataDetail",
			data	: "kode="+kode,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
		//return false();
	}
	
	$("#tgl_periksa").datepicker({
			dateFormat:"dd-mm-yy"
    });
	
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
			url		: "<?php echo site_url(); ?>/ref_json/InfoAntrian",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				$("#nama").val(data.pasien);
				$("#alamat").val(data.alamat);
				$("#tgl_lahir").val(data.tgl_lahir);
			}
		});
	};
	$("#harga").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#jml").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	
	function hitung(){
		var jml = $("#jml").val();
		var harga = $("#harga").val();
		
		var total = parseInt(jml)*parseInt(harga);
		if (!isNaN(total)) {
           document.getElementById('total').value = total;
		}
	}
	$("#jml").keyup(function(){
		hitung();
	});
	$("#harga").keyup(function(){
		hitung();
	});
	
	$("#simpan").click(function(){
		var kode_periksa			= $("#kode_periksa").val();
		var tgl_periksa				= $("#tgl_periksa").val();
		var pemeriksa				= $("#pemeriksa").val();
		var kode_barcode			= $("#kode_barcode").val();
		var jenis_pemeriksaan		= $("#jenis_pemeriksaan").val();
		//var catatan					= $("#catatan").val();
		
		var string = $("#form").serialize();
		
		if(kode_periksa.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Periksa tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#kode_periksa").focus();
			return false();
		}
		if(tgl_periksa.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#tgl_periksa").focus();
			return false();
		}
		if(pemeriksa.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Dokter tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$("#pemeriksa").focus();
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
			url		: "<?php echo site_url(); ?>/periksa/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
				tampil_data();
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
		var kode	= $("#kode_periksa").val();
		window.open('<?php echo site_url();?>/periksa/cetak/'+kode);
		return false();
	});
	
	$("#cari_pasien").click(function(){
		AmbilDaftarAntrianPasien();
		$("#dlg").dialog('open');
	});
	
	$("#text_cari").keyup(function(){
		AmbilDaftarAntrianPasien();
		//$("#dlg").dialog('open');
	});
	
	function AmbilDaftarAntrianPasien(){
		var cari = $("#text_cari").val();
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/DataAntrian",
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
<form name="form" id="form">
	<table width="100%">
		<tr>
			<td valign="top" width="100%">
				<fieldset class="atas">
					<table width="100%" >
						<tr>    
							<td width="150">Kode Periksa</td>
							<td width="5">:</td>
							<td><input type="text" name="kode_periksa" id="kode_periksa" size="12" maxlength="12" readonly="readonly" value="<?php echo $kode_periksa;?>" /></td>
						</tr>
						<tr>    
							<td>Tanggal Periksa</td>
							<td>:</td>
							<td><input type="text" name="tgl_periksa" id="tgl_periksa"  size="15" maxlength="15" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?php echo $tgl_periksa;?>"/></td>
						</tr>
						<tr>    
							<td>Dokter</td>
							<td>:</td>
							<td>
							<select name="pemeriksa" id="pemeriksa" style="height:25px;">
							<?php 
							if(empty($pemeriksa)){
							?>
							<option value="">-PILIH-</option>
							<?php
							}
							foreach($l_pemeriksa->result() as $t){
								if($pemeriksa==$t->id_dokter){
							?>
							<option value="<?php echo $t->id_dokter;?>" selected="selected"><?php echo $t->id_dokter;?> - <?php echo $t->nama_dokter;?></option>
							<?php }else { ?>
							<option value="<?php echo $t->id_dokter;?>"><?php echo $t->id_dokter;?> - <?php echo $t->nama_dokter;?></option>
							<?php }
							} ?>
							</select>
							</td>
						</tr>
						<tr>    
							<td width="150">Kode Barcode</td>
							<td width="5">:</td>
							<td><input type="text" name="kode_barcode" id="kode_barcode" size="12" maxlength="12" class="easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="<?=$kode_barcode;?>" />
							<button type="button" name="cari_pasien" id="cari_pasien" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
							</td>
						</tr>
					</table>
				</fieldset>
			</td>
			<!--td valign="top" width="30%" >
				<fieldset class="atas">
					<table width="100%" height="30%">
						<tr>    
							<td>
								
							</td>
						</tr>
					</table>
				</fieldset>
			</td-->
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td valign="top" width="100%">
				<fieldset class="atas">
					<table width="100%" >
						<tr>
							<td>
								<?php
									$cek_pemeriksaan =$jenis_pemeriksaan;
									$check=explode(',',$cek_pemeriksaan);
									$rel=$this->db->query("SELECT * FROM diagnosa ORDER BY nama_diagnosa ASC");
									if($rel->num_rows() > 0)
									{
										foreach($rel->result_array() as $row)
										{	
											$checked='';
											foreach($check as $pemeriksaan_checked)
											{
												if($pemeriksaan_checked == $row['id_diagnosa']){
													$checked="checked";
												}
											}
										echo '<input  type="checkbox" name="jenis_pemeriksaan[]" value="'.$row['id_diagnosa'].'" '.$checked.'>'.$row['nama_diagnosa'].'';
										}
									}
								?>
							</td>
						</tr>
					</table>
				</fieldset>
			</td>
		</tr>
	</table>
				<fieldset class="atas">
					<table width="100%">
						<tr>
							<td colspan="3" align="center">
							<button type="button" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
							<a href="<?php echo base_url();?>index.php/periksa/">
							<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-logout'">TUTUP</button>
							</a>
							</td>
						</tr>
					</table>  
				</fieldset>   
</form>

				<fieldset>
					<div id="tampil_data"></div>
				</fieldset>
					<div id="dlg" class="easyui-dialog" title="Daftar Pasien" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
						Cari : <input type="text" name="text_cari" id="text_cari" size="50" />
						<div id="daftar_pasien"></div>
					</div>