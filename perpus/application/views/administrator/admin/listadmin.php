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
								<a href="<?=base_url('administrator/tambah_admin')?>" class="btn btn-default">
								<img src="<?=config_item('asset')?>/image/add.png"></img> Tambah</a>
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message');?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Username</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($query as $rows){ 
											?>
											<tr>
												<td align="center"><?php echo $no++;?></td>
												<td align="center"><?php echo $rows->nama_pengguna;?></td>
												<td align="center"><?php echo $rows->username;?></td>
												<?php if ($rows->id_usergroup==1){ ?>
												<td align="center">
													<a href="<?php echo base_url().'administrator/edit/';?><?php echo $rows->id_admin?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/pencil.png"></img></a>
												</td>
												<?php }else{ ?>
												<td align="center">
													<a href="<?php echo base_url().'administrator/edit/';?><?php echo $rows->id_admin?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/pencil.png"></img></a>
													<button type="button" class="btn btn-link btn-sm" id="hapus" onclick="hapusadmin('<?php echo $rows->id_admin?>')">
															<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/no.png"></img>
													</button>
												</td>	
												<?php } ?>
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
	
	function hapusadmin(hapus) {
		$.messager.confirm('Hapus Data', 'Apakah anda yakin mau menghapus data ini?', function(Ya)
		{
		if(Ya){
			$.ajax({
            type: 'POST',
            url: '<?= base_url('administrator/hapusadmin');?>',
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
						window.location.reload('<?php echo base_url('administrator/listadmin');?>').html(Ya);
						},2800)
					}
				});
			}
        });
	};
	
	</script>


