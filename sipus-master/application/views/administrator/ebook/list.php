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
								<a href="<?=base_url('administrator/cetakebook')?>" class="btn btn-default" target="_blank">
								<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/print.png" title="Cetak Ebook"></img> Cetak</a>
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message');?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Kategori</th>
												<th>Judul</th>
												<th>Pengarang</th>
												<th>Penerbit</th>
												<th>Thn Terbit</th>
												<th width="15%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($query as $rows){ 
											?>
											<tr>
												<td align="center"><?php echo $no++;?></td>
												<td align="center"><?php echo $rows->nama_kategori;?></td>
												<td align="center"><?php echo $rows->judul_buku;?></td>
												<td align="center"><?php echo $rows->nama_pengarang;?></td>
												<td align="center"><?php echo $rows->penerbit;?></td>
												<td align="center"><?php echo $rows->tahun_terbit;?></td>
												<td align="center">
													<button type="button" class="btn btn-link btn-sm" id="view" onclick="view('<?php echo $rows->id_ebook?>')">
															<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/search.png"></img>
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
			<div id="dlg" class="easyui-dialog" title="E-Book" style="width:1024px;height:600px; padding:5px;" data-options="closed:true">
			<div id="materi_ebook"></div>
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
	
	function view(id) {
			$("#dlg").dialog('open');
			
			$.ajax({
				type	: 'POST',
				url		: "<?php echo site_url('administrator/dataebook'); ?>",
				data	: "id="+id,
				cache	: false,
				success	: function(data){
					$("#materi_ebook").html(data);
				}
			});
		}
	</script>


