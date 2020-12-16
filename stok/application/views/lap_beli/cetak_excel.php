<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap_pembelian_barang.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<center><h1><?php echo $judul;?></h1></center>
</div>
<table class="grid" width="100%">
	<tr>
    	<th width="20">No</th>
        <th width="100">Kode Beli</th>
        <th width="200">Tanggal</th>
        <th width="150">Kode Barang</th>
        <th width="400">Nama Barang</th>
        <th width="120">Satuan</th>
        <th width="50">Jumlah</th>
    </tr>        
<?php
	$no=1;
	$page =1;
	foreach($data->result_array() as $r){
	$tgl = $this->app_model->tgl_indo($r['tglbeli']);
	?>
    <tr>
    	<td align="center"><?php echo $no;?></td>
        <td align="center"><?php echo $r['kodebeli'];?></td>
    	<td align="center"><?php echo $tgl;?></td>        
        <td align="center"><?php echo $r['kode_barang'];?></td>
        <td ><?php echo $r['nama_barang'];?></td>
        <td align="center"><?php echo $r['satuan'];?></td>
        <td align="center"><?php echo $r['jmlbeli']/1000;?></td>
    </tr>
    <?php
	$no++;
	}
?>
</table>