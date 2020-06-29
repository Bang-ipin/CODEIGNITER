<style type="text/css">
	.stripe1 {
	background-color:#FBEC88;
}
	.stripe2 {
	background-color:#FFF;
	}
	.highlight {
	-moz-box-shadow: 1px 1px 2px #fff inset;
	-webkit-box-shadow: 1px 1px 2px #fff inset;
	box-shadow: 1px 1px 2px #fff inset;		  
	border:             #aaa solid 1px;
	background-color: #fece2f;
	}
</style>
<div class="tabel-responsive" style="padding:2px;">
	<table id="table" class="table-bordered table-striped" width="100%">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Jenis</th>
				<th>Harga Beli</th>
				<th>Harga Jual</th>
				<th>Stok Akhir</th>
				<th>Satuan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no =1;
			foreach($query as $db){  
			?>    
			<tr>
				<td align="center" width="20"><?php echo $no++; ?></td>
				<td align="center" width="100" ><?php echo $db->kode_barang; ?></td>
				<td align="center" width="100" ><?php echo $db->nama_barang; ?></td>
				<td align="center" width="80" ><?php echo $db->jenis_barang; ?></td>
				<td align="right" width="100" >Rp. <?php echo number_format($db->harga_beli,2,',','.'); ?></td>
				<td align="right" width="100" >Rp. <?php echo number_format($db->harga_jual,2,',','.'); ?></td>
				<td align="center" width="80" ><?php echo $db->stock_awal; ?></td>
				<td align="center" width="100" ><?php echo $db->nama_satuan; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(function() {
		$("#table tr:even").addClass("stripe1");
		$("#table tr:odd").addClass("stripe2");
		$("#table tr").hover(
		function() {
			$(this).toggleClass("highlight");
			},
		function() {
			$(this).toggleClass("highlight");
			}
		);
	});
	</script>
