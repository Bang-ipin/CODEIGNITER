<?php
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=Cetak-Laporan-Penjualan-Barang-Toko-Mundu.xls");
    ?>
<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=config_item('asset')?>/easyui/themes/default/easyui.css"  type="text/css">
<link rel="stylesheet" href="<?=config_item('asset')?>/easyui/themes/icon.css"  type="text/css">
<style>
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:1px solid #000;
      padding: 3px;
      vertical-align: top;
  }
  </style>
</head>
<body>
	<div id="title">
		<br>
		<?php if(isset($dari)){
					echo "<div> Data Penjualan Toko Mundu dari tanggal ".$dari." sampai dengan tanggal ".$sampai." :</div></br>";
				}else{
					echo "<div> Data Seluruh Transaksi Penjualan Toko Mundu : </div>";
				}
		?>
		<br>
		</div>
	<table id="table" class="table-bordered table-striped">
		<tr>
			<th width="5%">No</th>
			<th width="12%">Transaksi</th>
			<th width="11%">Tanggal</th>
			<th width="10%">Penerima</th>
			<th width="18%">Pelanggan</th>
			<th width="15%">Barang</th>
			<th width="5%">Qty</th>
			<th width="12%">Hrg Jual</th>
			<th width="12%">Total</th>
		</tr>
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
				<td align="center"><?php echo $rows->nama_pelanggan;?></td>
				<td align="center"><?php echo $rows->nama_barang;?></td>
				<td align="center"><?php echo $rows->jumlah;?></td>
				<td align="right">Rp. <?php echo number_format($rows->harga_jual,2,',','.');?></td>
				<td align="right">Rp. <?php echo number_format($rows->total,2,',','.');?></td>
			</tr>
			<?php
			}
			echo "<tr>
					<td colspan='8' style='text-align: center; background: #49afcd'><strong>Total Barang Masuk</strong></td>
					<td style='text-align: center; background: #49fd4f'>Rp ".number_format($rows->total_all,2,',','.')."</td>
					</tr>";
			}
			else
			{
			?>
			<tr>
				<td colspan="9" style="text-align: center; background: #49afcd"><strong>Tidak ada data</strong></td>
			</tr>
		<?php
		}
		?>
	</table>
	
<script type="text/javascript" src="<?=config_item('asset');?>/easyui/jquery.easyui.min.js"></script>
<body>
</html>