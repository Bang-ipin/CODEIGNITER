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
								<a href="<?=base_url('admin/tambah_materi')?>" class="btn btn-default">
									<img src="<?=config_item('asset')?>/image/add.png"></img> Tambah
								</a>
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message');?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Judul</th>
												<th>Pengampu</th>
												<th>Tanggal Upload</th>
												<th width="20%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($query as $rows){ 
											
											?>
											<tr>
												<td align="center"><?php echo $no++;?></td>
												<td align="center"><?php echo $rows->judul_materi;?></td>
												<td align="center"><?php echo $rows->nama_pengampu;?></td>
												<td align="center"><?php echo $rows->tanggal_upload;?></td>
												<td align="center">
													<button type="button" class="btn btn-link btn-sm" id="view" onclick="view('<?php echo $rows->id_materi?>')">
															<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/search.png"></img>
													</button>
													<a href="<?php echo base_url().'admin/edit_materi/';?><?php echo $rows->id_materi;?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/pencil.png"></img></a>
													<button type="button" class="btn btn-link btn-sm" id="hapus" onclick="hapusmateri('<?php echo $rows->id_materi?>')">
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
		<div id="dlg" class="easyui-dialog" title="Pembelajaran" style="width:1024px;height:600px; padding:5px;" data-options="closed:true">
			<div id="materi_ebook"> </div>
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
		
		function hapusmateri(hapus) {
			$.messager.confirm('Hapus Data', 'Apakah anda yakin mau menghapus data ini?', function(Ya)
			{
			if(Ya){
				$.ajax({
	            type: 'POST',
	            url: '<?= base_url('admin/hapusmateri');?>',
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
							window.location.reload('<?php echo base_url('admin/listmateri');?>').html(Ya);
							},2800)
						}
					});
				}
	        });
		};
		function view(id) {
			$("#dlg").dialog('open');
			
			$.ajax({
				type	: 'POST',
				url		: "<?php echo site_url('admin/datamateri'); ?>",
				data	: "id="+id,
				cache	: false,
				success	: function(data){
					$("#materi_ebook").html(data);
				}
			});
		}
	</script>


