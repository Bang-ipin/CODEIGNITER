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
								<a class="btn btn-default" href="<?=base_url();?>toko_ringroad/penjualan/add">
								<img src="<?php echo base_url();?>asset/image/add.png" width="20"></img>Input Data
								</a>
							</div>
							<div class="box-body">
								<div><?php echo $this->session->flashdata('message')?></div>
								<div><?php echo $this->session->flashdata('pesan')?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-bordered table-striped">
										<thead>
											<tr>
											<th>No</th>
											<th>Kode Transaksi</th>
											<th>Tanggal</th>
											<th>Pelanggan</th>
											<th>Penerima</th>
											<th>Total Harga</th>
											<th>Actions</th>
											</tr>
										</thead>
									<tbody>
									<?php
									$no=0;
										if(isset($query)){
											foreach($query as $rows){
											?>
												<tr>
													<td align="center"><?php echo ++$no ?></td>
													<td align="center"><?php echo $rows->kode_transaksi;?></td>
													<td align="center"><?php echo date("d F Y",strtotime($rows->tanggal_transaksi));?></td>
													<td align="center"><?php echo $rows->nama_pelanggan;?></td>
													<td align="center"><?php echo $rows->penerima;?></td>
													<td align="left">Rp <?php echo number_format($rows->total_harga,2,',','.');?></td>
													<td align="center">
													<a href="<?php echo base_url()?>toko_ringroad/penjualan/view/<?php echo $rows->kode_transaksi?>" class="btn btn-default btn-xs" ><img src="<?php echo base_url();?>asset/easyui/themes/icons/search.png" width="17" height="17"></img></a>
													<a href="<?=base_url()?>toko_ringroad/penjualan/hapus/<?php echo $rows->kode_transaksi?>" class="btn btn-default btn-xs" onclick="return confirm('Anda Yakin menghapus data ini?')"><img src="<?php echo base_url();?>asset/easyui/themes/icons/no.png" width="17" height="17"></img></a>
													</td>
												</tr>
												<?php
												}										
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		