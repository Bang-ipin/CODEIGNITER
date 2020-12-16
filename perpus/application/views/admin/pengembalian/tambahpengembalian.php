<script type="text/javascript">
$(document).ready(function(){
	tampil_data();
	function tampil_data(){
		var kode = $("#kodekembali").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/datadetailkembali'); ?>",
			data	: "kode="+kode,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
	
	$("#kodepinjam").focus();
	$("#kodepinjam").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#kodepinjam").focus(function(e){
		var isi = $(e.target).val();
		CariKodePinjam();
	});
	$("#kodepinjam").keyup(function(){
		CariKodePinjam();
		
	});
	
	function CariKodePinjam(){
		var kode = $("#kodepinjam").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/infokodepinjam'); ?>",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				$("#nis").val(data.nis);
				$("#siswa").val(data.siswa);
			}
		});
	};
	
	$("#kode_buku").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#kode_buku").focus(function(e){
		var isi = $(e.target).val();
		CariBuku();
	});
	
	$("#kode_buku").keyup(function(){
		CariBuku();
		
	});
	
	function CariBuku(){
		var kode = $("#kode_buku").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/infobuku'); ?>",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
				$("#judul_buku").val(data.judul_buku);
				$("#pengarang").val(data.pengarang);
				$("#penerbit").val(data.penerbit);
			}
		});
	};
	$("#kodepinjam").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#form").on('submit',function(event){
		event.preventDefault();
		
		var kodekembali				= $("#kodekembali").val();
		var kodepinjam				= $("#kodepinjam").val();
		var nis						= $("#nis").val();
		var tglkembali				= $("#tglkembali").val();
		var kode_buku				= $("#kode_buku").val();
		
		var string 					= $("#form").serialize();
		if(kodekembali =="" || kodekembali==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Pengembalian tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#kodekembali').focus();
			return false;
		}
		if(tglkembali=="" || tglkembali==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Pengembalian tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#tglkembali').focus();
			return false;
		}
		if(kodepinjam =="" || kodepinjam==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Peminjaman tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#kodepinjam').focus();
			return false;
		}
		if(nis =="" || nis==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, NIS tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#nis').focus();
			return false;
		}
		if(kode_buku=="" || kode_buku==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Buku tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#kode_buku').focus();
			return false;
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/simpanpengembalian'); ?>",
			data	: string,
			error 	: function(xhr, ajaxOptions, thrownError) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon',
					timeout:2000,
					showType:'slide'
				});
				$("#kode_buku").val('');
				$("#kode_buku").focus();
			},
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, 
					timeout:2000,
					showType:'slide'
				});
				tampil_data();
				$("#kode_buku").val('');
				$("#kode_buku").focus();
			}
		});
		
	});
	$("#tambah_data").click(function(){
		$(".detail").val('');
		$("#kode_buku").val('');
		$("#kode_buku").focus();
	});
	
	$("#cetak").click(function(){
		var kode	= $("#kodekembali").val();
		window.open('<?php echo site_url();?>admin/cetakpengembalianbuku/'+kode);
		return false();
	});

	$("#cari_buku").click(function(){
		AmbilDaftarBuku();
		$("#dlg").dialog('open');
	});

	$("#text_cari").keyup(function(){
		AmbilDaftarBuku();
		
	});

	function AmbilDaftarBuku(){
		var cari = $("#kodepinjam").val();
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/databukudipinjam'); ?>",
			data	: "cari="+cari,
			cache	: false,
			success	: function(data){
				$("#daftar_buku").html(data);
				$(".detail").val('');
			}
		});
	}
	$("#cari_kodepinjam").click(function(){
		AmbilDaftarKodePinjam();
		$("#dlgpinjam").dialog('open');
	});

	$("#text_cari_kode").keyup(function(){
		AmbilDaftarKodePinjam();
		
	});
	
	$("#text_cari_kode").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	function AmbilDaftarKodePinjam(){
		var cari = $("#text_cari_kode").val();
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/datakodepinjaman'); ?>",
			data	: "cari="+cari,
			cache	: false,
			success	: function(data){
				$("#daftar_kodepinjaman").html(data);
				$(".details").val('');
			}
		});
	}
		
	$(function(){
		$('#tgkembali').datetimepicker({
		lang:'en',
		timepicker:false,
		format:'d-m-Y',
		closeOnDateSelect:true,
		showAnim:'slide',
		});
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
												<div class="col-xs-3">
													<label for="faktur">Kode Kembali</label>
												</div>
												<div class="col-xs-4">
													<input class="form-control uneditable-input" type="text" name="kodekembali" id="kodekembali"  value="<?php echo $kode_kembali;?>" readonly="true">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="tanggal">Tanggal Kembali</label>
												</div>
												<div class="col-xs-5">
													<input class="form-control uneditable-input" name="tglkembali"  id="tglkembali" value="<?php echo $tgl_kembali;?>" data-options="validType:'length[3,10]'" readonly="true">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="kode">Kode Pinjam</label>
												</div>
												<div class="col-xs-5">
													<input class="form-control" type="text" name="kodepinjam" id="kodepinjam" >
												</div>
												<div class="col-xs-3">
													<button type="button" name="cari_kodepinjam" id="cari_kodepinjam" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="nis">NIS</label>				
												</div>
												<div class="col-xs-5">
													<input type="text" name="nis" id="nis" class="form-control" readonly="true"/>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="siswa">Siswa</label>				
												</div>
												<div class="col-xs-5">
													<input type="text" name="siswa" id="siswa" class="form-control" readonly="true"/>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-xs-3">
													<label for="kode_buku">Kode Buku</label>				
												</div>
												<div class="col-xs-5">
													<input type="text" name="kode_buku" id="kode_buku" class="form-control easyui-validatebox" data-options="required:true,validType:'length[3,10]'" value="" />
												</div>
												<div class="col-xs-3">
													<button type="button" name="cari_buku" id="cari_buku" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cek Buku</button>
												</div>
											</div>
											<fieldset class="atas">
												<table width="100%">
													<tr>
														<td colspan="3" align="center">
														<button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
														<button type="button" name="cetak" id="cetak" class="easyui-linkbutton" data-options="iconCls:'icon-print'">CETAK</button>
														<a href="<?php echo base_url('admin/pengembalian');?>">
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
									<div id="dlg" class="easyui-dialog" title="Daftar Buku Dipinjam" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
										<div id="daftar_buku"></div>
									</div>
									<div id="dlgpinjam" class="easyui-dialog" title="Daftar Semua Kode Pinjaman" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
										<div class="form-inline form-group">
											<div class="col-xs-5">
												<label>Cari </label>	:	<input type="text" name="text_cari_kode" id="text_cari_kode" class="form-control" />
											</div>
										</div>
										<div id="daftar_kodepinjaman" style="margin-top:50px;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		
		