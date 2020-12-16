<div class="modal" id="balasPesanInboxs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
				<h4 class="modal-title" id="ModalHeaderInboxs"></h4>
			</div>
			<div class="modal-body" id="ModalContentInboxs"></div>
			<div class="modal-footer" id="ModalFooterInboxs">
				<button type="button" class="btn btn-primary" id="BalasPesan">Balas Pesan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
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
							<div class="box-body">
							<?php if($this->session->flashdata('SUCCESSMSG')) { ?>
							<div role="alert" class="alert alert-success">
								<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
								<strong>Sukses!</strong>
								<?=$this->session->flashdata('SUCCESSMSG')?>
							</div>
							<?php } ?>
							<?php if($this->session->flashdata('GAGALMSG')) { ?>
							<div role="alert" class="alert alert-danger">
								<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
								<strong>Error!</strong>
								<?=$this->session->flashdata('GAGALMSG')?>
							</div>
							<?php } ?>
								<div class="table-responsive" style="padding:5px;">	
									<table id="table" class="table table-striped table-advance table-hover">
										<thead>
											<tr>
												<th>
													No
												</th>
												<th>
													Nama
												</th>
												<th>
													NIS
												</th>
												<th>
													Pesan
												</th>
												<th>
													Waktu
												</th>
												<th>
													Aksi
												</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no=1;
												foreach($datainbox as $inbox){
													$nis=$inbox['nis'];
													date_default_timezone_set('Asia/Jakarta');
													$date=date('d F Y , H:i',strtotime($inbox['tanggal']));
													
												?>
												<?php
													$t = "SELECT count(*) as jml FROM inbox WHERE status=0 AND username !='admin' AND inboxid='$nis'";
													$d = $this->db->query($t);
													$r = $d->num_rows();
													if($r > 0){
														foreach($d->result() as $h){
															$adapesan = $h->jml;
														}
													}else{
														$adapesan = 0;
													}
												?>
											
											<tr >
												<td>
														<?=$no++?>
												</td>
												<td class="view-message">
														<?=$inbox['username'];?> 
														<?php if(!empty($adapesan)){
													echo "<span class='badge badge-danger'>".$adapesan."</span>"; 
													}?>
												</td>
												<td class="view-message">
														<?=$inbox['nis'];?>
												</td>
												<td class="view-message">
														<?=$inbox['pesan'];?>
												</td>
												<td class="view-message text-right">
													<?=$date;?> WIB
												</td>
												<td class="text-right">
													<a href="<?=site_url('admin/balas_pesan/'.$inbox['nis'].'')?>" id="balasan" class="btn btn-info btn-sm" title="Balas Pesan"><i class="fa fa-reply"></i></a>
													<a href="<?=site_url('admin/hapuspesan/'.$inbox['nis']);?>" class="btn btn-sm btn-danger btn-editable">
													<i class="fa fa-trash"></i> </a>
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
			</section>
		</div>
		
		<script>	
			$(document).on('click','#balasan', function(e){
				e.preventDefault();

				$('.modal-dialog').removeClass('modal-sm');
				$('.modal-dialog').addClass('modal-md');
				$('#ModalHeaderInboxs').html('Balas Pesan');
				$('#ModalContentInboxs').load($(this).attr('href'));
				$('#balasPesanInboxs').modal('show');
			});
		
			$('#balasan').on('hide.bs.modal', function () {
				setTimeout(function(){ 
					$('#ModalHeaderInboxs, #ModalContentInboxs, #ModalFooterInboxs').html('');
				}, 5000);
			});
			$("#BalasPesan").on('click',function(event){
				event.preventDefault();
				
				var inbox		= $("#inbox").val();
		        var string      = $("#FormPesanBalasan").serialize();
		        if(inbox.length==0){
		            $("#inbox").focus();
		            return;
		        }
				$.ajax({
					type	: 'POST',
					url		: "<?php echo site_url('admin/kirimbalasan'); ?>",
					data	: string,
		            error : function(xhr, ajaxOptions, thrownError) {
		                            return false;
		                        }, 
					success	: function(data){
						tampil_data();
						$("#inbox").val('');
					}
				});
				
			});
		</script>
