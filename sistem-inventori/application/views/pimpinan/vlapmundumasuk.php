<link rel="stylesheet" href="<?=config_item('asset')?>/easyui/themes/default/easyui.css"  type="text/css">
<link rel="stylesheet" href="<?=config_item('asset')?>/easyui/themes/icon.css"  type="text/css">
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
	<div>&nbsp </div>
	<?php if(isset($tgl_awal)){
				echo "<div class='alert alert-info'>Data transaksi pembelian Toko Mundu dari tanggal ".$tgl_awal." sampai dengan tanggal ".$tgl_akhir." adalah sebagai berikut:<button type='button' class='close' data-dismiss='alert'>&times;</button></div>
					 <button id='cetakpdf' name='cetakpdf' type='submit' class='btn btn-default'><img src=".base_url('asset/image/pdf.png')."></img><span> Cetak PDF </span></button>
					 <button id='cetakexcel' name='cetakexcel' type='submit' class='btn btn-default'><img src=".base_url('asset/image/xls.png')."></img><span> Cetak Excel </span></button>";
		}else{
				echo "<div class='alert alert-info'>Data semua transaksi pembelian Toko Mundu sebagai berikut: <button type='button' class='close' data-dismiss='alert'>&times;</button></div>
					  <button id='printpdf' name='printpdf' type='submit' class='btn btn-default'><img src=".base_url('asset/image/pdf.png')."></img><span> Print PDF </span></button>
					  <button id='printexcel' name='printexcel' type='submit' class='btn btn-default'><img src=".base_url('asset/image/xls.png')."></img><span> Print Excel </span></button>";
		}
	?>
	<div>&nbsp </div>
		<form class="form-horizontal">
			<div class="tabel-responsive" style="padding:5px;">
				<table id="table" class="table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Transaksi</th>
							<th>Tanggal</th>
							<th>Penerima</th>
							<th>Supplier</th>
							<th>Barang</th>
							<th>Jumlah</th>
							<th>Harga Beli</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=0;
						if(!empty($query)){
							foreach($query as $rows){
							?>
						<tr>
							<td align="center"><?php echo ++$no ?></td>
							<td align="center"><?php echo $rows->kode_transaksi;?></td>
							<td align="center"><?php echo date("d M Y",strtotime($rows->tanggal_transaksi));?></td>
							<td align="center"><?php echo $rows->penerima;?></td>
							<td align="center"><?php echo $rows->nama_supplier;?></td>
							<td align="center"><?php echo $rows->nama_barang;?></td>
							<td align="center"><?php echo $rows->jumlah;?></td>
							<td align="right">Rp. <?php echo number_format($rows->harga_beli,2,',','.');?></td>
							<td align="right">Rp. <?php echo number_format($rows->total,2,',','.');?></td>
						</tr>
						<?php
						}
						echo "<tr>";
						echo "<td colspan='8' style='text-align: center; background: #49afcd'><strong>Total Barang Masuk</strong></td>";
						echo "<td style='text-align: center; background: #49fd4f'>Rp ".number_format($rows->total_all,2,',','.')."</td>";
						echo "</tr>";
						}else{
						?>
						<tr>
							<td colspan="9" style="text-align: center; background: #49afcd"><strong>Tidak ada data</strong></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
<script type="text/javascript">
$(function(){
        $("#cetakpdf").click(function(e) {
            e.preventDefault();
			var  $tgl_awal = $("#tgl_awal").val();
            var  $tgl_akhir = $("#tgl_akhir").val();
			var  string = "tgl_awal="+$tgl_awal+"&tgl_akhir="+$tgl_akhir;
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
				window.open('<?php echo base_url()?>pimpinan/lap_belimundu/cetakPdf/'+$tgl_awal+'/'+$tgl_akhir);
			}
        });
    });
	$(function(){
        $("#cetakexcel").click(function(e) {
            e.preventDefault();
			var  $tgl_awal = $("#tgl_awal").val();
            var  $tgl_akhir = $("#tgl_akhir").val();
			var  string = "tgl_awal="+$tgl_awal+"&tgl_akhir="+$tgl_akhir;
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
				window.open('<?php echo base_url()?>pimpinan/lap_belimundu/cetakexcel/'+$tgl_awal+'/'+$tgl_akhir);
			}
        });
    });

	$(function(){
        $("#printpdf").click(function(e) {
				window.open('<?php echo base_url()?>pimpinan/lap_belimundu/printpdf');
			});
        });
		
	$(function(){
        $("#printexcel").click(function(e) {
            	window.open('<?php echo base_url()?>pimpinan/lap_belimundu/printexcel');
			});
        });
    
	
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
</script>
<script type="text/javascript" src="<?=config_item('asset');?>/easyui/jquery.easyui.min.js"></script>
