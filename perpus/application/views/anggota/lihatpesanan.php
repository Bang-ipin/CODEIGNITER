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
												<th>NIS</th>
												<th>Nama</th>
												<th>Kode Pesanan</th>
												<th>Tanggal Pesanan</th>
												<th>Status Pesanan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($data as $rows){ 
											$status = $rows->status_booking;
											if ($status==1){
												$stt="<label class='label label-success'>Dalam Proses</label>";
												}
												else if($status==2){
												$stt="<label class='label label-danger'>Di Tolak</label>";	
												}
												else{
													$stt="<label class='label label-info'>Sudah Tersedia</label>";	
												}
											?>
											<tr>
												<td align="center"><?php echo $no++;?></td>
												<td align="center"><?php echo $rows->nis;?></td>
												<td align="center"><?php echo $rows->nama;?></td>
												<td align="center"><?php echo $rows->kode_booking;?></td>
												<td align="center"><?php echo $this->M_anggota->tgl_indo($rows->tgl_pesan);?></td>
												<td align="center"><?php echo $stt;?></td>
												<td align="center">
													<a href="<?php echo base_url()?>anggota/view/<?php echo $rows->kode_booking?>" class="btn btn-default btn-xs" tooltip="Lihat Status" title="lihat"><img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/search.png" width="17" height="17"></img></a>
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
	</script>


