	<div class="table-responsive" style="padding:5px;">
		<table class="table-bordered table-striped" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th style="text-align:right">Harga Beli</th>
					<th style="text-align:right">Sub Total</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			$no=1;
			foreach ($cart->result() as $items){ 
			form_hidden($i.'[rowid]', $items['rowid']);
			?>
				<tr>
					<td align="center"><?php echo $no++;?></td>
					<td align="center"><?php echo $items->kode_transaksi;?></td>
					<td align="center"><?php echo $items->nama_barang;?></td>
					<td align="center"><?php echo $items->jumlah;?></td>
					<td style="text-align:center">Rp.<?php echo $this->cart->format_number($items->harga_beli); ?></td>
					<td style="text-align:center">Rp.<?php echo $this->cart->format_number($items->total); ?></td>
					<td align="center">
						<button type="button" class="btn btn-default btn-sm" id="id" onclick="hapusitem('<?=$items->kode_transaksi;?>')">
						<img src="<?php echo base_url();?>asset/easyui/themes/icons/no.png"></img>
						</button>
					</td>
				</tr>
				<?php $i++;
				} ?>
				<tr>
					<td colspan="4"> </td>
					<td ><strong>Total</strong></td>
					<td style="text-align:center;background:#c1c1c1;">Rp.<?php echo number_format($items->total_all,2,',','.'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>