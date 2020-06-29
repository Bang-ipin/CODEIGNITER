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
					<div class="col-lg-6 col-xs-6">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo $barang_masuk['total'];?></h3>
									  <p>Barang Masuk</p>
							</div>
							<div class="icon">
								<i class="ion ion-bag"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-xs-6">
						<div class="small-box bg-green">
							<div class="inner">
								<h3><?php echo $barang_keluar['total'];?></h3>
									<p>Barang Keluar</p>
							</div>
							<div class="icon">
								<i class="ion ion-stats-bars"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<section class="col-lg-12">
						<div class="box">
							<div class="box-header bg-aqua">
								<h3 class="box-title">Top 10 Barang Paling Sering Di Distribusi</h3>
							</div>
							<div class="box-body">
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>NO</th>
												<th>Nama Barang</th>
												<th>Jumlah</th>
											</tr>
										<thead>
										<tbody>
											<?php
											$i=1;
											foreach($daftar as $data) { ?>
											<tr>
												<td><?php echo $i++ ;?></td>
												<td><?php echo $data->nama_barang;?></td>
												<td><?php echo $data->total;?></td>
											</tr>
											<?php } ?>
										</tbody>
									 </table>
								</div>
							</div>
						</div>
					</section>
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
