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
			<div class="box-header">
				<h1>
					Dashboard
						<small>Sistem Informasi Inventori dan Penjualan</small>
				</h1>
			</div>
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="box">
							<div class="box-header bg-aqua">
								<a href="<?=base_url('admin/user/tambah_user')?>" class="btn btn-default">
								<img src="<?=config_item('asset')?>/image/add.png"></img> Tambah Data</a>
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message');?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>Username</th>
												<th>Email</th>
												<th>User</th>
												<th>Level</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=0;
											foreach($query as $rows){ 
											?>
											<tr>
												<td align="center"><?php echo $rows->id_user;?></td>
												<td align="center"><?php echo $rows->username;?></td>
												<td align="center"><?php echo $rows->email;?></td>
												<td align="center"><?php echo $rows->nama_pengguna;?></td>
												<td align="center"><?php echo $rows->usergroup;?></td>
												<td align="center">
													<a href="<?php echo base_url().'admin/user/edit/';?><?php echo $rows->id_user?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/easyui/themes/icons/pencil.png"></img></a>
													<a href="<?php echo base_url().'admin/user/delete/'?><?php echo $rows->id_user?>" class="btn btn-link btn-xs" onclick="return confirm('Anda Yakin menghapus data ini?')"><img src="<?php echo base_url();?>asset/easyui/themes/icons/no.png"></img></a>
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


