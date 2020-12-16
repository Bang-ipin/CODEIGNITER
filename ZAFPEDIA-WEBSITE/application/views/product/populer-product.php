<!-- ========================================= RECENTLY VIEWED ========================================= -->
            <section id="recently-reviewd" class="wow fadeInUp">
                <div class="container">
                    <div class="carousel-holder hover">

                        <div class="title-nav">
                            <h2 class="h1">Recently Viewed</h2>
                            <div class="nav-holder">
                                <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                                <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                            </div>
                        </div><!-- /.title-nav -->

                        <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                            <?php
							$no=0;
							foreach($populer as $data):  ?>
                            <div class=" no-margin carousel-item product-item-holder size-small hover">
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
                                            <img class="lazy" alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/medium/'.$data['gambar'].'');?>" />
                                        </a>
                                   </div>
                                    <div class="body">
                                        <div class="title">
                                            <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
                                        </div>
                                        <div class="brand">
										<?php
										$votes=$this->Site_model->nilai_votes($data['id']);
										?>
										<div class="rateit" data-rateit-value="<?=$votes;?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div></div>
									</div>
									<div class="prices">
									   <?php if(!empty($data['diskon'])== TRUE){
											$diskon = $data['diskon'];
											$price_new=$data['harga']- $diskon;
												echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div>";
												echo "<div class='price-current'>".convertrp($price_new)."</div>";
											}else{
												echo "<div class='price-prev'><em><strike></strike></em></div>";
												echo "<div class='price-current'>".convertrp($data['harga'])."</div>";
											}
										?>
									</div>
									<div class="hover-area">
										<div class="add-cart-button">
											<a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>" class="le-button">add to cart</a>
										</div>
									</div>
								</div>
							</div><!-- /.product-item-holder -->
							<?php $no++; endforeach;  ?>
                        </div><!-- /#recently-carousel -->

                    </div><!-- /.carousel-holder -->
                </div><!-- /.container -->
            </section><!-- /#recently-reviewd -->
            <!-- ========================================= RECENTLY VIEWED : END ========================================= -->