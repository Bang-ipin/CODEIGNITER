<?php 
	$baca=$detail['dibaca']; 
	$sql=$this->db->query("UPDATE produk SET dibaca=$baca+1 WHERE produk_seo='$detail[produk_seo]'");
?>

            <div id="single-product">
                <div class="container">

                    <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <div id="owl-single-product" class="owl-carousel">
                                <div class="single-product-gallery-item" id="slide1">
                                    <a data-rel="prettyphoto" href="<?=base_url('files/media/'.$detail['gambar'].'')?>">
                                        <img class="img-responsive" alt="<?=$detail['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/medium/'.$detail['gambar'].'')?>" />
                                    </a>
                                </div><!-- /.single-product-gallery-item -->

                            </div><!-- /.single-product-slider -->

                        </div><!-- /.single-product-gallery -->
                    </div><!-- /.gallery-holder -->
                    <div class="no-margin col-xs-12 col-sm-7 body-holder">
                        <div class="body">
						<?=form_open('cart/additemcart',array('role'=>"form",'id'=>"itemcart"));?>
							<div class="star-holder inline">
							<?php
								$votes=$this->Site_model->nilai_votes($detail['id']);
								?>
								<div class="rateit" data-rateit-value="<?=$votes;?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
							</div>
                            <div class="availability"><label>Availability:</label><span class="available"> <?=$detail['qty']?></span></div>

                            <div class="title"><a href="#"><?=$detail['produk'];?></a></div>
                            <div class="brand"></div>

                            <div class="social-row">
                                <div id="sharePopup" class="share"></div>
							</div>

                            <div class="excerpt">
                                <p><?=$detail['deskripsi_singkat'];?></p>
                            </div>

                            <div class="prices">
							<?php if(!empty($detail['diskon'])== TRUE){
								$diskon = $detail['diskon'];
								$price_new=$detail['harga']- $diskon;
									echo "<div class='price-current'>".convertrp($price_new)."</div>";
									echo "<div class='price-prev'><em><strike>".convertrp($detail['harga'])."</strike></em></div>";
									echo '<input type="hidden" class="form-control" name="price" value="'.$price_new.'" id="price"  placeholder="price" readonly required></td>';
								}else{
									echo "<div class='price-current'>".convertrp($detail['harga'])."</div>";
									echo "<div class='price-prev'><em><strike></strike></em></div>";
									echo '<input type="hidden" class="form-control" name="price" value="'.$detail['harga'].'" id="price"  placeholder="price" readonly required></td>';
								}
							?>
							</div>

                            <div class="qnt-holder">
                                <div class="le-quantity">
									<a class="minus" href="#reduce"></a>
									<input id="qty" name="qty" type="text" value="1" readonly  />
									<a class="plus" href="#add"></a>
                                </div>
                            </div><!-- /.qnt-holder -->
							<input id="stok" name="stok" type="hidden" value="<?=$detail['qty'];?>" readonly class="form-control input-sm">
							<input type="hidden" class="form-control" name="id" id="id" value="<?=$detail['id'];?>" readonly required></td>
							<input type="hidden" name="kode_barang" id="kode_barang" value="<?=$detail['kode_barang'];?>" class="form-control" >
							<input type="hidden" class="form-control" name="image" id="image" value="<?=$detail['gambar'];?>" readonly required></td>
							<input type="hidden" name="berat" id="berat" value="<?=$detail['berat'];?>" class="form-control" >
							<input type="hidden" class="form-control" name="produk" id="produk" value="<?=$detail['produk'];?>" readonly required></td>
							<input type="hidden" class="form-control" name="produk_seo" id="produk_seo"  value="<?=$detail['produk_seo'];?>" readonly required></td>
							<input type="hidden" class="form-control" name="kategori" id="kategori"  value="<?=$detail['kategori'];?>" readonly required></td>
							
							<!--a id="addto-cart" href="cart.html" class="le-button huge">add to cart</a-->
							<button id="addto-cart" type="submit" name="submit" <?php if($detail['qty'] < 100 ){ echo 'class="le-button huge display-hide"';}else{ echo 'class="le-button huge"';}?> >
							<i class="fa fa-shopping-cart"></i><span class="title"> add to cart</span></button>
							<?=form_close();?>
                        </div><!-- /.body -->

                    </div><!-- /.body-holder -->
                </div><!-- /.container -->
            </div><!-- /.single-product -->

            <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
            <section id="single-product-tab">
                <div class="container">
                    <div class="tab-holder">

                        <ul class="nav nav-tabs simple" >
                            <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#additional-info" data-toggle="tab">Additional Information</a></li>
                            <li><a href="#reviews" data-toggle="tab">Reviews (<?=$jumlahkomentar;?>)</a></li>
                        </ul><!-- /.nav-tabs -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                <p><?=$detail['deskripsi'];?></p>
                                <div class="meta-row">
                                   <div class="inline">
                                        <label>kategori:</label>
                                        <span><a href="#"><?=$detail['kategori'];?></a></span>
                                       
                                    </div><!-- /.inline -->
                                </div><!-- /.meta-row -->
                            </div><!-- /.tab-pane #description -->

                            <div class="tab-pane" id="additional-info">
                                <ul class="tabled-data">
                                    <li>
                                        <label>weight</label>
                                        <div class="value"><?=$detail['berat'];?> Gram</div>
                                    </li>
                                    <li>
                                        <label>Views</label>
                                        <div class="value"><?=$detail['dibaca'];?> kali </div>
                                    </li>
                                    <!--li>
                                        <label>size</label>
                                        <div class="value">one size fits all</div>
                                    </li>
                                    <li>
                                        <label>color</label>
                                        <div class="value">white</div>
                                    </li>
                                    <li>
                                        <label>guarantee</label>
                                        <div class="value">5 years</div>
                                    </li-->
                                </ul><!-- /.tabled-data -->

                               <div class="meta-row">
                                   <div class="inline">
                                        <label>kategori:</label>
                                        <span><a href="#"><?=$detail['kategori'];?></a></span>
                                       
                                    </div><!-- /.inline -->
                                </div><!-- /.meta-row -->
                            </div><!-- /.tab-pane #additional-info -->


                            <div class="tab-pane" id="reviews">
                                <div class="comments">
                                    <?php foreach ($komentar as $data): ?>
									<div class="comment-item">
                                        <div class="row no-margin">
                                            <div class="media">                    
												<div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
													<div class="avatar">
														<?php
															$gravatar = 'http://www.gravatar.com/avatar/'. md5($data['email']).'?s=32';
															echo "<img src='". $gravatar ."' alt='' class='img-circle media-object'/>";
														?>
													</div><!-- /.avatar -->
												</div><!-- /.col -->

												<div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
													<div class="media-body">
														<div class="comment-body">
															<div class="meta-info">
																<div class="author inline">
																	<a href="#" class="bold"><?=$data['username'];?></a>
																</div>
																<div class="star-holder inline">
																	<div class="rateit" data-rateit-value="<?=$data['votes'];?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
																</div>
																<div class="date inline pull-right">
																	<?php date_default_timezone_set('Asia/Jakarta');
																	echo date('d F Y, H:i',strtotime($data['tanggal']));?>
																</div>
															</div><!-- /.meta-info -->
															<p class="comment-text">
																<?=$data['review'];?>
															</p><!-- /.comment-text -->
														</div><!-- /.comment-body -->
														<?php
														$sql="SELECT * FROM ulasan WHERE komentar_id='$data[id]' ORDER BY id ASC";
														$query=$this->db->query($sql);
														if($query->num_rows() > 0){ 
															foreach ($query->result_array() as $row){ ?>
															<div class="media">
																<div class="col-lg-1 col-xs-12 col-sm-2 m-t-10">
																	<div class="avatar">
																		<?php 
																		$iduser = $row['email'];
																		$gravatar = 'http://www.gravatar.com/avatar/' . md5($iduser).'?s=32';
																		echo "<img src='". $gravatar ."' alt='' class='img-circle media-object'/>";
																		?>
																	 </div><!-- /.avatar -->
																</div><!-- /.col -->
																<div class="col-xs-12 col-lg-11 col-sm-10 m-t-10">
																	<div class="media-body">
																		<div class="comment-body">
																			<div class="meta-info">
																				<div class="author inline">
																					<a href="#" class="bold"><?=$row['username'];?></a>
																				</div>
																				<div class="date inline pull-right">
																					<?php date_default_timezone_set('Asia/Jakarta');
																					echo date('d F Y, H:i',strtotime($row['tanggal']));?></em>
																				</div> 
																			</div>
																			<p class="comment-text">
																				<?=$row['review'];?>
																			</p>
																		</div>
																	</div>
																</div>
															</div>
															<?php } ?>
														<?php } ?>
													</div><!-- /.col -->
												</div><!-- /.col -->
											</div><!-- /.row -->
										</div><!-- /.row -->
                                    </div><!-- /.comment-item -->
									<?php endforeach; ?>
                                </div><!-- /.comments -->

                                <div class="add-review row">
                                    <div class="col-sm-8 col-xs-12">
                                        <div class="new-review-form">
                                            <h2>Add review</h2>
                                            <?=form_open('',array('class'=>"contact-form",'role'=>"form",'id'=>"formreviewproduk"));?>
											    <?php if (empty($this->session->userdata('customer_id'))){ ?>
												<div class="row field-row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <label>name*</label>
                                                        <input type="hidden" class="form-control" name="produkid" id="produkid" value="<?=$detail['id'];?>" readonly required></td>
														<input class="le-input" type="text" name="name" id="name" required>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <label>email*</label>
                                                        <input class="le-input" type="text" name="email" id="email" required >
                                                    </div>
                                                </div><!-- /.field-row -->

                                                <div class="field-row star-row">
                                                    <label>your rating</label>
                                                    <div class="star-holder">
                                                        <input type="range" value="0" name="votes" step="0.25" id="backing5">
														<div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
                                                    </div>
                                                </div><!-- /.field-row -->

                                                <div class="field-row">
                                                    <label>your review</label>
                                                    <textarea rows="8" class="le-input" name="review" id="review" data-error-container="#error-review" required></textarea>
													<div id="error-review"></div>
												</div><!-- /.field-row -->
												<?php } else { ?>
												<div class="field-row star-row">
                                                    <label>your rating</label>
                                                    <div class="star-holder">
                                                        <input type="range" value="0" name="votes" step="0.25" id="backing5">
														<div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
                                                    </div>
                                                </div><!-- /.field-row -->
												<div class="field-row">
                                                    <label>your review</label>
                                                    <textarea rows="8" class="le-input" name="reviewproduk" id="reviewproduk" data-error-container="#error-review" required></textarea>
													<div id="error-review"></div>
												</div><!-- /.field-row -->
												<?php } ?>
                                                <div class="buttons-holder">
                                                    <button type="button" name="simpan" id="simpankomentar" class="le-button huge">submit</button>
                                                </div><!-- /.buttons-holder -->
                                            <?=form_close();?><!-- /.contact-form -->
                                        </div><!-- /.new-review-form -->
                                    </div><!-- /.col -->
                                </div><!-- /.add-review -->

                            </div><!-- /.tab-pane #reviews -->
                        </div><!-- /.tab-content -->

                    </div><!-- /.tab-holder -->
                </div><!-- /.container -->
            </section><!-- /#single-product-tab -->
            <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->
            <?php include_once(APPPATH.'views/product/populer-product.php'); ?>