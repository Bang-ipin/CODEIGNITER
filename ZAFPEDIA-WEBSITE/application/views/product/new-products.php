<!-- ========================================= BEST SELLERS ========================================= -->
            <section id="bestsellers" class="color-bg wow fadeInUp">
                <div class="container">
                    <h1 class="section-title">New Items</h1>

                    <div class="product-grid-holder medium">
                        <div class="col-xs-12 col-md-12 no-margin">

                            <div class="row no-margin">
                                <?php
								$no=0;
								foreach($newitem as $data):  ?>
								<div class="col-xs-12 col-sm-4 col-md-3  no-margin product-item-holder  hover">
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
                                            <div class="label-discount clear"></div>
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
                                </div><!-- /.product-item-holder -->
								<?php $no++; endforeach;  ?>
                            </div><!-- /.row -->

                           
                        </div><!-- /.col -->
                    </div><!-- /.product-grid-holder -->
                </div><!-- /.container -->
            </section><!-- /#bestsellers -->
            <!-- ========================================= BEST SELLERS : END ========================================= -->