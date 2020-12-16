			<div id="products-tab" class="wow fadeInUp">
                <div class="container">
                    <div class="tab-holder">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" >
                            <li class="active"><a href="#featured" data-toggle="tab">featured</a></li>
                            <li><a href="#best-sellers" data-toggle="tab">Best Seller</a></li>
                            <li><a href="#top-sales" data-toggle="tab">top sales</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="featured">
                                <div class="product-grid-holder">
                                    <?php
									$no=0;
									foreach($featured as $data):  ?>
									<div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
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
                                                <a href="<?=base_url('files/medium/'.$data['gambar'].'');?>" class="fancy-view">
                                                    <img class="lazy" alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/ajax.gif');?>" data-echo="<?=base_url('files/medium/'.$data['gambar'].'');?>" />
                                                </a>
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
													}else{
														echo "<div class='price-prev'><em><strike></strike></em></div>";
														echo "<div class='price-current pull-right'>".convertrp($data['harga'])."</div>";
													}
												?>
                                            </div>

                                            <div class="hover-area">
                                                <div class="add-cart-button">
                                                    <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>" class="le-button">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php $no++; endforeach;  ?>
								</div>
                            </div>
                            <div class="tab-pane" id="best-sellers">
                               <div class="product-grid-holder">
                                    <?php
									$no=0;
									foreach($bestseller as $data):  ?>
									<div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
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
                                                <a href="<?=base_url('files/medium/'.$data['gambar'].'');?>" class="fancy-view">
                                                    <img class="lazy" alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/ajax.gif');?>" data-echo="<?=base_url('files/medium/'.$data['gambar'].'');?>" />
                                                </a>
                                            </div>
                                            <div class="body">
												<div class="label-discount green"></div>
                                                <div class="title">
                                                    <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
                                                </div>
                                                <div class="brand"></div>
												<?php
												$votes=$this->Site_model->nilai_votes($data['id']);
												?>
												<div class="rateit" data-rateit-value="<?=$votes;?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                            </div>
                                            <div class="prices">
												<?php if(!empty($data['diskon'])== TRUE){
													$diskon = $data['diskon'];
													$price_new=$data['harga']- $diskon;
														echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div>";
														echo "<div class='price-current pull-right'>".convertrp($price_new)."</div>";
													}else{
														echo "<div class='price-prev'><em><strike></strike></em></div>";
														echo "<div class='price-current pull-right'>".convertrp($data['harga'])."</div>";
													}
												?>
                                            </div>

                                            <div class="hover-area">
                                                <div class="add-cart-button">
                                                    <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>" class="le-button">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php $no++; endforeach;  ?>
								</div>
                            </div>

                            <div class="tab-pane" id="top-sales">
                               <div class="product-grid-holder">
                                    <?php
									$no=0;
									foreach($toprate as $data):  ?>
									<div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
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
                                                <a href="<?=base_url('files/medium/'.$data['gambar'].'');?>" class="fancy-view">
                                                    <img class="lazy" alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/ajax.gif');?>" data-echo="<?=base_url('files/medium/'.$data['gambar'].'');?>" />
                                                </a>
                                            </div>
                                            <div class="body">
												<div class="label-discount green"></div>
                                                <div class="title">
                                                    <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
                                                </div>
                                                <div class="brand"></div>
												<?php
												$votes=$this->Site_model->nilai_votes($data['id']);
												?>
												<div class="rateit" data-rateit-value="<?=$votes;?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                            </div>
                                            <div class="prices">
												<?php if(!empty($data['diskon'])== TRUE){
													$diskon = $data['diskon'];
													$price_new=$data['harga']- $diskon;
														echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div>";
														echo "<div class='price-current pull-right'>".convertrp($price_new)."</div>";
													}else{
														echo "<div class='price-prev'><em><strike></strike></em></div>";
														echo "<div class='price-current pull-right'>".convertrp($data['harga'])."</div>";
													}
												?>
                                            </div>

                                            <div class="hover-area">
                                                <div class="add-cart-button">
                                                    <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>" class="le-button">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php $no++; endforeach;  ?>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>