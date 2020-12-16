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
								<a class="btn btn-default" href="<?=base_url();?>administrator/tambahinvoice">
								<img src="<?php echo base_url();?>asset/image/add.png" width="20"></img>Tambah
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
												<th>Invoice</th>
												<th>Tanggal Transfer</th>
												<th>Pelanggan</th>
												<th>Kota</th>
												<th>Aksi</th>
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
													<td align="center"><?php echo $rows->kodeinvoice;?></td>
													<td align="center"><?php echo $this->M_administrator->tgl_indo($rows->tanggal);?></td>
													<td align="center"><?php echo $rows->pelanggan;?></td>
													<td align="center"><?php echo $rows->kota;?></td>
													<td align="center">
														<a href="<?php echo base_url().'administrator/cetakinvoice/'.$rows->kodeinvoice;?>" target="_blank">
															<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/print.png" title="Cetak Invoice">
														</a>
														<button type="button" class="btn btn-link btn-sm" id="view" onclick="view('<?php echo $rows->kodeinvoice?>')">
															<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/search.png"></img>
														</button>
														<button type="button" class="btn btn-link btn-sm" id="hapus" onclick="hapusdata('<?php echo $rows->kodeinvoice?>')">
															<img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/no.png"></img>
														</button>
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
		<div id="dlg" class="easyui-dialog" title="Detail Invoice" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
			<div id="daftar_invoice"></div>
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
		function hapusdata(hapus) {
			$.messager.confirm('Hapus Data', 'Apakah anda yakin mau menghapus data ini?', function(Ya)
			{
			if(Ya){
				$.ajax({
				type: 'POST',
				url: '<?= base_url('administrator/hapusinvoice');?>',
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
							window.location.reload('<?php echo base_url('administrator/invoice');?>').html(Ya);
							},2800)
						}
					});
				}
			});
		};
		function view(invoice) {
			$("#dlg").dialog('open');
			
			$.ajax({
				type	: 'POST',
				url		: "<?php echo site_url('administrator/datainvoice'); ?>",
				data	: "id="+invoice,
				cache	: false,
				success	: function(data){
					$("#daftar_invoice").html(data);
					$(".detail").val('');
				}
			});
		}
		</script>


		