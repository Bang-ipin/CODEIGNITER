<link rel="stylesheet" href="<?=config_item('asset')?>/plugins/easyui/themes/default/easyui.css"  type="text/css">
<link rel="stylesheet" href="<?=config_item('asset')?>/plugins/easyui/themes/icon.css"  type="text/css">
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
	<div>&nbsp </div>
	<?php if(isset($tgl_awal)){
				echo "<div class='alert alert-success'>Data Pemesanan Buku Siswa di Perpustakaan dari tanggal ".$tgl_awal." sampai dengan tanggal ".$tgl_akhir." adalah sebagai berikut:<button type='button' class='close' data-dismiss='alert'>&times;</button></div>
					 <button id='cetakpdf' name='cetakpdf' type='submit' class='btn btn-default'><img src=".base_url('asset/image/pdf.png')."></img><span> Cetak PDF </span></button>";
		}else{
				echo "<div class='alert alert-success'>Data Semua Pemesanan Buku di Perpustakaan sebagai berikut: <button type='button' class='close' data-dismiss='alert'>&times;</button></div>
				  <button id='printpdf' name='printpdf' type='submit' class='btn btn-default'><img src=".base_url('asset/image/pdf.png')."></img><span> Print PDF </span></button>";
		}
	?>
	<div>&nbsp </div>
		<form class="form-horizontal">
			<div class="tabel-responsive" style="padding:5px;">
				<table id="table" class="table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Booking</th>
							<th>NIS</th>
							<th>Nama</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						if(!empty($query)){
							foreach($query as $rows){
							if ($rows->status_booking ==1){
							$stt="<label class='label label-success'>Dalam Proses</label>";
							}
							else if($rows->status_booking==2){
							$stt="<label class='label label-danger'>Di Tolak</label>";	
							}
							else{
								$stt="<label class='label label-info'>Sudah Tersedia</label>";	
							}	
						
						?>
						<tr>
							<td align="center"><?php echo $no++;?></td>
							<td align="center"><?php echo $rows->kode_booking;?></td>
							<td align="center"><?php echo $rows->nis;?></td>
							<td align="center"><?php echo $rows->nama;?></td>
							<td align="center"><?php echo $rows->judul_buku;?></td>
							<td align="center"><?php echo $rows->pengarang;?></td>
							<td align="center"><?php echo $rows->penerbit;?></td>
							<td align="center"><?php echo $this->M_administrator->tgl_indo($rows->tgl_pesan);?></td>
							<td align="center"><?php echo $stt;?></td>
							<td align="center"><?php echo $rows->keterangan;?></td>	
						</tr>
						<?php
							}
						}else{
						?>
						<tr>
							<td colspan="10" style="text-align: center; background: #49afcd"><strong>Tidak ada Pesanan</strong></td>
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
				window.open('<?php echo base_url()?>administrator/cetakpemesananpdf/'+$tgl_awal+'/'+$tgl_akhir);
			}
        });
    });
	$(function(){
        $("#printpdf").click(function(e) {
				window.open('<?php echo base_url()?>administrator/printpemesananpdf');
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
<script type="text/javascript" src="<?=config_item('asset');?>/plugins/easyui/jquery.easyui.min.js"></script>
