<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});	
	
	$("#tgl_periksa").datepicker({
			dateFormat:"dd-mm-yy"
    });
	
	$("#kode_periksa").focus();
	$("#kode_periksa").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#kode_periksa").focus(function(e){
		var isi = $(e.target).val();
		CariHasil();
	});
	
	$("#kode_periksa").keyup(function(){
		CariHasil();
		
	});
	$("#hasilperiksa").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	function CariHasil(){
		var kode = $("#kode_periksa").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/InfoHasilLab",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				$("#tgl_periksa").val(data.tgl_periksa);
				$("#id_dokter").val(data.id_dokter);
				$("#dokter").val(data.dokter);
				$("#kode_barcode").val(data.kode_barcode);
				$("#nama_pasien").val(data.nama_pasien);
				$("#alamat").val(data.alamat);
				$("#tgl_lahir").val(data.tgl_lahir);
				$("#gender").val(data.gender);
			}
		});
	};
	$("#jenis_pemeriksaan").change(function(){
		CariTarif();
		
	});
	function CariTarif(){
		var kode = $("#jenis_pemeriksaan").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/InfoTarifDiagnosa",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				$("#tarif").val(data.tarif);	
			}
		});
	};
	$("#cari_kodeperiksa").click(function(){
		AmbilDaftarHasilPasien();
		$("#dlg").dialog('open');
	});
	
	$("#caripemeriksaan").keyup(function(){
		AmbilDaftarHasilPasien();
		//$("#dlg").dialog('open');
	});
	
	function AmbilDaftarHasilPasien(){
		var cari = $("#caripemeriksaan").val();
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/DataHasilLab",
			data	: "cari="+cari,
			cache	: false,
			success	: function(data){
				$("#daftar_pemeriksaanpasien").html(data);
				$(".detail").val('');
			}
		});
	}
	
	$("#simpan").click(function(){
		var kode_periksa			= $("#kode_periksa").val();
		var tgl_periksa				= $("#tgl_periksa").val();
		var id_dokter				= $("#id_dokter").val();
		var dokter					= $("#dokter").val();
		var kode_barcode			= $("#kode_barcode").val();
		var nama_pasien				= $("#nama_pasien").val();
		var alamat					= $("#alamat").val();
		var tgl_lahir				= $("#tgl_lahir").val();
		var hasilperiksa			= $("#hasilperiksa").val();
		var catatan					= $("#catatan").val();
		var tarif					= $("#tarif").val();
		
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
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/hasiltest/simpan",
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
	
	tampil_data();
	function tampil_data(){
		var kode = $("#kode_periksa").val();
		//alert(kode);
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/hasiltest/DataDetail",
			data	: "kode="+kode,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
		//return false();
	}
	
	$("#tambah_data").click(function(){
		$(".detail").val('');
		$("#kode_periksa").val('');
		$("#kode_periksa").focus();
	});
	
	$("#cetak").click(function(){
		var kode	= $("#kode_periksa").val();
		window.open('<?php echo site_url();?>/hasiltest/cetak/'+kode);
		return false();
	});
	
});	
</script>
<form name="form" id="form">
	<table width="100%">
		<tr>
			<td valign="top" width="50%">
				<fieldset class="atas">
					<table width="100%">
						<tr>    
							<td width="150">Kode Periksa</td>
							<td width="5">:</td>
							<td><input type="text" name="kode_periksa" id="kode_periksa" size="12" maxlength="12" value="<?=$kode_periksa;?>" />
							<button type="button" name="cari_kodeperiksa" id="cari_kodeperiksa" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
							</td>
						</tr>
						<tr>    
							<td>Tanggal Periksa</td>
							<td>:</td>
							<td><input type="text" name="tgl_periksa" id="tgl_periksa"  class="detail" size="15" readonly="readonly"/></td>
						</tr>
						<tr>    
							<td>Dokter</td>
							<td>:</td>
							<td>
								<input type="hidden" name="id_dokter" id="id_dokter" size="15" class="detail" readonly="readonly"/>
								<input type="text" name="dokter" id="dokter" size="15" class="detail" readonly="readonly"/>
							</td>
						</tr>
						<tr>    
							<td width="150">Kode Barcode</td>
							<td width="5">:</td>
							<td><input type="text" name="kode_barcode" id="kode_barcode" size="12" class="detail"  readonly="readonly"/>
							</td>
						</tr>
						<tr>    
							<td>Pasien</td>
							<td>:</td>
							<td><input type="text" name="nama_pasien" id="nama_pasien"  class="detail" size="15" readonly="readonly"/></td>
						</tr>
						<tr>    
							<td>Alamat</td>
							<td>:</td>
							<td>
								<input type="text" name="alamat" id="alamat" size="35" class="detail" readonly="readonly"/>
							</td>
						</tr>
						<tr>    
							<td width="150">Tgl Lahir</td>
							<td width="5">:</td>
							<td><input type="text" name="tgl_lahir" id="tgl_lahir" size="12" class="detail"  readonly="readonly"/>
							</td>
						</tr>
						<tr>    
							<td width="150">Jenis Kelamin</td>
							<td width="5">:</td>
							<td><input type="text" name="gender" id="gender" size="12" class="detail"  readonly="readonly"/>
							</td>
						</tr>
					</table>
				</fieldset>
			</td>
			<td valign="top" width="50%" >
				<fieldset id="cekhasil" class="atas">
					<table width="100%">
						<tr>    
							<td>Jenis Pemeriksaan</td>
							<td>:</td>
							<td>
							<select name="jenis_pemeriksaan" id="jenis_pemeriksaan" class="detail" style="height:25px;">
							<?php 
							if(empty($jenis_pemeriksaan)){
							?>
							<option value="">-PILIH-</option>
							<?php
							}
							foreach($l_diagnosa->result() as $t){
								if($jenis_pemeriksaan==$t->id_diagnosa){
							?>
							<option value="<?php echo $t->id_diagnosa;?>" selected="selected"> (<?php echo $t->id_diagnosa;?>) - <?php echo $t->nama_diagnosa;?></option>
							<?php }else { ?>
							<option value="<?php echo $t->id_diagnosa;?>"> (<?php echo $t->id_diagnosa;?>) - <?php echo $t->nama_diagnosa;?></option>
							<?php }
							} ?>
							</select>
							</td>
						</tr>
						<tr>    
							<td width="150">Hasil Periksa</td>
							<td width="5">:</td>
							<td><input type="text" name="hasilperiksa" id="hasilperiksa" class="detail" size="30" />
							</td>
						</tr>
						<tr>    
							<td width="150">Catatan</td>
							<td width="5">:</td>
							<td>
								<input type="text" name="catatan" id="catatan" class="detail" size="35" />
							</td>
						</tr>
						<input type="hidden" name="tarif" id="tarif" class="detail" size="35" />
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
							<button type="button" name="tambah" id="tambah_data" class="easyui-linkbutton" data-options="iconCls:'icon-add'">TAMBAH</button>
							<button type="button" name="cetak" id="cetak" class="easyui-linkbutton" data-options="iconCls:'icon-print'">CETAK</button>
							<a href="<?php echo base_url();?>index.php/hasiltest/">
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
					<div id="dlg" class="easyui-dialog" title="Daftar Cek Pemeriksaan Pasien" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
						Cari : <input type="text" name="caripemeriksaan" id="caripemeriksaan" size="50" />
						<div id="daftar_pemeriksaanpasien"></div>
					</div>