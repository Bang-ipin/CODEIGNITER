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
width:20.99cm ;
font-size: 12px;
border-collapse:collapse;
}
table.grid th{
	padding:5px;
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center;
border:1px solid #000;
}
table.grid tr td{
	padding:2px;
	border-bottom:0.2mm solid #000;
	border:1px solid #000;
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
	padding:8px;
}
.atas{
display: block;
width:20.99cm ;
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
width:20.99cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:20.99cm ;
font-size:13px;
}
.page {
width:20.99cm ;
font-size:12px;
padding:10px;
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

$kiri = '<h1>'.$instansi.'</h1>';
$kiri .= '<p>'.$alamat.'</p>';

$kanan = "<table class='kanan' width='100%'>
		  <tr>
		  	<td width='80'>Kode Pengembalian</td>
			<td width='5'>:</td>
			<td><b>$kode_kembali</b></td>
		  </tr>
		  <tr>
		  	<td width='80'>Kode Pinjam</td>
			<td width='5'>:</td>
			<td><b>$kode_pinjam</b></td>
		  </tr>
		  <tr>
		  	<td>Tanggal</td>
			<td width='5'>:</td>
			<td>$tanggal_kembali</td>
		  </tr>
		  <tr>
		  	<td>NIS Siswa</td>
			<td width='5'>:</td>
			<td>$nis</td>
		  </tr>
		  </table>";
function myheader($kiri,$kanan,$judul){
?>
<div class="atas">
<table width="100%">
<tr>
	<td width="60%" valign="top">
   		<?php echo $kiri;?>
    </td>
	<td width="40%" valign="top">
    	<?php echo $kanan;?>
    </td>
</tr>    
</table>
<center><h1><?php echo $judul;?></h1></center>
</div>
<table class="grid" width="100%">
	<tr>
    	<th width="20">No</th>
        <th width="150">Kode Buku</th>
        <th width="400">Nama Buku</th>
        <th width="120">Pengarang</th>
        <th width="50">Penerbit</th>
        <th width="150">Batas Pengembalian</th>
		<th width="150">Denda</th>
    </tr>        
<?php
}
function myfooter(){	
	echo "</table>";
}
	$g_total=0;
	$no=1;
	$page =1;
	foreach($data->result_array() as $r){
	
	$tglpinjam 		= $this->M_admin->CariTanggal($kode_pinjam);
	$nominaldenda 	= $this->M_admin->CariDenda($id_denda);
	$batas 			= $this->M_admin->CariTempo($kode_pinjam);
	$tglkembali 	= $tanggal_kembali;
	$carihari 		= abs(strtotime($tglpinjam)- strtotime($tanggal_kembali));
	$hitung_hari	= floor($carihari/(60*60*24));
	if($hitung_hari > $batas ){
		$telat		= $hitung_hari - $batas ;
		$denda		= $nominaldenda * $telat;
	}else{
		$telat		= 0;
		$denda		= 0;
	}
	if(($no%25) == 1){
   	if($no > 1){
        myfooter();
        echo "<div class=\"pagebreak\" align='right'>
		<div class='page' align='center'>Hal - $page</div>
		</div>";
		$page++;
  	}
   	myheader($kiri,$kanan,$judul);
	}
	?>
    <tr>
    	<td align="center"><?php echo $no;?></td>
        <td align="center"><?php echo $r['kode_buku'];?></td>
        <td ><?php echo $r['judul_buku'];?></td>
        <td align="center"><?php echo $r['nama_pengarang'];?></td>
        <td align="center"><?php echo $r['penerbit'];?></td>
        <td align="right"><?php echo $this->M_admin->tgl_str($r['tgl_kembali']);?></td>
        <td align="right">Rp <?php echo number_format($denda);?></</td>
    </tr>
    <?php
	$no++;
	
	}
	
myfooter();	
	echo "</table>";
	echo "<div class='page' align='center'>Hal - ".$page."</div>";
?>