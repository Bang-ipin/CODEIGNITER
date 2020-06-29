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
					url: "<?=base_url('gudang/lap_bk/cari');?>",
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
				url: "<?=base_url('gudang/lap_bk/all');?>",
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
						<div class="box-body">
							<div class="box-header bg-aqua">
								<h3 align="center">LAPORAN DISTRIBUSI BARANG</h3>
							</div>
							<hr />
								<div class="form-horizontal">
									<div class="row">
										<div class="col-xs-12">
											<div class="form-horizontal">
												<div class="form-group">
													<label class="col-xs-3 control-label">Dari Tanggal</label>
													<div class="col-xs-8">
														<input type="text" class="form-control" id="tgl_awal" name="start_date" value="<?php echo date('d-m-Y'); ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="form-horizontal">
												<div class="form-group">
													<label class="col-xs-3 control-label">Sampai Tanggal</label>
													<div class="col-xs-8">
														<input type="text" class="form-control" id="tgl_akhir" name="end_date" value="<?php echo date('d-m-Y'); ?>">
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
														<button id="btnCari" name="submit" type="submit" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="width:80px">Cari</button>
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
