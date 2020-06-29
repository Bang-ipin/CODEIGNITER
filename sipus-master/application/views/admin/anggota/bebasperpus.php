<style type="text/css">
*{
	font-family: Arial;
	margin:0px;
	padding:0px;
}
@page {
	margin-left:5cm 2cm 2cm 2cm;
}
table.grid{
	width:21cm ;
	font-size: 12px;
	border-collapse:collapse;
}
table.grid th{
	padding:5px;
	border:1px solid #000;
}
table.grid th{
	background: #F0F0F0;
	border-top: 0.2mm solid #000;
	border-bottom: 0.2mm solid #000;
	text-align:center;
	border:1px solid #000;
}
table.grid tr td{
	padding:5px;
	border-bottom:0.2mm ;
}
td.solid-top-bottom{
	border	:1px solid #000;
	padding	: 20px;
}

h1{
	font-size: 18px;
}
h2{
	font-size: 14px;
}
h3{
	font-size: 12px;
}
p {
	font-size: 12px;
}
center {
	padding:2px;
}
.atas{
	display: block;
	margin:0px;
	padding:0px;
}

.akhir {
	width:21cm ;
	font-size:13px;
}
.page {
	width:21cm ;
	font-size:12px;
	padding:10px;
}
table.footer{
	width:21cm ;
	font-size: 12px;
	border-collapse:collapse;

}
</style>
<script>
	function cetak() {
		window.print();
	}
	function tutup() {
		window.close();
	}
</script>
<script>
	window.onload = function() {
		window.print();
		document.getElementById("tutup").focus();
	}; 
</script>
<?php

$kop 		 = '<center><h2>'.$nama_yayasan.'</h2></center>';
$kop 		.= '<center><h2>'.$sekolah.'</h2></center>';
$kop 		.= '<center><h2>'.$instansi.'</h2></center><br/>';
$kop 		.= '<center><p>'.$akreditasi.'</p></center>';
$kop 		.= '<center><p>'.$alamat.'</p></center>';

$logo 		 = "<img src=".base_url('asset/image/smk.png')." >";

function myheader($kop,$logo){
?>
<table>
	<td width="20%"></td>
	<td width="60%" class="solid-top-bottom">
		<div class="atas">
			<table width="100%">
				<tr>
					<td width="20%" align="center"><?php echo $logo;?></td>
					<td width="60%"><?php echo $kop;?></td>
					<td width="20%"></td>
				</tr>
				
			</table>
			<hr/>
		</div> 
		<?php }
		function myfooter(){} myheader($kop,$logo);
		?>
		<br/>
		<center><p><strong><?=$keterangan;?></strong></p></center>
		<center><p><strong><?=$bebas;?></strong></p></center>
		<div style="padding:10px"></div>
		<p align="left"><?=$pembuka;?></p>
		<div style="padding:10px"></div>
		<table width="100%" class="footer" align="center">
			<tr>
				<td width="5%"></td>
				<td width="10%">NIS</td>
				<td width="5%">:</td>
				<td width="20%"><?=strtoupper($nis);?></td>
				<td width="40%"></td>
			</tr>
			<tr>
				<td width="5%"><br/></td>
			</tr>
			<tr>
				<td width="5%"></td>
				<td width="10%">Nama</td>
				<td width="5%">:</td>
				<td width="20%"><?=strtoupper($nama);?></td>
				<td width="40%"></td>
			</tr>
		</table>
		<div style="padding:10px"></div>
		<p align="left"><?=$isi;?></p>
		<p align="left"><?=$penutup;?></p>
		<div style="padding:10px"></div>
		<table width="100%" border="0">
			<tr>
				<td width="60%">&nbsp;</td>
				<td width="40%">
					<p>Sleman, <?=$this->M_admin->tgl_indo(date("Y-m-d"));?></p>    
					<p>Kepala Perpustakaan SMK PIRI Sleman</p><br />
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					( <?=strtoupper($kepalaperpus);?> )
				</td>
			</tr>
		</table>
	</td>
	<td width="20%"></td>
</table>