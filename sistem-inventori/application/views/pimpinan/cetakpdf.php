<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
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
	<img src="<?php base_url();?>asset/image/logo.jpg" width="849" height="120"></div>
	<div id="title">
		<br>
		LAPORAN STOK BARANG
	</div>
	<div id="isi">
		<table id="dataTable" width="100%">
			<tr class="tr-title">
				<th>No</th>
				<th width="20%">Kode Barang</th>
				<th width="20%">Nama Barang</th>
				<th width="12%">Jenis</th>
				<th width="12%">Harga Beli</th>
				<th width="12%">Harga Jual</th>
				<th width="12%">Stok Akhir</th>
				<th width="8%">Satuan</th>
			</tr>
			<?php
			$no =1;
			foreach($query as $db){  
			?>    
			<tr>
				<td ><?php echo $no++; ?></td>
				<td ><?php echo $db->kode_barang; ?></td>
				<td ><?php echo $db->nama_barang; ?></td>
				<td align="center"><?php echo $db->jenis_barang; ?></td>
				<td align="center">Rp. <?php echo number_format($db->harga_beli,2,',','.'); ?></td>
				<td align="center">Rp. <?php echo number_format($db->harga_jual,2,',','.'); ?></td>
				<td align="center"><?php echo $db->stock_awal; ?></td>
				<td ><?php echo $db->nama_satuan; ?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
</body>
</html>