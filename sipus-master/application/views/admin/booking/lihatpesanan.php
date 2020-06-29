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
							<div class="box-body">
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Pesanan</th>
												<th>NIS</th>
												<th>Nama</th>
												<th>Judul Buku</th>
												<th>Pengarang</th>
												<th>Penerbit</th>
												<th>Tanggal</th>
												<th>Status</th>
												<th>Keterangan</th>
												<th width="10%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($data as $rows){ 
											if ($rows->status_booking ==1){
												$stt="<label class='label label-success'>Dalam Proses</label>";
												}
												else if($rows->status_booking==2){
												$stt="<label class='label label-danger'>Di Tolak</label>";	
												}
												else{
													$stt="<label class='label label-info'>Sudah Tersedia</label>";	
												}
											?>
											<tr>
												<td align="center"><?php echo $no++;?></td>
												<td align="center"><?php echo $rows->kode_booking;?></td>
												<td align="center"><?php echo $rows->nis;?></td>
												<td align="center"><?php echo $rows->nama;?></td>
												<td align="center"><?php echo $rows->judul_buku;?></td>
												<td align="center"><?php echo $rows->pengarang;?></td>
												<td align="center"><?php echo $rows->penerbit;?></td>
												<td align="center"><?php echo $rows->tgl_pesan;?></td>
												<td align="center"><?php echo $stt;?></td>
												<td align="center"><?php echo $rows->keterangan;?></td>
												<td align="center">
													<a href="<?php echo base_url()?>admin/respon/<?php echo $rows->kode_booking?>" class="btn btn-link btn-xs" title="Proses" >
														<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/ok.png"></img>
													</a>
													<button type="button" class="btn btn-link btn-sm" id="hapus" onclick="hapuspesanan('<?php echo $rows->kode_booking?>')">
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
	function hapuspesanan(hapus) {
		$.messager.confirm('Hapus Data', 'Apakah anda yakin mau menghapus data ini?', function(Ya)
		{
		if(Ya){
			$.ajax({
            type: 'POST',
            url: '<?= base_url('admin/hapuspesanan');?>',
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
						window.location.reload('<?php echo base_url('admin/lihatpesanan');?>').html(Ya);
						},2800)
					}
				});
			}
        });
	};
	</script>


