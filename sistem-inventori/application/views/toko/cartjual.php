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
<div class="alert alert-success">Data Barang Keluar</div>
	<form action="<?php echo base_url('toko_ringroad/penjualan/cart');?>" method="POST">	
		<div class="table-responsive"style="padding:5px;">
			<table id="table" class="table-striped table-bordered" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Jumlah</th>
						<th style="text-align:right">Harga Jual</th>
						<th style="text-align:right">Sub Total</th>
						<th style="text-align:right">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; $no=1; ?>
						<?php foreach ($this->cart->contents() as $items): ?>
						<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
					<tr>
						<td align="center"><?php echo $no++;?></td>
						<td align="center"><?php echo $items['id'];?></td>
						<td align="center"><?php echo $items['name'];?></td>
						<td align="center"><?php echo $items['qty'];?></td>
						<td style="text-align:center">Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
						<td style="text-align:center">Rp.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
						<td align="center">
							<button type="button" class="btn btn-default btn-sm" id="id" onclick="hapusitem('<?=$items['rowid'];?>')">
								<img src="<?php echo base_url();?>asset/easyui/themes/icons/no.png"></img>
							</button>
						</td>
					</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					<tr>
						<td colspan="4"> </td>
						<td ><strong>Total</strong></td>
						<td style="text-align:center;background:#c1c1c1;">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<a id="Hapus" href="javascript:void(0)"><button type="button" class="btn btn-default">Hapus Semua</button></a>
	</form>
	<input type="hidden" class="form-control" name="total" id="total" value="<?php echo $this->cart->total(); ?>">
	<script>
$(function () {
        $("#Hapus").click(function(){ 
		if(confirm("Apakah anda ingin menghapus data penjualan ini?")){
          $.ajax({
            type: 'get',
            url: '<?= base_url('toko_ringroad/penjualan/delete_cart');?>',
            data: $('form').serialize(),
			error: function (xhr, ajaxOptions, thrownError) {
				return false;		  	
			},
			beforeSend: function() {
    		$('#responsecontainer').html("<img src='<?= base_url();?>/asset/image/ajax-loader.gif' />");
 			 },
            success: function () {
			 	getcart();
            }
          });
          e.preventDefault();
		  }
        });
		
      });
	  function hapusitem(id) {
		if(confirm("Apakah anda ingin menghapus data pembelian ini?")){
          $.ajax({
            type: 'POST',
            url: '<?= base_url('toko_ringroad/penjualan/deleteitemcart');?>',
            data: 'id='+id,
			error: function (xhr, ajaxOptions, thrownError) {
				return false;		  	
			},
			beforeSend: function() {
    		$('#responsecontainer').html("<img src='<?= base_url();?>/asset/image/ajax-loader.gif' />");
 			 },
            success: function () {
			 	getcart();
            }
          });
        }
	};
</script>										
	