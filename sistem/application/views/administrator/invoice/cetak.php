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
	width:21cm ;
	font-size: 12px;
	border-collapse:collapse;
}
table.grid th{
	padding:5px;
	border:1px solid #000;
}
table.grid th{
	background: #5fc3f9;
	border-top: 0.2mm solid #000;
	border-bottom: 0.2mm solid #000;
	text-align:center;
	border:1px solid #f1f1f1;
}
table.grid tr td{
	padding:5px;
	border-bottom:0.2mm solid #000;
	border:1px solid #f1f1f1;
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
	padding:8px;
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
	width:21cm ;
	page-break-after: always;
	margin-bottom:10px;
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
<br/><br/><br/><br/><br/><br/>
<?php

$kiri = "<img src=".base_url('asset/image/logo.png')." style='width:150px;height:40px' >";
$kiri .= '<p>'.$alamat.'</p>';
$kiri .= '<p>'.$emailcompany.'</p>';
$kiri .= '<p>'.$websitecompany.'</p>';
$kiri .= '<p>'.$teleponcompany.'</p><br/>';


$kanan = "<table class='kanan' width='100%'>
		  <tr>
		  	<td width='80'>No. Invoice</td>
			<td width='5'>:</td>
			<td><b>$kodeinvoice</b></td>
		  </tr>
		  <tr>
		  	<td>Tanggal Transfer</td>
			<td width='5'>:</td>
			<td>$tanggal</td>
		  </tr>
		  <tr>
		  	<td width='80'>Pelanggan</td>
			<td width='5'>:</td>
			<td><b>$pelanggan</b></td>
		  </tr>
		  <tr>
		  	<td>Alamat</td>
			<td width='5'>:</td>
			<td>$kota</td>
		  </tr>
		  
		  <tr>
		  	<td>Email</td>
			<td width='5'>:</td>
			<td>$email</td>
		  </tr>
		  <tr>
		  	<td>Telepon</td>
			<td width='5'>:</td>
			<td>$telepon</td>
		  </tr>
		  
		  </table>";
function myheader($kiri,$kanan,$judul){
?>
<table>
	<td width="15%"></td>
	<td width="100%" >
		<div class="atas">
			<table width="100%">
				<tr>
					<td width="70%" valign="top">
				   		<?php echo $kiri;?>
				    </td>
					<td width="30%" valign="top">
				    	<?php echo $kanan;?>
				    </td>
				</tr>    
			</table>
			<table width="100%">
				<td align="center"><h1><?php echo $judul;?></h1><td>
			</table>
			<br/>
			<br/>
		</div>
		<table class="grid" width="100%">
			<tr>
		    	<th width="2%">No</th>
		    	<th width="10%">Paket</th>
		    	<th width="10%">Transfer Ke</th>
		        <th width="20%">Nominal</th>
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
					$total = $r['nominal'];
					if ($r['paket']==1){
							$paket =" Paket Basic";
						}else
						if ($r['paket']==2){
							$paket ="Paket Premium";
						}
						else if($r['paket']==3){
							$paket = " Paket Pro";
						}
						else{
							$paket = "Paket Special";
						}
					if ($r['pembayaran']==1){
							$bank =" Bank BCA";
						}else
						if ($r['pembayaran']==2){
							$bank ="Bank BNI";
						}
						else if($r['pembayaran']==3){
							$bank = " Bank BRI";
						}
						else{
							$bank = "Bank Tidak terdaftar";
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
			    	<td align="center"><?php echo $no++;?></td>
			    	<td align="center"><?php echo $paket;?></td>
			    	<td align="center"><?php echo $bank;?></td>
			        <td align="center"><?php echo $r['nominal'];?></td>
				</tr>
				<?php
				$no++;
				$g_total = $g_total+$total;
				}
			echo "<tr>
				<td colspan='3' align='center'>Total</td>
				<td align='center'><b>Rp&nbsp;".number_format($g_total,0,',','.')."</b></td>
				</tr>";
		myfooter();	
			echo "</table>";
		?>
		<div style="padding:10px"></div>
		<div style="padding:10px"></div>
		<table width="100%" border="0">
			<tr>
				<td width="70%">&nbsp;</td>
				<td width="30%">
					<p><?=$this->M_administrator->tgl_indo(date("Y-m-d"));?></p>    
					<p>Halokerja.id</p><br />
					<img src="<?=base_url('asset/image/ttd.png');?>" style="width:120px;height:40px" >
					<p>&nbsp;</p>
					( <?=strtoupper($this->session->userdata('username'));?> )
				</td>
			</tr>
		</table>
	</td>
	<td width="20%"></td>
</table>