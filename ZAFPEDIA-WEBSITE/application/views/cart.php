			<section id="cart-page">
                <div class="container">
                    <!-- ========================================= CONTENT ========================================= -->
                    <?php if (!empty($this->cart->contents())){ ?>
					<?=form_open('cart/updatecart',array('role'=>"form",'id'=>"updatecart"));?>
					<div class="col-xs-12 col-md-9 items-holder no-margin">
                        <?php $i = 1; ?>
						<?php foreach ($this->cart->contents() as $items):
						$kategori=slug($items['kategori']);
						?>
						<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
						<div class="row no-margin cart-item">
                            <div class="col-xs-12 col-sm-2 no-margin">
                                <a href="<?php echo site_url('produk/'.$kategori.'/'.$items['produk_seo'].'');?>" class="thumb-holder">
                                    <?php 
									if (!empty($items['image'])){
										$gambar="<img src=".base_url('files/thumbnail/'.$items['image'].'')." alt=".$items['name']." class='lazy' style='width:7xpx;height:73px;'>";
									}else{
										$gambar="<img src=".base_url('files/images/no-image.jpg')." class='lazy' alt=".$items['name']." style='width:7xpx;height:73px;'>";
									}
									?>
									<?=$gambar;?>
                                </a>
                            </div>

                            <div class="col-xs-12 col-sm-5 ">
                                <div class="title">
                                    <a href="<?php echo site_url('produk/'.$kategori.'/'.$items['produk_seo'].'');?>"><?php echo $items['name'];?></a>
                                </div>
                                <div class="brand"></div>
                            </div>
							<?php $cariStokAsli=$this->Site_model->CariStokAsli($items['id']);?>
                            <div class="col-xs-12 col-sm-3 no-margin">
                                <div class="quantity">
                                    <!--div class="le-quantity">
                                        <form>
                                            <a class="minus" href="#reduce"></a>
                                            <input name="<?//=$i.'[qty]';?>" readonly="readonly" min="0" max="<?//=$cariStokAsli;?>" id="qty" type="text" value="<?//=$items['qty'];?>" />
                                            <a class="plus" href="#add"></a>
                                        </form>
                                    </div-->
									<div class="le-quantity">
										<input type="number" id="qty" name="<?=$i.'[qty]';?>" min="0" max="<?=$cariStokAsli;?>" value="<?=$items['qty'];?>" />
								    </div>
                                </div>
                            </div>
							<div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">
                                    <?php echo convertrp($items['price']); ?>
                                </div>
                                <a id="id" onclick="deletecart('<?=$items['rowid'];?>')" class="close-btn"></a>
                            </div>
                        </div><!-- /.cart-item -->
						<?php $i++; ?>
						<?php endforeach; ?>
						<div class="widget cart-summary">
							<div class="body">
								<div class="buttons-holder">
									<button class="le-button big" name="submit" type="submit" >Update <i class="fa fa-edit"></i></button>
								</div>
							</div>
						</div><!-- /.widget -->
						<?=form_close();?>
					</div>
					
					<!-- ========================================= CONTENT : END ========================================= -->

                    <!-- ========================================= SIDEBAR ========================================= -->

                    <div class="col-xs-12 col-md-3 no-margin sidebar ">
                        <div class="widget cart-summary">
                            <h1 class="border">shopping cart</h1>
                            <div class="body">
                                <ul class="tabled-data no-border inverse-bold">
                                    <li>
                                        <label>cart subtotal</label>
                                        <div class="value pull-right"><?php echo  convertrp($this->cart->total()); ?></div>
                                    </li>
                                    <li>
                                        <label>shipping</label>
                                        <div class="value pull-right">free shipping</div>
                                    </li>
                                </ul>
                                <ul id="total-price" class="tabled-data inverse-bold no-border">
                                    <li>
                                        <label>order total</label>
                                        <div class="value pull-right"><?php echo  convertrp($this->cart->total()); ?></div>
                                    </li>
                                </ul>
                                <div class="buttons-holder">
                                    <a class="le-button big" href="<?=site_url('checkout');?>" >checkout</a>
                                    <a class="simple-link block" href="<?=site_url();?>" >continue shopping</a>
                                </div>
                            </div>
                        </div><!-- /.widget -->

                        <!--div id="cupon-widget" class="widget">
                            <h1 class="border">use coupon</h1>
                            <div class="body">
                                <form>
                                    <div class="inline-input">
                                        <input data-placeholder="enter coupon code" type="text" />
                                        <button class="le-button" type="submit">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div--><!-- /.widget -->
                    </div><!-- /.sidebar -->

                    <!-- ========================================= SIDEBAR : END ========================================= -->
					<?php }else{?>
					<div class="shopping-cart-page">
						<div class="shopping-cart-data clearfix">
							<p>Your shopping cart is empty!</p>
						</div>
					</div>
					<?php } ?>
				</div>
            </section>