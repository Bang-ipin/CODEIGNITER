<script type="text/javascript">
	$(document).ready(function(){
		$("#kode_brg").keyup(function(e){
			var isi = $(e.target).val();
			$(e.target).val(isi.toUpperCase());
		});
		$("#stok").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#cari").click(function(){
			var kode = $("#kode_brg").val();
			var	pilih	= $(".pilih:checked").val();
			var jml_pilih = $(".pilih:checked");
			
			var string = "kode="+kode+"&pilih="+pilih;
			
			if(jml_pilih.length == 0){
			   var error = true;
			   alert("Maaf, Anda belum memilih");
			   return (false);
			 }
			 $("#tampil_data").html('');
			 $.ajax({
				type	: "POST",
				url		: "<?= base_url(); ?>/gudang/lap_stock/lihat",
				data	: string,
				cache	: false,
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
			return false();	
		});
		$("#cetak").click(function(){
			var kode = $("#kode_brg").val();
			var	pilih	= $(".pilih:checked").val();
			var jml_pilih = $(".pilih:checked");
			
			var string = "kode="+kode+"&pilih="+pilih;
			
			if(jml_pilih.length == 0){
			   var error = true;
			   alert("Maaf, Anda belum memilih");
			   return (false);
			 }
			 window.open('<?=base_url();?>gudang/lap_stock/cetakpdf/'+pilih+'/'+kode);
			return false();
		});
		$("#cetakexcel").click(function(){
			var kode = $("#kode_brg").val();
			var	pilih	= $(".pilih:checked").val();
			var jml_pilih = $(".pilih:checked");
			
			var string = "kode="+kode+"&pilih="+pilih;
			
			if(jml_pilih.length == 0){
			   var error = true;
			   alert("Maaf, Anda belum memilih");
			   return (false);
			 }
			 window.open('<?=base_url();?>gudang/lap_stock/cetakexcel/'+pilih+'/'+kode);
			return false();
		});
	//Flat red color scheme for iCheck
	$('input[type="radio"].minimal-blue').iCheck({
		radioClass: 'iradio_minimal-blue'
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
					<div class="col-md-12">
						<div class="box">
							<div class="box-header bg-aqua">
								<h3 class="box-title">Laporan Stok Barang</h3>
							</div>
							<div class="box-body">
								<div class="form-horizontal" style="font-size:13pt;color:blue;">
									<div class="form-group">
										<div class="col-xs-5">
											<input type="radio" name="pilih" class="pilih " value="all" checked="checked" /> Semua Data</td>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-2">
											<input type="radio" name="pilih" class="pilih " value="kode" /> Filter</td>
										</div>
										<div class="col-xs-5">
											<input type="text" name="kode_brg" id="kode_brg" class="form-control" placeholder="Nama Barang atau Jumlah Stok"/></td>
										</div>
									</div>
								</div>
								<div>&nbsp </div>
								<button type="button" name="cari" id="cari" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="width:80px">Cari</button>
								<button type="button" name="cetak" id="cetak" class="easyui-linkbutton" data-options="iconCls:'icon-pdf'" >CETAK PDF</button>
								<button type="button" name="cetakexcel" id="cetakexcel" class="easyui-linkbutton" data-options="iconCls:'icon-xls'" >CETAK EXCEL</button>
								<div>&nbsp;</div>
								<div id="tampil_data"/>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
					