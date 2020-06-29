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
		<h4>LAPORAN STOK BARANG TOKO RING ROAD</h4>
	</div>
	<div id="isi">
		<table id="table" class="table-bordered table-striped" width="100%">
			<tr class="tr-title">
				<th width="5%">No</th>
				<th width="15%">Kode Barang</th>
				<th width="18%">Nama Barang</th>
				<th width="12%">Jenis</th>
				<th width="20%">Harga Beli</th>
				<th width="20%">Harga Jual</th>
				<th width="8%">Stok Akhir</th>
				<th width="10%">Satuan</th>
			</tr>
			<?php
			$no =1;
			foreach($query as $db){  
			?>    
			<tr>
				<td align="center"><?php echo $no++; ?></td>
				<td align="center" ><?php echo $db->kode_barang; ?></td>
				<td align="center"><?php echo $db->nama_barang; ?></td>
				<td align="center"><?php echo $db->jenis_barang; ?></td>
				<td align="right">Rp. <?php echo number_format($db->harga_beli,2,',','.'); ?></td>
				<td align="right">Rp. <?php echo number_format($db->harga_jual,2,',','.'); ?></td>
				<td align="center"><?php echo $db->stok; ?></td>
				<td align="center"><?php echo $db->nama_satuan; ?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
</body>
</html>