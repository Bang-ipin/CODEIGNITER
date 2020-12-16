<!DOCTYPE html5>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="<?=config_item('asset');?>/image/favicon.png">
		<link rel="stylesheet" href="<?=config_item('asset');?>/plugins/bootstrap/css/bootstrap.css" type="text/css" />
		<style>
			#table{
				border-collapse: collapse;
				width: 100%;
				margin: 0 auto;
			}
			#table th{
				border:1px solid #000;
				padding: 3px;
				font-weight: bold;
				text-align: center;
			}
			#table td{
				border:1px solid #000;
				padding: 3px;
				vertical-align: top;
			}
			
			td.barcode > img {
				border: 0;
				width: 187px;
				height: 62px;
				margin: 15;
			}
			img {
				border: 0;
				width: 150px;
				height: 150px;
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
				margin-bottom: 10px;
				margin-top: 10px;
			}
			h3{
				font-size: 12px;
			}
			p {
				font-size: 12px;
			}
			hr {
			    margin-top: 20px;
			     margin-bottom: 0px; 
			    border: 0;
			    border-top: 1px solid #eee;
			   }
			.atas{
				display: block;
				margin:0px;
				padding:0px;
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
			@media print {
				#print{
					display: none;	
				}
				body{
					font-size: 11px;	
				}
			}
			.label {
			    line-height: 3;
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
    </head> 
    <body>
    	<div class="container">
	    	<?php
				$kop 		 = '<center><h2>'.namayayasan().'</h2></center>';
				$kop 		.= '<center><h2>'.sekolah().'</h2></center>';
				$kop 		.= '<center><h2>'.instansi().'</h2></center><br/>';
				$kop 		.= '<center><p>'.akreditasi().'</p></center>';
				$kop 		.= '<center><p>'.alamat().'</p></center>';

				$logo 		 = "<img src=".base_url('asset/image/smk.png')." >";
				function myheader($kop,$logo){
				?>

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
				