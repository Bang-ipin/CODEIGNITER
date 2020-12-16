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
												<th>No. Invoice</th>
												<th>Tanggal Invoice</th>
												<th>Pelanggan</th>
												<th>Institusi</th>
												<th>Kota</th>
												<th>Telepon</th>
												<th>Ultah</th>
												<th>Paket</th>
												<th>Bank</th>
												<th>Status</th>
												<th>WEB</th>
												<th>IG</th>
												<th>Note</th>
												<th width="10%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($query as $rows){ 
												if ($rows->paket==1){
													$paket =" Paket Basic";
												}else
												if ($rows->paket==2){
													$paket ="Paket Premium";
												}
												else if($rows->paket==3){
													$paket = " Paket Pro";
												}
												else{
													$paket = "Paket Special";
												}
												if($rows->status == 0){
														$stt ="<span class='label label-info'> Pending</span>";
												}else
												 if($rows->status == 1){
														$stt ="<span class='label label-warning'> Sedang Diproses</span>";
												}
												else{
														$stt ="<span class='label label-success'> Complete</span>";
												}
												if($rows->pembayaran == 1){
														$bank ="<span class='label label-default'> Bank BCA</span>";
												}else
												 if($rows->pembayaran == 2){
														$bank ="<span class='label label-default'> Bank BNI</span>";
												}else
												 if($rows->pembayaran == 3){
														$bank ="<span class='label label-default'> Bank BRI</span>";
												}
												else{
														$bank ="<span class='label label-danger'> Undefined</span>";
												}
												?>
											<tr>
												<td align="center"><?php echo $no++;?></td>
												<td align="center"><?php echo $rows->kode_invoice;?></td>
												<td align="center"><?php echo $this->M_administrator->tgl_indo($rows->tanggal_invoice);?></td>
												<td align="center"><?php echo $rows->pelanggan;?></td>
												<td align="center"><?php echo $rows->institusi;?></td>
												<td align="center"><?php echo $rows->kota;?></td>
												<td align="center"><?php echo $rows->telepon;?></td>
												<td align="center"><?php echo $this->M_administrator->tgl_indo($rows->ttl);?></td>
												<td align="center"><?php echo $paket;?></td>
												<td align="center"><?php echo $bank;?></td>
												<td align="center"><?php echo $stt;?></td>
												<td align="center"><?php echo $rows->postweb;?></td>
												<td align="center"><?php echo $rows->postig;?></td>
												<td align="center"><?php echo $rows->catatan;?></td>
												<td align="center" width="15%">
													<a href="<?php echo base_url().'administrator/editpostingan/';?><?php echo $rows->id;?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/plugins/easyui/themes/icons/pencil.png"></img></a>
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
            url: '<?= base_url('administrator/hapuspelanggan');?>',
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
						window.location.reload('<?php echo base_url('administrator/pelanggan/list');?>').html(Ya);
						},2800)
					}
				});
			}
        });
	};
	
	</script>


