			<section id="checkout-page">
                <div class="container-fluid">
                    <div class="col-xs-12 no-margin">
					<?php if (!empty($this->cart->contents())){ ?>
					<div class="billing-address" id="form_wizard_1">
						<!--div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Guest Checkout - <span class="step-title">
								Step 1 of 4 </span>
							</div>
						</div-->
						<div class="portlet-body form">
							<?=form_open('checkout/simpan_guest',array('class'=>"form-horizontal form-bordered form-row-stripped",'id'=>"guestform"));?>
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Profile Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Billing Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Shipping Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Confirm </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success"></div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												Anda memiliki beberapa kesalahan. Silakan cek di bawah ini.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Validasi formulir Anda berhasil!
											</div>
											<div class="tab-pane active" id="tab1">
												 <h2 class="block h1">billing address</h2>
												<div class="form-group">
													<label class="control-label col-md-3">Nama Lengkap <span class="required">* </span></label>
													<div class="col-md-9">
														<input type="text" class="le-input" value="<?=set_value('nama_lengkap');?>" id="fullname" name="fullname"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Email <span class="required">* </span></label>
													<div class="col-md-9">
														<input type="text" class="le-input" value="<?=set_value('email');?>" id="email" name="email"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Nomor HP <span class="required">* </span></label>
													<div class="col-md-9">
														<input type="text" class="le-input" id="telepon" maxlength="13" value="<?=set_value('telepon');?>" name="telepon"/>
														<span class="help-block">
														Berikan nomor HP yang bisa dihubungi </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Jenis Kelamin <span class="required">* </span></label>
													<div class="col-md-9">
														<div class="radio-list">
															<label>
															<input type="radio" name="gender" value="1" data-title="Pria"/>
															Pria </label>
															<label>
															<input type="radio" name="gender" value="0" data-title="Wanita"/>
															Wanita </label>
														</div>
														<div id="form_gender_error">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Negara <span class="required">* </span></label>
													<div class="col-md-9">
														<input type="text" class="le-input" value="<?=set_value('negara');?>" id="country" name="country"/>
														<span class="help-block">Negara anda </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Provinsi <span class="required">* </span></label>
													<div class="col-md-9"><?php 
														$attribute='class="le-input" id="destinasi"';
														$selected= $this->input->post('destinasi')?$this->input->post('destinasi'):'';
														echo form_dropdown('destinasi',$dd_provinsitujuan,$selected,$attribute);
													?>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Kota/Kab<span class="required">* </span></label>
													<div class="col-md-9">
													<?php 
														$attribute='class="le-input" id="kabupaten"';
														$selected= $this->input->post('kabupaten')?$this->input->post('kabupaten'):'';
														echo form_dropdown('kabupaten',$dd_kabupaten,$selected,$attribute);
														?>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Alamat <span class="required">* </span></label>
													<div class="col-md-9">
														<input type="text" class="le-input" value="<?=set_value('alamat');?>" id="address" name="address"/>
														<span class="help-block">Berikan alamat jalan anda </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Kode Pos  <span class="required">* </span></label>
													<div class="col-md-9">
														<input type="text" class="le-input" maxlength="6" value="<?=set_value('kode_pos');?>" name="zip_code" id="zip_code"/>
														<span class="help-block"> Kode Pos </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Catatan Tambahan</label>
													<div class="col-md-9">
														<textarea class="le-input" rows="6" name="remarks"><?=set_value('catatan');?></textarea>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Berikan rincian tagihan dan kartu kredit Anda</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Opsi Pembayaran <span class="required">* </span></label>
													<div class="col-md-9">
														<div class="form-vertical">
															<?php
															$no=1;
															foreach($payment as $post){
																if($post['status']==1){
																	echo "<label><input type='radio' name='payment' value='".$post['judul']."' data-title='".$post['judul']."'/>
																				<span class='label label-danger'>".$post['judul']."</span></label>&nbsp;&nbsp;";
																$no++;
																}else{
																	return FALSE;
																}
															}
															?>
														</div>
														<div id="form_payment_error"></div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Rekening Tujuan <span class="required">* </span></label>
													<div class="col-md-9">
														<div class="form-vertical">
															<?php
															$no=1;
															foreach($bank as $post){
																if($post['status']==1){
																	echo "<label><input type='radio' name='tujuan' value='".$post['judul']."' data-title='".$post['judul']."'/>
																				<span><img src='".base_url('files/media/'.$post['gambar'].'')."' style='margin:10px;width:100px;height:80px;'/></span><br/>
																				<span style='font-size:12px;margin-left:27px' class='label label-danger'>".$post['caption']."</span></label>&nbsp;&nbsp;";
																$no++;
																}else{
																	return FALSE;
																}
															}
															?>
														</div>
														<div id="form_tujuan_error">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Catatan Tambahan Pada Opsi Ini</label>
													<div class="col-md-9">
														<textarea class="le-input" rows="6" name="billingremarks"><?=set_value('billingremarks');?></textarea>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Pilih Kurir</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Kurir <span class="required">* </span></label>
													<div class="col-md-9">
														<input type="hidden" name="origin" class="le-input" id="origin" value="<?php echo $provinsi;?>" />
														<input type="hidden" id="berat" class="form-control" name="berat" value="1000" />
														<form class="form-vertical">
															<?php
															$no=1;
															foreach($shipping as $post){
																if($post['status']==1){ ?>
																	<label>
																		<input type="radio" name="kurir" value="<?=$post['nama'];?>" data-title="<?=$post['nama'];?>" />
																		<span><img src="<?=base_url('files/media/'.$post['gambar'].'');?>" style="margin-right:20px;width:200px;height:100px;"/></span><br/>
																	</label>&nbsp;&nbsp;
																<?php 
																$no++;
																}
																else{
																	return FALSE;
																}
															}
															?>
														</form>
														<div id="form_kurir_error">
														</div>
													</div>
												</div>
												<div class="form-group" style="display: block;">
													<label class="control-label col-md-3"></label>
													<div class="col-md-9">
														<div id="ongkos"></div>
														<?php 
															$weight=0;
															foreach ($this->cart->contents() as $items): 
															$weight += $items['qty'] * $items['berat'];
															endforeach;	
														?>
														<input type="hidden" class="form-control" name="weight" id="weight" value="<?=$weight;?>" />				
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Service </label>
													<div class="col-md-9">
														<input type="text" class="le-input" name="servis" id="servis" readonly />
													</div>
												</div>
												<div class="form-group " >
													<label class="control-label col-md-3"> Estimasi </label>
													<div class="col-md-9">
														<input type="text" class="le-input" name="etd" id="etd" readonly />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tarif </label>
													<div class="col-md-9">
														<input type="text" class="le-input" name="biaya" id="biaya" value="0" readonly />
													</div>
												</div>
												<div class="form-group display-hide ">
													<label class="control-label col-md-3"> Subtotal </label>
													<div class="col-md-9">
														<input type="text" class="le-input" name="subtotal" id="subtotal" value="<?=$this->cart->total();?>" />
													</div>
												</div>
												<div class="form-group display-hide">
													<label class="control-label col-md-3"> Ongkos Kirim </label>
													<div class="col-md-9">
														<input type="text" class="le-input" name="ongkir" id="ongkir" />
													</div>
												</div>
												<div class="form-group display-hide">
													<label class="control-label col-md-3"> Grand Total </label>
													<div class="col-md-9">
														<input type="text" class="le-input" name="grandtotal" id="grandtotal" />
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Konfirmasi Akun Anda</h3>
												<div class="invoice">
													<div class="row invoice-logo">
														<div class="col-md-offset-1 col-md-4 invoice-logo-space">
															<img src="<?=base_url('files/media/'.$logo.'');?>" class="img-responsive" alt="<?=$title;?>"/>
														</div>
														<div class="col-md-offset-1 col-md-6">
															<p>
																 <strong>#<?=$invoice;?></strong> / <?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y');?> <span class="muted">
																<?=$website;?> </span>
															</p>
														</div>
													</div>
													<hr/>
													<div class="row ">
														<div class="col-md-offset-1 col-md-4">
															<h4>Profil:</h4>
															<ul class="list-unstyled">
																<li>
																	<strong>Nama:</strong><br/><p class="form-control-static uppercase" data-display="fullname"></p>
																</li>
																<li>
																	<strong>Email:</strong><br/><p class="form-control-static uppercase" data-display="email"></p>
																</li>
																<li>
																	<strong>JK:</strong><br/><p class="form-control-static uppercase" data-display="gender"></p>
																</li>
																<li>
																	<strong>Nomor HP:</strong><br/><p class="form-control-static uppercase" data-display="telepon"></p>
																</li>
																<li>
																	<strong>Alamat:</strong><br/><p class="form-control-static uppercase" data-display="address"></p>
																</li>
																<li>
																	<strong>Kota:</strong><br/><p class="form-control-static uppercase" data-display="kabupaten"></p>
																</li>
																<li>
																	 <strong>Provinsi:</strong><br/><p class="form-control-static uppercase" data-display="destinasi"></p>
																</li>
																<li>
																	 <strong>Negara:</strong><br/><p class="form-control-static uppercase" data-display="country"></p>
																</li>
																<li>
																	 <strong>Catatan:</strong><br/><p class="form-control-static" data-display="remarks"></p>
																</li>
															</ul>
														</div>
														<div class="col-md-4 invoice-payment">
															<h4>Penagihan:</h4>
															<ul class="list-unstyled">
																<li>
																	<strong>Opsi Pembayaran:</strong><br/><p class="form-control-static uppercase" data-display="payment"></p>
																</li>
																<li>
																	<strong>Bank Tujuan:</strong><br/><p class="form-control-static uppercase" data-display="tujuan"></p>
																</li>
																<li>
																	<strong>Catatan Tambahan:</strong><br/><p class="form-control-static" data-display="billingremarks"></p>
																</li>
															</ul>
														</div>														
														<div class="col-md-3 invoice-payment">
															<h4>Pengiriman:</h4>
															<ul class="list-unstyled">
																<li>
																	<strong>Kurir:</strong><br/><p class="form-control-static uppercase" data-display="kurir"></p>
																</li>
																<li>
																	<strong>Jenis Layanan:</strong><br/><p class="form-control-static uppercase" data-display="servis"></p>
																</li>
																<li>
																	<strong>Estimasi Waktu:</strong><br/><p class="form-control-static uppercase" data-display="etd"></p>
																</li>
																<li>
																	<strong>Tarif:</strong><br/><p class="form-control-static uppercase" data-display="biaya"></p>
																</li>
															</ul>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<table class="table table-striped table-hover">
																<thead>
																	<tr>
																		<th>
																			 #
																		</th>
																		<th>
																			 Item
																		</th>
																		<th class="hidden-480">
																			 Description
																		</th>
																		<th class="hidden-480">
																			 Quantity
																		</th>
																		<th class="hidden-480">
																			 Unit Cost
																		</th>
																		<th>
																			 Total
																		</th>
																	</tr>
																</thead>
																<?php $no = 1; $i = 1; ?>
																<?php foreach ($this->cart->contents() as $items): ?>
																<tbody>
																	<tr>
																		<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
																		<td>
																			<?php echo $no++; ?>
																		</td>
																		<td>
																			<h4><?php echo $items['name'];?></h4>
																			
																		</td>
																		<td class="hidden-480">
																			 <label class="control-label"><?=$items['kategori'];?></label>
																		</td>
																		<td class="hidden-480">
																			 <label class="control-label"><?php echo $items['qty'];?></label>
																		</td>
																		<td class="hidden-480">
																			<strong><?php echo convertrp($items['price']); ?></strong>
																		</td>
																		<td>
																			<strong><?php echo convertrp($items['subtotal']); ?></strong>
																		</td>
																	</tr>
																	<?php $i++; ?>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="well">
																<address>
																	<strong><p class="form-control-static" data-display="address"></p></strong><br/>
																	<p class="form-control-static" data-display="kabupaten"></p><br/>
																	<p class="form-control-static" data-display="destinasi"></p><br/>
																	<p class="form-control-static" data-display="country"></p><br/>
																	<abbr title="Phone">HP:</abbr> <p class="form-control-static" data-display="telepon"></p>
																</address>
																<address>
																	<strong><p class="form-control-static" data-display="fullname"></p></strong><br/>
																</address>
															</div>
														</div>
														<div class="col-md-6 invoice-block">
															<ul class="list-unstyled amounts">
																<li>
																	<strong>Sub - Total: </strong> Rp <p class="form-control-static" data-display="subtotal"></p><br/>
																</li>
																<li>
																	<strong>Ongkos Kirim: </strong> Rp <p class="form-control-static" data-display="ongkir"></p></br/>
																</li>
																<li>
																	<strong>Grand Total: </strong> Rp <p class="form-control-static" data-display="grandtotal"></p><br/>
																</li>
															</ul>
															<br/>
															<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
															Print <i class="fa fa-print"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="le-button default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
												<a href="javascript:;" class="le-button button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<button type="submit" class="le-button button-submit">
												Submit Your Invoice <i class="m-icon-swapright m-icon-white"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							<?=form_close();?>
						</div>
					</div>
					<?php }else{?>
					<div class="shopping-cart-page">
						<div class="shopping-cart-data clearfix">
							<h2><p>Your shopping cart is empty!</p></h2>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
