	          
            <section id="category-grid">
                <div class="container">
                    <!-- ========================================= SIDEBAR ========================================= -->
                    <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
                        <!-- ========================================= PRODUCT FILTER ========================================= -->
                        <div class="widget sidebarmenu-holder">
							<!-- ================================== TOP NAVIGATION ================================== -->
							<div class="side-menu animate-dropdown">
								<div class="head"><i class="fa fa-list"></i> all departments</div>
								<nav class="yamm megamenu-horizontal" role="navigation">
									<ul class="nav">
										<?php 
										$menulib= new menu_lib();
										$query= $menulib->getSidebarMenu();
										foreach ($query->result_array() as $menu) : 
										$menu_id=$menu['id_menu'];
										$child_satu = $menulib->getMenuChild($menu_id);
										if($child_satu->num_rows() == 0){ ?>
										<li>
											<a href="<?=$menu['opsi'].''.$menu['url'];?>"><?=$menu['nama_menu'];?></a>
										</li>
										<?php }else{ ?>
										<li class="dropdown menu-item">
											<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?=ucwords($menu['nama_menu']);?></a>
											<?php if($menulib->getMenuChild($menu_id)) : ?>
											<ul class="dropdown-menu mega-menu">
												<?php 
												$child_dua = $menulib->getMenuChild($menu_id);
												?> 
												<li class="yamm-content">
													<!-- ================================== MEGAMENU VERTICAL ================================== -->
													<div class="row">
														<?php foreach ($child_satu->result_array() as $child1) :
															$menu_id2=$child1['id_menu'];
															$child_dua = $menulib->getMenuChild($menu_id2);
														?>
														<div class="col-xs-12 col-lg-4">
															<h2><a href="<?=$child1['opsi'].''.$child1['url'];?>"><?=ucwords($child1['nama_menu']);?></a></h2>
															<ul>
																<?php 
																	$child_dua = $menulib->getMenuChild($menu_id2);
																	foreach ($child_dua->result_array() as $child2) :
																?>
																<li>
																	<a href="<?=$child2['opsi'].''.$child2['url'];?>"><?=ucwords($child2['nama_menu']);?></a>
																</li>
																<?php endforeach;?>
															</ul>
														</div>
														<?php endforeach;?>
														<div class="dropdown-banner-holder">
															<a href="#"><img alt="" src="<?=base_url('assets/frontend/images/banners/banner-side.png');?>" /></a>
														</div>
													</div>
													<!-- ================================== MEGAMENU VERTICAL ================================== -->
												</li>
											</ul>
											<?php endif;?>
										</li><!-- /.menu-item -->
										<?php } endforeach;?>
									</ul><!-- /.nav -->
								</nav><!-- /.megamenu-horizontal -->
							</div><!-- /.side-menu -->
							<!-- ================================== TOP NAVIGATION : END ================================== -->
						</div><!-- /.sidemenu-holder -->
						
                        <div class="widget">
                            <h1 class="border">special offers</h1>
                            <ul class="product-list">
                                <?php
								foreach($populer as $data):  ?>
								<li>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/medium/'.$data['gambar'].'');?>" style="width:73px;height:73px;" />
                                            </a>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 no-margin">
                                            <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
                                            <div class="prices">
											   <?php if(!empty($data['diskon'])== TRUE){
													$diskon = $data['diskon'];
													$price_new=$data['harga']- $diskon;
														echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div>";
														echo "<div class='price-current'>".convertrp($price_new)."</div>";
														echo "<input type='hidden' class='form-control' id='price' name='price' value='".$price_new."' id='price'  placeholder='price' readonly required></td>";
													}else{
														echo "<div class='price-prev'><em><strike></strike></em></div>";
														echo "<div class='price-current'>".convertrp($data['harga'])."</div>";
														echo "<input type='hidden' class='form-control' id='price' name='price' value='".$data['harga']."' id='price'  placeholder='price' readonly required></td>";
													}
												?>
											</div>
                                        </div>
                                    </div>
                                </li> 
								<?php endforeach;  ?>
                            </ul>
                        </div><!-- /.widget -->

                        <div class="widget">
                            <div class="simple-banner">
                                <a href="#"><img alt="" class="img-responsive" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/banners/banner-simple.jpg');?>" /></a>
                            </div>
                        </div>

                        <!-- ========================================= FEATURED PRODUCTS ========================================= -->
                        <div class="widget">
                            <h1 class="border">Featured Products</h1>
                            <ul class="product-list">
								<?php foreach($featured as $data):  ?>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/medium/'.$data['gambar'].'');?>" style="width:73px;height:73px;" />
                                            </a>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 no-margin">
                                            <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
                                            <div class="prices">
											   <?php if(!empty($data['diskon'])== TRUE){
													$diskon = $data['diskon'];
													$price_new=$data['harga']- $diskon;
														echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div>";
														echo "<div class='price-current'>".convertrp($price_new)."</div>";
														echo "<input type='hidden' class='form-control' id='price' name='price' value='".$price_new."' id='price'  placeholder='price' readonly required></td>";
													}else{
														echo "<div class='price-prev'><em><strike></strike></em></div>";
														echo "<div class='price-current'>".convertrp($data['harga'])."</div>";
														echo "<input type='hidden' class='form-control' id='price' name='price' value='".$data['harga']."' id='price'  placeholder='price' readonly required></td>";
													}
												?>
											</div>
                                        </div>
                                    </div>
                                </li> 
								<?php endforeach;  ?>
                            </ul><!-- /.product-list -->
                        </div><!-- /.widget -->
                        <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
                    </div>
                    <!-- ========================================= SIDEBAR : END ========================================= -->

                    <!-- ========================================= CONTENT ========================================= -->
                    <div class="col-xs-12 col-sm-9 no-margin wide sidebar">
                        <section id="gaming">
                            <div class="grid-list-products">
                                <h2 class="section-title"><?=$title;?></h2>

                                <div class="control-bar">
                                    <div class="grid-list-buttons">
                                        <ul>
                                            <li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> Grid</a></li>
                                            <li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> List</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.control-bar -->

                                <div class="tab-content">
                                    <div id="grid-view" class="products-grid fade tab-pane in active">

                                        <div class="product-grid-holder">
                                            <div class="row no-margin">
												<?php
												if(!$jmlhpage){
													$no=0;
												}
												else{
													$no=$jmlhpage;
												}						
												foreach($dataproduk as $data):
												$no++;
												?>
                                                <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                                    <div class="product-item">
                                                        <?php 
															if($data['label'] == 1){
																echo "<div class='ribbon blue'><span>New</span></div>";
															}
															else if($data['label'] == 2 ){
																echo "<div class='ribbon red'><span>sale</span></div>";
															}
															else if($data['label'] == 3 ){
																echo "<div class='ribbon green'><span>best seller</span></div>";
																}
															else{
																echo "";
															}
														?>
														<div class="image">
															<img alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/medium/'.$data['gambar'].'');?>" />
														</div>
														<div class="body">
															<!--div class="label-discount green">-50% sale</div-->
															<div class="title">
																<a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
															</div>
															<div class="brand">
															<?php
															$votes=$this->Site_model->nilai_votes($data['id']);
															?>
															<div class="rateit" data-rateit-value="<?=$votes;?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
															</div>
														</div>
														<div class="prices">
															<?php if(!empty($data['diskon'])== TRUE){
																$diskon = $data['diskon'];
																$price_new=$data['harga']- $diskon;
																	echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div>";
																	echo "<div class='price-current pull-right'>".convertrp($price_new)."</div>";
																	echo "<input type='hidden' class='form-control' id='price' name='price' value='".$price_new."' id='price'  placeholder='price' readonly required></td>";
																}else{
																	echo "<div class='price-prev'><em><strike></strike></em></div>";
																	echo "<div class='price-current pull-right'>".convertrp($data['harga'])."</div>";
																	echo "<input type='hidden' class='form-control' id='price' name='price' value='".$data['harga']."' id='price'  placeholder='price' readonly required></td>";
																}
															?>
														</div>
                                                        <div class="hover-area">
															<div class="add-cart-button">
																<a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>" class="le-button">add to cart</a>
															</div>
														</div>
													</div><!-- /.product-item -->
                                                </div><!-- /.product-item-holder -->
												<?php endforeach; ?>
                                            </div><!-- /.row -->
                                        </div><!-- /.product-grid-holder -->
                                    </div><!-- /.products-grid #grid-view -->

                                    <div id="list-view" class="products-grid fade tab-pane ">
                                        <div class="products-list">
											<?php
												if(!$jmlhpage){
													$no=0;
												}
												else{
													$no=$jmlhpage;
												}						
												foreach($dataproduk as $data):
												$no++;
											?>
                                            <div class="product-item product-item-holder">
                                                <?php 
													if($data['label'] == 1){
														echo "<div class='ribbon blue'><span>New</span></div>";
													}
													else if($data['label'] == 2 ){
														echo "<div class='ribbon red'><span>sale</span></div>";
													}
													else if($data['label'] == 3 ){
														echo "<div class='ribbon green'><span>best seller</span></div>";
														}
													else{
														echo "";
													}
												?>
												<div class="row">
                                                    <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                        <div class="image">
															<img alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/medium/'.$data['gambar'].'');?>" />
														</div>
                                                    </div><!-- /.image-holder -->
                                                    <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                        <div class="body">
															<!--div class="label-discount green">-50% sale</div-->
															<div class="title">
																<a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
															</div>
															<div class="brand">
															<?php
															$votes=$this->Site_model->nilai_votes($data['id']);
															?>
															<div class="rateit" data-rateit-value="<?=$votes;?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
															</div>
															<div class="excerpt">
                                                                <p><?=$data['deskripsi_singkat'];?></p>
                                                            </div>
                                                            
														</div>
                                                    </div><!-- /.body-holder -->
                                                    <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                        <div class="right-clmn">
                                                            <?php if(!empty($data['diskon'])== TRUE){
																$diskon = $data['diskon'];
																$price_new=$data['harga']- $diskon;
																	echo "<div class='price-current'>".convertrp($price_new)."</div>";
																	echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div>";
																	echo "<input type='hidden' class='form-control' id='price' name='price' value='".$price_new."' id='price'  placeholder='price' readonly required></td>";
																}else{
																	echo "<div class='price-current'>".convertrp($data['harga'])."</div>";
																	echo "<div class='price-prev'><em><strike></strike></em></div>";
																	echo "<input type='hidden' class='form-control' id='price' name='price' value='".$data['harga']."' id='price'  placeholder='price' readonly required></td>";
																}
															?>
                                                            <div class="availability"><label>availability:</label><span class="available"> <?=$data['qty']?></span></div></span>
														</div>
														<a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>" class="le-button">add to cart</a>
													</div>
												</div><!-- /.price-area -->
											</div><!-- /.row -->
											<?php endforeach;?>
										</div><!-- /.product-item -->

									</div><!-- /.products-list -->

									<div class="pagination-holder">
										<div class="row">
											<div class="col-xs-12 col-sm-6 text-left">
												  <?=$pagination;?>
											</div>
											
										</div><!-- /.row -->
									</div><!-- /.pagination-holder -->

								</div><!-- /.products-grid #list-view -->
							</div><!-- /.tab-content -->
                        </section><!-- /#gaming -->
                    </div><!-- /.col -->
                    <!-- ========================================= CONTENT : END ========================================= -->
                </div><!-- /.container -->
            </section><!-- /#category-grid -->