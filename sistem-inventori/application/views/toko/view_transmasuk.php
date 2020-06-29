		
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
								<div class="box-body">
									<div><?php echo $this->session->flashdata('pesan');?></div>
									<form action="<?=base_url('toko_ringroad/pembelian/checkout')?>" method="post" onsubmit="return validasi(this)">
										<div class="form-horizontal">
											<div class="form-group">
												<div class="col-xs-3">
													<label for="faktur">Faktur</label>
												</div>
												<div class="col-xs-5">
													<input class="form-control uneditable-input" type="text" name="faktur"  value="<?php echo $kode;?>" readonly="true">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="tanggal">Tanggal</label>
												</div>
												<div class="col-xs-6">
													<input class="form-control" name="tanggal"  id="tanggal" data-options="validType:'length[3,10]'"readonly="true" value="<?php echo $tanggal;?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-3">
													<label for="supplier">Distributor</label>
												</div>
												<div class="col-xs-6">
													<input type="text" class="form-control" name="distributor" value="<?=$supplier;?>" readonly="true">
												</div>
											</div>
											<hr>
											<div class="table-responsive" style="padding:5px;">
												<table class="table-bordered table-striped" width="100%" id="responsecontainer">
													<thead>
														<tr>
															<th>No</th>
															<th>Kode Barang</th>
															<th>Nama Barang</th>
															<th>Jumlah</th>
															<th style="text-align:right">Harga Beli</th>
															<th style="text-align:right">Sub Total</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no=1;
														foreach ($cart->result() as $items){ ?>
														<tr>
															<td align="center"><?php echo $no++;?></td>
															<td align="center"><?php echo $items->kode_transaksi;?></td>
															<td align="center"><?php echo $items->nama_barang;?></td>
															<td align="center"><?php echo $items->jumlah;?></td>
															<td style="text-align:center">Rp.<?php echo $this->cart->format_number($items->harga_beli); ?></td>
															<td style="text-align:center">Rp.<?php echo $this->cart->format_number($items->total); ?></td>
														</tr>
														<?php } ?>
														<tr>
															<td colspan="4"> </td>
															<td ><strong>Total</strong></td>
															<td style="text-align:center;background:#c1c1c1;">Rp.<?php echo number_format($items->total_all,2,',','.'); ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div>
												<a href="<?=base_url('toko_ringroad/pembelian')?>" class="btn btn-danger">Kembali</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		