<style type="text/css">
	.stripe1 {
	background-color:#FBEC88;
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
					Dashboard
						<small>Sistem Informasi Inventori dan Penjualan</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="box"> 
							<div class="box-header bg-aqua">
								<a class="btn btn-default" href="<?=base_url();?>gudang/tbk/add">
								<img src="<?php echo base_url();?>asset/image/add.png" width="20"></img>Input Data
								</a>
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message')?></div>
								<div><?php echo $this->session->flashdata('pesan')?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
											<th>No</th>
											<th>Kode Transaksi</th>
											<th>Tanggal</th>
											<th>Toko</th>
											<th>Penerima</th>
											<th>Total Harga</th>
											<th>Actions</th>
											</tr>
										</thead>
									<tbody>
									<?php
									$no=0;
										if(isset($query)){
											foreach($query as $rows){
											?>
												<tr>
													<td align="center"><?php echo ++$no ?></td>
													<td align="center"><?php echo $rows->kode_transaksi;?></td>
													<td align="center"><?php echo date("d F Y",strtotime($rows->tanggal_transaksi));?></td>
													<td align="center"><?php echo $rows->nama_toko;?></td>
													<td align="center"><?php echo $rows->username;?></td>
													<td align="left">Rp <?php echo number_format($rows->total_harga,2,',','.');?></td>
													<td align="center">
														<a href="<?php echo base_url()?>gudang/tbk/view/<?php echo $rows->kode_transaksi?>" class="btn btn-default btn-sm" ><img src="<?php echo base_url();?>asset/easyui/themes/icons/search.png" width="17" height="17"></img></a>
														<a href="<?=base_url()?>gudang/tbk/hapus/<?php echo $rows->kode_transaksi?>" class="btn btn-default btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><img src="<?php echo base_url();?>asset/easyui/themes/icons/no.png"></img></a>
													</td>
												</tr>
												<?php
												}										
											}
											?>
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


		