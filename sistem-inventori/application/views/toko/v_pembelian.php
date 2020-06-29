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
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Dashboard
						<small>Sistem Informasi inventori dan Penjualan</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box"> 
							<div class="box-header bg-aqua">
								<a class="btn btn-default" href="<?=base_url();?>toko_ringroad/pembelian/add">
								<img src="<?=base_url();?>asset/image/add.png" width="20"></img>Input Data
								</a>
							</div>
							<div class="box-body">
							<div><?php echo $this->session->flashdata('message')?></div>
							<div><?php echo $this->session->flashdata('pesan')?></div>
								<div class="table-responsive" style="padding:5px;">
									<table id="table" class="table-striped table-bordered" width="100%">
										<thead>
											<tr>
											<th>No</th>
											<th>Kode Transaksi</th>
											<th>Tanggal</th>
											<th>Supplier</th>
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
													<td><?php echo ++$no ?></td>
													<td><?php echo $rows->kode_transaksi;?></td>
													<td><?php echo date("d F Y",strtotime($rows->tanggal_transaksi));?></td>
													<td><?php echo $rows->nama_supplier;?></td>
													<td><?php echo $rows->penerima;?></td>
													<td>Rp <?php echo number_format($rows->total_harga,2,',','.') ?></td>
													<td>
													<a href="<?php echo base_url()?>toko_ringroad/pembelian/view/<?php echo $rows->kode_transaksi?>" class="btn btn-default btn-xs" ><img src="<?php echo base_url();?>asset/easyui/themes/icons/search.png" width="17" height="17"></img></a>
													<a href="<?=base_url()?>toko_ringroad/pembelian/hapus/<?php echo $rows->kode_transaksi?>" class="btn btn-default btn-xs" onclick="return confirm('Anda Yakin menghapus data ini?')"><img src="<?php echo base_url();?>asset/easyui/themes/icons/no.png" width="17" height="17"></img></a>
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
		