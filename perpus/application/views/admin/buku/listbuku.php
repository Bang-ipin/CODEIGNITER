<style type="text/css">
	.stripe1 {
	background-color:#e0ecff;
}
	.stripe2 {
	background-color:#FFF;
	}
	.highlight {
	-moz-box-shadow: 1px 1px 2px #fff inset;
	-webkit-box-shadow: 1px 1px 2px #fff inset;
	box-shadow: 1px 1px 2px #fff inset;		  
	border:             #aaa solid 1px;
	background-color: #fece2f;
	}
</style>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					<?=$title;?>
				</h1>
			</section>			
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="box">
							<div class="box-header ">
								<a href="<?=base_url('admin/tambah_buku')?>" class="btn btn-default">
									<img src="<?=config_item('asset')?>/image/add.png"></img> Tambah
								</a>
								<a href="<?=base_url('admin/cetaksemuabuku')?>" class="btn btn-default" target="_blank">
								<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/print.png" title="Cetak Buku"></img> Cetak Semua Buku</a>
								<a href="<?=base_url('admin/cetakbarcodebarang')?>" target="_blank" class="btn btn-default">
									<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/print.png" title="Cetak Anggota"></img> Cetak Semua Kode Barcode
								</a>
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message');?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode</th>
												<th>Kategori</th>
												<th>Judul</th>
												<th>Pengarang</th>
												<th>Penerbit</th>
												<th>Thn Terbit</th>
												<th>Lokasi Buku</th>
												<th>Status</th>
												<th>Jml Peminjaman</th>
												<th width="10%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($query as $rows){ 
											if($rows->status_buku == 1){
													$stt ="<span class='label label-info'> Tersedia</span>";
												}else{
													$stt ="<span class='label label-warning'> Dipinjam</span>";
												}
											?>
											<tr>
												<td align="center"><?php echo $no++;?></td>
												<td align="center"><?php echo $rows->kode_buku;?></td>
												<td align="center"><?php echo $rows->nama_kategori;?></td>
												<td align="center"><?php echo $rows->judul_buku;?></td>
												<td align="center"><?php echo $rows->nama_pengarang;?></td>
												<td align="center"><?php echo $rows->penerbit;?></td>
												<td align="center"><?php echo $rows->tahun_terbit;?></td>
												<td align="center"><?php echo $rows->nama_rak;?></td>
												<td align="center"><?php echo $stt;?></td>
												<td align="center"><?php echo $rows->dipinjam;?></td>
												<td align="center">
													<a href="<?php echo base_url().'admin/edit_buku/';?><?php echo $rows->id_buku;?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/pencil.png"></img></a>
													<a href="<?php echo base_url().'admin/cetakkodebarcode/'.$rows->kode_buku;?>" target="_blank">
														<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/print.png" title="Cetak Kode Barcode">
													</a>
													<button type="button" class="btn btn-link btn-sm" id="hapus" onclick="hapusbuku('<?php echo $rows->id_buku?>')">
															<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/no.png"></img>
													</button>
												</td>	
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	<script type="text/javascript">
	$(function() {
		$("#table tr:even").addClass("stripe1");
		$("#table tr:odd").addClass("stripe2");
		$("#table tr").hover(
		function() {
			$(this).toggleClass("highlight");
			},
		function() {
			$(this).toggleClass("highlight");
			}
		);
	});
	
	function hapusbuku(hapus) {
		$.messager.confirm('Hapus Data', 'Apakah anda yakin mau menghapus data ini?', function(Ya)
		{
		if(Ya){
			$.ajax({
            type: 'POST',
            url: '<?= base_url('admin/hapusbuku');?>',
            dataType: "html",
			data: 'id='+hapus,
			cache	:false,
			success	: function(Ya){
			var win = $.messager.progress({
					title:'Please waiting',
					msg:'Loading data...'
					});
					setTimeout(function(){
						$.messager.progress('close');
						$.messager.show({
							title:'Berhasil',
							msg:'Data Berhasil Dihapus',
							timeout:3000,
							showType:'slide'
							});
						window.location.reload('<?php echo base_url('admin/listbuku');?>').html(Ya);
						},2800)
					}
				});
			}
        });
	};
	
	</script>


