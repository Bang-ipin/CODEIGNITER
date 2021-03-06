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
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header bg-aqua">
							<a class="btn btn-default" href="<?php echo base_url();?>data/pelanggan/tambah_pelanggan">
							<span><img src="<?php echo base_url();?>asset/image/add.png" width="20"></img></span>Tambah pelanggan
							</a>
						</div>
						<div class="table-responsive" style="padding:5px;">
							<table id="table" class="table-bordered table-striped">
								<thead>
									<tr>
									<th>No</th>
									<th>Nama pelanggan</th>
									<th>Alamat</th>
									<th>Telepon</th>
									<th>Actions</th>
									</tr>
								</thead>
							<tbody>
								<?php
								$no=0;
								foreach($query as $rows){
								?>
										<tr>
											<td><?php echo ++$no;?></td>
											<td><?php echo $rows->nama_pelanggan;?></td>
											<td><?php echo $rows->alamat_pelanggan;?></td>
											<td><?php echo $rows->telepon;?></td>
											<td>
											<a href="<?php echo base_url()?>data/pelanggan/edit_pelanggan/<?php echo $rows->id_pelanggan?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/easyui/themes/icons/pencil.png"></img></a>
											<a href="<?php echo base_url()?>data/pelanggan/delete/<?php echo $rows->id_pelanggan?>" class="btn btn-link btn-xs" onclick="return confirm('Anda Yakin menghapus data ini?')"><img src="<?php echo base_url()?>asset/easyui/themes/icons/no.png"></img></a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="clearfix" style="margin-bottom:65px;"/>
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
