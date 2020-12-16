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
								
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message');?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Tempat</th>
												<th>Pemilik</th>
												<th>Alamat</th>
												<th>Kontak</th>
												<th>Area</th>
												<th>PJ</th>
												<th>Kebutuhan</th>
												<th>Keterangan</th>
												<th width="10%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($query as $rows){ ?>
											<tr>
												<td align="center"><?php echo $no++;?></td>
												<td align="center"><?php echo $rows->nama;?></td>						
												<td align="center"><?php echo $rows->pemilik;?></td>
												<td align="center"><?php echo $rows->alamat;?></td>
												<td align="center"><?php echo $rows->kontak;?></td>
												<td align="center"><?php echo $rows->area;?></td>
												<td align="center"><?php echo $rows->penanggungjawab;?></td>
												<td align="center"><?php echo $rows->kebutuhan;?></td>
												<td align="center"><?php echo $rows->keterangan;?></td>
												<td align="center" width="15%">
													<a href="<?php echo base_url().'administrator/editkonsumen/';?><?php echo $rows->id;?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/pencil.png"></img></a>
													 <button type="button" class="btn btn-link btn-sm" id="hapus" onclick="hapusdata('<?php echo $rows->id?>')">
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
	
	function hapusdata(hapus) {
		$.messager.confirm('Hapus Data', 'Apakah anda yakin mau menghapus data ini?', function(Ya)
		{
		if(Ya){
			$.ajax({
            type: 'POST',
            url: '<?=base_url('administrator/hapuskonsumenayam');?>',
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
						window.location.reload('<?php echo site_url('administrator/sales');?>').html(Ya);
						},2800)
					}
				});
			}
        });
	};
	
	</script>


