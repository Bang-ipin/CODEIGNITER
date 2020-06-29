<style type="text/css">
*{
font-family: Arial;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
width:8.5cm ;
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
td.dotted{
	border-left:1px dotted #000;
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
font-size: 10px;
}
center {
	padding:2px;
}
.atas{
display: block;
width:8.5cm ;
margin:0px;
padding:0px;
}
.kanan tr td{
	font-size:12px;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:8.5cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:8.5cm ;
font-size:13px;
}
.page {
width:8.5cm ;
font-size:10px;
padding:10px;
}
table.footer{
	width:8.5cm ;
	font-size: 10px;
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

$kop = '<center><h2>'.$nama_program.'</h2></center>';
$kop .= '<center><p>'.$instansi.'</p><center>';

$barcode = "<img src=".site_url('admin/generate/'.$nis.'')." >";

function myheader($kop,$judul,$barcode){
?>
<hr/>	
<table>
	<td width="1%" class="dotted"></td>
	<td width="48%" valign="top">
		<div class="atas">
			<?php echo $kop;?>
			<hr/>
		</div>
		<div class="atas">
			<center><?=$barcode;?></center>
		</div>
			   
		<?php }
		function 
		myfooter(){}
		myheader($kop,$judul,$barcode);
		?>

		<div style="padding:10px"></div>
		<table width="100%" class="footer">
			<tr>
				<td width="50%">
					<b>PERHATIAN</b>
					<br />
					<p class="h3">Penggunaan Kartu Anggota oleh yang tidak berhak dikenakan sanksi sesuai ketentuan yang berlaku</p>
					<br /><br /><br /><br />
					<b><u></u></b>
				</td>
				<td width="50%" valign="top" align="center">
					<b>Petugas,</b>
					<br /><br /><br /><br />
					<b><u><?php echo $this->session->userdata('nama_pengguna');?></u></b>
				</td>
			</tr>
		</table>
	</td>
	<td width="1%" class="dotted"></td>
	<td width="48%" valign="top">
		<div class="atas">
			<?php echo $kop;?>
			<hr/>
		</div>
		<div class="atas">
			<table class="grid">
				<tr>
					<td width="35%">NIS</td>
					<td>:</td>
					<td><?=strtoupper($nis);?></td>
				</tr>
				<tr>
					<td width="35%">Nama</td>
					<td>:</td>
					<td><?=strtoupper($nama);?></td>
				</tr>
				<tr>
					<td width="35%">Jenis Kelamin</td>
					<td>:</td>
					<td><?=$jenis_kelamin;?></td>
				</tr>
				<tr>
					<td width="35%">Alamat</td>
					<td>:</td>
					<td><?=strtoupper($alamat);?></td>
				</tr>
				<tr>
					<td width="35%">Terdaftar</td>
					<td>:</td>
					<td><?=$tgl_daftar;?></td>
				</tr>
			</table>
		</div>
	</td>
	<td width="1%" class="dotted"></td>
</table>
<hr/>	