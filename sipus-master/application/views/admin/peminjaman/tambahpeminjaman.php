<script type="text/javascript">
$(document).ready(function(){
	tampil_data();
	function tampil_data(){
		var kode = $("#kodepinjam").val();
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
	
	$("#nis").focus();
	$("#nis").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#nis").focus(function(e){
		var isi = $(e.target).val();
		CariSiswa();
	});
	$("#nis").keyup(function(){
		CariSiswa();
		
	});
	
	function CariSiswa(){
		var kode = $("#nis").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/infokodesiswa'); ?>",
			data	: "kode="+kode,
			cache	: false,
			dataType : "json",
			success	: function(data){
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
	$("#form").on('submit',function(event){
		event.preventDefault();
		
		var kodepinjam				= $("#kodepinjam").val();
		var tanggal					= $("#tanggal").val();
		var nis						= $("#nis").val();
		var kode_buku				= $("#kode_buku").val();
		
		var string 					= $("#form").serialize();
		
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
		if(tanggal =="" || tanggal==null){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Peminjaman tidak boleh kosong', 
				timeout:2000,
				showType:'show'
			});
			$('#tanggal').focus();
			return false;
		}
		if(nis=="" || nis==null){
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
			url		: "<?php echo site_url('admin/simpanpinjaman'); ?>",
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
		var kode	= $("#kodepinjam").val();
		window.open('<?php echo site_url();?>admin/cetakpeminjamanbuku/'+kode);
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
		var cari = $("#text_cari").val();
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/databuku'); ?>",
			data	: "cari="+cari,
			cache	: false,
			success	: function(data){
				$("#daftar_buku").html(data);
				$(".detail").val('');
			}
		});
	}
	$("#cari_siswa").click(function(){
		AmbilDaftarKodeSiswa();
		$("#dlgsiswa").dialog('open');
	});

	$("#text_cari_kode").keyup(function(){
		AmbilDaftarKodeSiswa();
		
	});

	function AmbilDaftarKodeSiswa(){
		var cari = $("#text_cari_kode").val();
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/datakodesiswa'); ?>",
			data	: "cari="+cari,
			cache	: false,
			success	: function(data){
				$("#daftar_kodesiswa").html(data);
				$(".details").val('');
			}
		});
	}
	
	
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
													<label for="faktur">Kode Peminjaman</label>
												</div>
												<div class="col-xs-3">
													<input type="text" class="form-control uneditable-input" name="kodepinjam" id="kodepinjam" size="12" readonly="readonly" value="<?php echo $kode_pinjam;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="tanggal">Tanggal Peminjaman</label>
												</div>
												<div class="col-xs-3">
													<input type="text" class="form-control uneditable-input" name="tanggal" id="tanggal" size="12" readonly="readonly" value="<?php echo $tgl_pinjam;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="password">Batas Waktu Peminjaman (hari)</label>
												</div>
												<div class="col-xs-2">
													<?php
													$attr			= "class='form-control select2' id='tempo'";
													$tempo_select	= $this->input->post('tempo')? $this->input->post('tempo'):'';
													echo form_dropdown('tempo',$dd_tempo,$tempo_select,$attr);
													?>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="nis">NIS</label>
												</div>
												<div class="col-xs-5">
													<input type="text" class="form-control" name="nis" id="nis"/>
												</div>
												<div class="col-xs-3">
													<button type="button" name="cari_siswa" id="cari_siswa" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="siswa">Nama Siswa</label>
												</div>
												<div class="col-xs-5">
													<input type="text" class="form-control uneditable-input" name="siswa" id="siswa" readonly="true" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="kode_buku">Kode Buku</label>				
												</div>
												<div class="col-xs-5">
													<input type="text" class="form-control" name="kode_buku" id="kode_buku" />
												</div>
												<div class="col-xs-3">
													<button type="button" name="cari_buku" id="cari_buku" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
												</div>
											</div>
											<fieldset class="atas">
												<table width="100%">
													<tr>
														<td colspan="3" align="center">
														<button type="submit" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
														<button type="button" name="cetak" id="cetak" class="easyui-linkbutton" data-options="iconCls:'icon-print'">CETAK</button>
														<a href="<?php echo base_url('admin/peminjaman');?>">
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
									<div id="dlg" class="easyui-dialog" title="Daftar Buku" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
										<div class="form-inline form-group">
											<div class="col-xs-5">
												<label>Cari Buku</label>	:	<input type="text" name="text_cari" id="text_cari" class="form-control" />
											</div>
										</div>
										<div id="daftar_buku" style="margin-top:50px;"></div>
									</div>
									<div id="dlgsiswa" class="easyui-dialog" title="Daftar Semua Kode Anggota" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
										<div class="form-inline form-group">
											<div class="col-xs-5">
												<label>Cari Siswa</label>	:	<input type="text" name="text_cari_kode" id="text_cari_kode" class="form-control" />
											</div>
										</div>
										<div id="daftar_kodesiswa" style="margin-top:50px;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		
		