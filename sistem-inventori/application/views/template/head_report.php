<!DOCTYPE html5>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="<?=config_item('asset');?>/image/favicon.png">
		<link rel="stylesheet" href="<?=config_item('asset');?>/bootstrap/css/bootstrap.css" type="text/css" />
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
			img {
				border: 0;
				width: 50px;
				height: 50px;
			}
			@media print {
				#print{
					display: none;	
				}
				body{
					font-size: 11px;	
				}
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
			setTimeout(function()
			{
				window.print();
			},2000)
				document.getElementById("tutup").focus();
			};
		</script>
    </head> 
    <body>