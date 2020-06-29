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
				echo "<div class='alert alert-success'>Data Kunjungan Perpustakaan dari tanggal ".$tgl_awal." sampai dengan tanggal ".$tgl_akhir." adalah sebagai berikut:<button type='button' class='close' data-dismiss='alert'>&times;</button></div>
					 <button id='cetakpdf' name='cetakpdf' type='submit' class='btn btn-default'><img src=".base_url('asset/image/pdf.png')."></img><span> Cetak PDF </span></button>";
		}else{
				echo "<div class='alert alert-success'>Data semua kunjungan Perpustakaan sebagai berikut: <button type='button' class='close' data-dismiss='alert'>&times;</button></div>
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
							<th>NIS</th>
							<th>Nama Anggota</th>
							<th>Tgl Kunjungan</th>
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
							<td align="center"><?php echo $rows->nis;?></td>
							<td align="center"><?php echo $rows->nama_anggota;?></td>
							<td align="center"><?php echo date("d F Y",strtotime($rows->tgl_kunjungan));?></td>
						</tr>
						<?php
							}
						}else{
						?>
						<tr>
							<td colspan="4" style="text-align: center; background: #49afcd"><strong>Tidak ada kunjungan</strong></td>
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
				window.open('<?php echo base_url()?>administrator/cetakPdf/'+$tgl_awal+'/'+$tgl_akhir);
			}
        });
    });
	$(function(){
        $("#printpdf").click(function(e) {
				window.open('<?php echo base_url()?>administrator/printpdf');
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
