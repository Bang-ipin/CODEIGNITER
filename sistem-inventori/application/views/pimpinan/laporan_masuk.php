<script type="text/javascript">
	$(function(){
		$('#tgl_awal').datetimepicker({
		lang:'en',
		timepicker:false,
		format:'d-m-Y',
		closeOnDateSelect:true
		});
		
		$('#tgl_akhir').datetimepicker({
			lang:'en',
			timepicker:false,
			format:'d-m-Y',
			closeOnDateSelect:true
		});
	});
	
    $(function(){
        $("#btnCari").click(function(e) {
            var  $tgl_awal = $("#tgl_awal").val();
            var  $tgl_akhir = $("#tgl_akhir").val();
			if(	$tgl_awal == '' || $tgl_akhir == '')
			{
				$('.modal-dialog').removeClass('modal-lg');
				$('.modal-dialog').addClass('modal-sm');
				$('#ModalHeader').html('Oops !');
				$('#ModalContent').html("Tanggal harus diisi !");
				$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
				$('#ModalGue').modal('show');
			}
			else
			{
		  $.ajax({
					type: "POST",
					url: "<?=base_url('pimpinan/lap_bm/cari');?>",
					dataType: "html",
					data: "tgl_awal="+$tgl_awal+"&tgl_akhir="+$tgl_akhir,
					cache:false,
					success	: function(data){
						var win = $.messager.progress({
						title:'Please waiting',
						msg:'Loading data...'
						});
						setTimeout(function(){
							$.messager.progress('close');
							$("#tampil_data").html(data);
						},2800)
					}
				});
			e.preventDefault();
			}
        });
    });
	
	$(function(){
        $("#all").click(function(e) {
            $.ajax({
				type: "POST",
				url: "<?=base_url('pimpinan/lap_bm/all');?>",
				data: $('form').serialize(),
				cache:false,
				success	: function(data){
					var win = $.messager.progress({
					title:'Please waiting',
					msg:'Loading data...'
					});
					setTimeout(function(){
						$.messager.progress('close');
						$("#tampil_data").html(data);
					},2800)
				}
			});
		});
	});
    
</script>
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
						<div class="box-body">
							<div class="box-header bg-aqua">
								<h4 align="center">LAPORAN PEMBELIAN BARANG GUDANG</h4>
							</div>
							<hr />
								<div class="form-horizontal">
									<div class="row">
										<div class="col-xs-12">
											<div class="form-horizontal">
												<div class="form-group">
													<label class="col-xs-3 control-label">Dari Tanggal</label>
													<div class="col-xs-8">
														<input type="text" class="form-control" id="tgl_awal" name="tgl_awal" value="<?php echo date('d-m-Y'); ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="form-horizontal">
												<div class="form-group">
													<label class="col-xs-3 control-label">Sampai Tanggal</label>
													<div class="col-xs-8">
														<input type="text" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?php echo date('d-m-Y'); ?>">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<div class="form-horizontal">
												<div class="form-group">
													<div class="col-xs-3"></div>
													<div class="col-xs-8">
														<button id="btnCari" name="submit" type="submit" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="width:80px;margin: 5px;">Cari</button>
														<button id="all" name="submit" type="submit" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="width:150px;margin: 5px;">Semua Transaksi</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<br />
							<div id="tampil_data"></div>
						</div>							
					</div>
				</div>
			</div>
		</section>
	</div>
			
