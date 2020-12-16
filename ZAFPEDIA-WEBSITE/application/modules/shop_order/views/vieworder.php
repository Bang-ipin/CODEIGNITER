	<div class="row">
		<div class="col-md-12">
			<!-- Begin: life time stats -->
			<div class="portlet light portlet-fit portlet-datatable bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-settings font-dark"></i>
						<span class="caption-subject font-dark sbold uppercase"> Order <strong>#<?=$order['invoice'];?></strong>
							<span class="hidden-xs">| 	<?php date_default_timezone_set('Asia/Jakarta');
						echo date('d F Y, H:i',strtotime($order['tgl_pesan']));?>
						WIB  </span>
						</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="tabbable-line">
						<ul class="nav nav-tabs nav-tabs-lg">
							<li class="active">
								<a href="#tab_1" data-toggle="tab"> Details </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="portlet yellow-crusta box">
											<div class="portlet-title">
												<div class="caption">
													<i class="fa fa-cogs"></i>Order Details 
												</div>
											</div>
											<div class="portlet-body">
												<div class="row static-info">
													<div class="col-md-5 name"> Order #: </div>
													<div class="col-md-7 value"> <?=$order['invoice'];?>
														<span class="label label-info label-sm"> Email confirmation was sent </span>
													</div>
												</div>
												<div class="row static-info">
													<div class="col-md-5 name"> Order Date & Time: </div>
													<div class="col-md-7 value"> <?php date_default_timezone_set('Asia/Jakarta');
														echo date('d F Y, H:i',strtotime($order['tgl_pesan']));?> &nbsp;WIB</div>
												</div>
												<div class="row static-info">
													<div class="col-md-5 name"> Order Status: </div>
													<div class="col-md-7 value">
														<?php 
														if($order['status_pesanan']==0){
															$paid = "<span class='label label-warning'>Belum Bayar</span>";
														}else if($order['status_pesanan']==1){
															$paid = "<span class='label label-success'>Sudah Bayar</span>";
														}
														else if($order['status_pesanan']==2){
															$paid = "<span class='label label-danger'>Dibatalkan</span>";
														}
														?>
														<?=$paid;?>
													</div>
												</div>
												<div class="row static-info">
													<div class="col-md-5 name"> Grand Total: </div>
													<div class="col-md-7 value"> <?=convertrp($order['total_harga']);?> </div>
												</div>
												<div class="row static-info">
													<div class="col-md-5 name"> Payment Information: </div>
													<div class="col-md-7 value"> 
														<span class="label label-danger"><?=$order['metode_pembayaran'];?>&nbsp;<?=strtoupper($order['bank_tujuan']);?> </span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="portlet blue-hoki box">
											<div class="portlet-title">
												<div class="caption">
													<i class="fa fa-cogs"></i>Customer Information 
												</div>
											</div>
											<div class="portlet-body">
												<div class="row static-info">
													<div class="col-md-5 name"> Customer Name: </div>
													<div class="col-md-7 value"> <?=$order['nama_lengkap'];?> </div>
												</div>
												<div class="row static-info">
													<div class="col-md-5 name">Jenis Kelamin: </div>
													<div class="col-md-7 value"> 
													<?php 
														if($order['jenis_kelamin']==1){
															$jk = "<span class='label label-success'>Laki-Laki</span>";
														}else {
															$jk = "<span class='label label-info'>Wanita</span>";
														}
														?>
													<?=$jk;?></div>
												</div>
												<div class="row static-info">
													<div class="col-md-5 name"> Email: </div>
													<div class="col-md-7 value"> <?=$order['email'];?> </div>
												</div>
												<div class="row static-info">
													<div class="col-md-5 name"> State: </div>
													<div class="col-md-7 value"> <?=$provinsi;?> </div>
												</div>
												<div class="row static-info">
													<div class="col-md-5 name"> Phone Number: </div>
													<div class="col-md-7 value"> <?=$order['telepon'];?> </div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="portlet green-meadow box">
											<div class="portlet-title">
												<div class="caption">
													<i class="fa fa-cogs"></i>Shipping Method
												</div>
											</div>
											<div class="portlet-body">
												<div class="row static-info">
													<div class="col-md-12 value"> 
														<br> <?=strtoupper($order['ekspedisi']);?>
														<br> <?=strtoupper($order['layanan_pengiriman']);?>
														<br> <?=$order['estimasi_waktu'];?> &nbsp;(Hari)
														<br> Ongkir : <?=convertrp($order['ongkir']);?>
														<br> <?=$order['catatan'];?>
														<br> 
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="portlet red-sunglo box">
											<div class="portlet-title">
												<div class="caption">
													<i class="fa fa-cogs"></i>Shipping Address
												</div>
											</div>
											<div class="portlet-body">
												<div class="row static-info">
													<div class="col-md-12 value"> <?=$order['nama_lengkap'];?>
														<br> <?=$order['alamat'];?>
														<br> <?=$city;?>
														<br> <?=$provinsi;?>
														<br> <?=$order['negara'];?>
														<br> <?=$order['kode_pos'];?>
														<br> <?=$order['telepon'];?>
														<br> </div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="portlet grey-cascade box">
											<div class="portlet-title">
												<div class="caption">
													<i class="fa fa-cogs"></i>Shopping Cart 
												</div>
											</div>
											<div class="portlet-body">
												<div class="table-responsive">
													<table class="table table-hover table-bordered table-striped">
														<thead>
															<tr>
																<th> No </th>
																<th> Produk </th>
																<th> Kategori </th>
																<th> Harga </th>
																<th> Qty </th>
																<th> Total </th>
															</tr>
														</thead>
														<tbody>
															<?php 
															$no=1;
															foreach($vieworder as $items): 
															$totalitem= $items['jumlah'] *$items['harga'];
															?>
															<tr>
																<td>
																	<?=$no++;?> </a>
																</td>
																<td>
																	<a href="javascript:;"> <?=$items['produk'];?> </a>
																</td>
																<td>
																	<a href="javascript:;"> <?=$items['kategori'];?> </a>
																</td>
																<td> <?=convertrp($items['harga']);?> </td>
																<td> <?=$items['jumlah'];?> </td>
																<td> <?=convertrp($totalitem);?> </td>
															</tr>
															<?php endforeach;?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6"> </div>
									<div class="col-md-6">
										<div class="well">
											<div class="row static-info align-reverse">
												<div class="col-md-6 name"> Sub Total: </div>
												<div class="col-md-6 value"> <?=convertrp($order['subtotal']);?> </div>
											</div>
											<div class="row static-info align-reverse">
												<div class="col-md-6 name"> Shipping: </div>
												<div class="col-md-6 value"> <?=convertrp($order['ongkir']);?> </div>
											</div>
											<div class="row static-info align-reverse">
												<div class="col-md-6 name"> Grand Total: </div>
												<div class="col-md-6 value"><?=convertrp($order['total_harga']);?> </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End: life time stats -->
		</div>
	</div>
