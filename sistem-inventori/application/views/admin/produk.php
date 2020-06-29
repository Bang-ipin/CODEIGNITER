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
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Dashboard
						<small>Sistem Informasi Inventori dan Penjualan</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header bg-aqua">
								<a href="<?=base_url('admin/produk/tambah_produk')?>" class="btn btn-default">
								<img src="<?=config_item('asset')?>/image/add.png"></img> Tambah Data</a>
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message')?></div>
								<div><?php echo $this->session->flashdata('pesan')?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Barang</th>
												<th>Nama</th>
												<th>Kategori</th>
												<th>Jenis</th>
												<th>Harga Beli</th>
												<th>Harga Jual</th>
												<th>Stok</th>
												<th>Satuan</th>
												<th>Gambar</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=0;
											foreach($query as $rows){
											?>
												<tr>
													<td><?php echo ++$no;?></td>
													<td><?php echo $rows->kode_barang;?></td>
													<td><?php echo $rows->nama_barang;?></td>
													<td><?php echo $rows->kategori;?></td>
													<td><?php echo $rows->jenis_barang;?></td>
													<td><?php echo "Rp.".$rows->harga_beli;?></td>
													<td><?php echo "Rp.".$rows->harga_jual;?></td>
													<td align="center"><?php echo $rows->stock_awal;?></td>
													<td align="center"><?php echo $rows->nama_satuan;?></td>
													<td align="center">
														<a href="<?php echo base_url().'asset/uploads/'.$rows->gambar;?>" class="fancy" >
														<img src="<?php echo base_url().'asset/uploads/'.$rows->gambar;?>" alt="" border="0" width="18" height="20">
													</td>
													<td>
														<a href="<?php echo base_url()?>admin/produk/edit/<?php echo $rows->kode_barang?>" class="btn-link btn-xs"><img src="<?php echo base_url();?>asset/easyui/themes/icons/pencil.png"></img></a>
														<a href="<?php echo base_url()?>admin/produk/delete/<?php echo $rows->kode_barang?>" class="btn-link btn-xs" onclick="return confirm('Anda Yakin menghapus data ini?')"><img src="<?php echo base_url();?>asset/easyui/themes/icons/no.png"></img></a>
													</td>
												</tr>
											<?php }	?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
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

 
