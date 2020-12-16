<!-- ============================================================= FOOTER ============================================================= -->
            <footer id="footer" class="color-bg">
                <div class="container">
                    <div class="row no-margin widgets-row">
                        <div class="col-xs-12  col-sm-4 no-margin-left">
                            <!-- ============================================================= FEATURED PRODUCTS ============================================================= -->
                            <div class="widget">
                                <h2>Featured products</h2>
                                <div class="body">
                                    <ul>
									 <?php
										$no=0;
										foreach($featured as $data):  ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-9 no-margin">
                                                    <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
                                                    <div class="price">
                                                        <?php if(!empty($data['diskon'])== TRUE){
															$diskon = $data['diskon'];
															$price_new=$data['harga']- $diskon;
																echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div> ";
																echo "<div class='price-current'>".convertrp($price_new)."</div>";
															}else{
																echo "<div class='price-current'>".convertrp($data['harga'])."</div>";
															}
														?>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-3 no-margin">
                                                    <a href="#" class="thumb-holder">
                                                        <img alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/thumbnail/'.$data['gambar'].'');?>" />
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
										<?php $no++; endforeach;  ?>
                                    </ul>
                                </div><!-- /.body -->
                            </div> <!-- /.widget -->
                            <!-- ============================================================= FEATURED PRODUCTS : END ============================================================= -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-4 ">
                            <!-- ============================================================= ON SALE PRODUCTS ============================================================= -->
                            <div class="widget">
                                <h2>On-Sale Products</h2>
                                <div class="body">
                                    <ul>
                                        <?php
										$no=0;
										foreach($onsale as $data):  ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-9 no-margin">
                                                    <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
                                                    <div class="price">
                                                        <?php if(!empty($data['diskon'])== TRUE){
															$diskon = $data['diskon'];
															$price_new=$data['harga']- $diskon;
																echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div> ";
																echo "<div class='price-current'>".convertrp($price_new)."</div>";
															}else{
																echo "<div class='price-current'>".convertrp($data['harga'])."</div>";
															}
														?>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-3 no-margin">
                                                    <a href="#" class="thumb-holder">
                                                        <img alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/thumbnail/'.$data['gambar'].'');?>" />
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
										<?php $no++; endforeach;  ?>
                                    </ul>
                                </div><!-- /.body -->
                            </div> <!-- /.widget -->
                            <!-- ============================================================= ON SALE PRODUCTS : END ============================================================= -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-4 ">
                            <!-- ============================================================= TOP RATED PRODUCTS ============================================================= -->
                            <div class="widget">
                                <h2>Top Rated Products</h2>
                                <div class="body">
                                    <ul>
                                        <?php
										$no=0;
										foreach($toprate as $data):  ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-9 no-margin">
                                                    <a href="<?php echo site_url('produk/'.$data['kategori_seo'].'/'.$data['produk_seo'].'');?>"><?=$data['produk'];?></a>
                                                    <div class="price">
                                                        <?php if(!empty($data['diskon'])== TRUE){
															$diskon = $data['diskon'];
															$price_new=$data['harga']- $diskon;
																echo "<div class='price-prev'><em><strike>".convertrp($data['harga'])."</strike></em></div> ";
																echo "<div class='price-current'>".convertrp($price_new)."</div>";
															}else{
																echo "<div class='price-current'>".convertrp($data['harga'])."</div>";
															}
														?>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-3 no-margin">
                                                    <a href="#" class="thumb-holder">
                                                        <img class="lazy" alt="<?=$data['produk'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/thumbnail/'.$data['gambar'].'');?>" />
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
										<?php $no++; endforeach;  ?>
                                    </ul>
                                </div><!-- /.body -->
                            </div><!-- /.widget -->
                            <!-- ============================================================= TOP RATED PRODUCTS : END ============================================================= -->
                        </div><!-- /.col -->
                    </div><!-- /.widgets-row-->
                </div><!-- /.container -->

                <div class="sub-form-row">
                    <div class="container">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                            <form role="form">
                                <input placeholder="Subscribe to our newsletter">
                                <button class="le-button">Subscribe</button>
                            </form>
                        </div>
                    </div><!-- /.container -->
                </div><!-- /.sub-form-row -->

                <div class="link-list-row">
                    <div class="container no-padding">
                        <div class="col-xs-12 col-md-4 m-t-10">
                            <!-- ============================================================= CONTACT INFO ============================================================= -->
                            <div class="contact-info">
                                <div class="footer-logo">
                                   <a href="<?=site_url();?>">
										<img alt="logo" src="<?=base_url('files/media/'.$logo.'');?>" />
									</a>
                                </div><!-- /.footer-logo -->

                                <p class="regular-bold"> <?=$deskripsi_web;?>  </p>
                                <p>
                                    <?=$alamat;?>                                   
                                </p>
								<p>
                                    <?=$telp;?>                                   
                                </p>
								<p>
                                    <?=$email;?>                            
                                </p>

                                <div class="social-icons">
                                    <h3>Get in touch</h3>
                                    <ul>
                                        <?php if(isset($facebook)){
											echo"<li><a href='https://facebook.com/".$facebook."' target='_blank' class='fa fa-facebook'></a></li>";
										}?>
										<?php if(isset($twitter)){
											echo"<li><a href='https://twitter.com/".$twitter."' target='_blank' class='fa fa-twitter'></a></li>";
										}?>
										<?php if(isset($googleplus)){
											echo"<li><a href='https://plus.google.com/".$googleplus."' target='_blank' class='fa fa-google-plus'></a></li>";
										}?>
										<?php if(isset($instagram)){
											echo"<li><a href='https://instagram.com/".$instagram."' target='_blank' class='fa fa-instagram'></a></li>";
										}?>
										<?php if(isset($youtube)){
											echo"<li><a href='https://youtube.com/".$youtube."' target='_blank' class='fa fa-youtube'></a></li>";
										}?>
										<?php if(isset($linkedin)){
											echo"<li><a href='https://linkedin.com/".$linkedin."' target='_blank' class='fa fa-linkedin'></a></li>";
										}?>
                                    </ul>
                                </div><!-- /.social-icons -->

                            </div>
                            <!-- ============================================================= CONTACT INFO : END ============================================================= -->
                        </div>

                        <div class="col-xs-12 col-md-8 m-t-10">
                            <!-- ============================================================= LINKS FOOTER ============================================================= -->
                            <div class="link-widget">
                                <div class="widget">
                                    <h3>Pages</h3>
                                    <ul>
										<?php 
										$menulib= new menu_lib();
										$query= $menulib->getPrimaryMenu();
										foreach ($query->result_array() as $menu) : 
										$menu_id=$menu['id_menu'];
										$child_satu = $menulib->getMenuChild($menu_id);
										if($child_satu->num_rows() == 0){ ?>
										<li>
											<a href="<?=$menu['opsi'].''.$menu['url'];?>"> <?=$menu['nama_menu'];?></a>
										</li>
										<?php }else{ ?>
										<li>
											<a href="<?=$menu['opsi'].''.$menu['url'];?>"> <?=$menu['nama_menu'];?></a>
										</li>
										<?php } endforeach; ?>
                                    </ul>
                                </div><!-- /.widget -->
                            </div><!-- /.link-widget -->

                            <div class="link-widget">
                                <div class="widget">
                                    <h3>Information</h3>
                                    <ul>
                                        <?php 
										$menulib= new menu_lib();
										$query= $menulib->getFooterMenu1();
										foreach ($query->result_array() as $menu) : 
										$menu_id=$menu['id_menu'];
										$child_satu = $menulib->getMenuChild($menu_id);
										if($child_satu->num_rows() == 0){ ?>
										<li>
											<a href="<?=$menu['opsi'].''.$menu['url'];?>"><?=$menu['nama_menu'];?></a>
										</li>
										<?php } else { ?>
										<li>
											<a href="<?=$menu['opsi'].''.$menu['url'];?>"><?=$menu['nama_menu'];?></a>
										</li>
									<?php } endforeach;?>
                                        
                                    </ul>
                                </div><!-- /.widget -->
                            </div><!-- /.link-widget -->
                            <div class="link-widget">
                                <div class="widget">
                                    <h3>Me On Facebook</h3>
                                    <?php
										$sql_like_box_fb = $this->db->query("SELECT * FROM like_box_fb limit 1")->result_array();
										foreach ($sql_like_box_fb as $data){
										?>
										<div id="fb-root"></div>
										<script>(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId='<?php echo $data['application_id']; ?>'";
										fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>

										<div class="fb-like-box" data-href="<?php echo $data['url'] ?>" data-width="<?php echo $data['width']; ?>"
										data-height="<?php echo $data['height']; ?>" data-show-faces="<?php echo $data['show_face']; ?>"
										data-stream="<?php echo $data['show_status']; ?>" data-header="<?php echo $data['show_header_fb']; ?>"></div>

										<?php } ?>
                                </div><!-- /.widget -->
                            </div><!-- /.link-widget -->
                            <!-- ============================================================= LINKS FOOTER : END ============================================================= -->
                        </div>
                    </div><!-- /.container -->
                </div><!-- /.link-list-row -->

                <div class="copyright-bar">
                    <div class="container">
                        <div class="col-xs-12 col-sm-6 no-margin">
                            <div class="copyright">
                                &copy; <a href="index.html">Media Center</a> - all rights reserved
                            </div><!-- /.copyright -->
                        </div>
                        <div class="col-xs-12 col-sm-6 no-margin">
                            <div class="payment-methods ">
                                <ul>
								<?php
									$no=1;
									foreach($bank as $post){
										if($post['status']==1){
											echo "<li><img src=".base_url('files/media/'.$post['gambar'].'')." alt=".$post['judul']." title=".strtoupper($post['judul'])." class='img-responsive' style='width:50px;height:32px;'></a>";
										$no++;
										}else{
											return FALSE;
										}
									}
									?>
                                </ul>
                            </div><!-- /.payment-methods -->
                        </div>
                    </div><!-- /.container -->
                </div><!-- /.copyright-bar -->
            </footer><!-- /#footer -->
            <!-- ============================================================= FOOTER : END ============================================================= -->
        </div><!-- /.wrapper -->
        <?php $this->Site_model->kunjungan(); ?>
		<!-- JavaScripts placed at the end of the document so the pages load faster -->
        <script src="<?=base_url('assets/frontend/js/jquery-1.10.2.min.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/jquery-migrate-1.2.1.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/bootstrap.min.js');?>"></script>
		<script src="<?=base_url('assets/frontend/js/bootstrap-hover-dropdown.min.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/owl.carousel.min.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/css_browser_selector.min.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/echo.min.js');?>"></script>
    	<?php if(isset($maps)){ echo $maps;}?>
        <script src="<?=base_url('assets/frontend/js/jquery.easing-1.3.min.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/bootstrap-slider.min.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/jquery.rateit.js')?>"></script>
		<script src="<?=base_url('assets/frontend/js/jquery.validate.min.js')?>" ></script>
		<script src="<?=base_url('assets/global/plugins/fancybox/jquery.fancybox.pack.js');?>"></script>
		<script src="<?=base_url('assets/frontend/js/jquery.customSelect.min.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/wow.min.js');?>"></script>
        <script src="<?=base_url('assets/frontend/js/jquery.bootstrap.wizard.min.js');?>"></script>
        <script src="<?=base_url('assets/global/scripts/metronic.js')?>"></script>
		<script src="<?=base_url('assets/frontend/js/scripts.js');?>"></script>
		<?php if(isset($jscheckout)){ echo $jscheckout;}?>
		<?php if(isset($jsprofile)){ echo $jsprofile;}?>
		<?php if(isset($jsblog)){ echo $jsblog;}?>
		<?php if(isset($jsproduk)){ echo $jsproduk;}?>
		<?php if(isset($jsregister)){ echo $jsregister;}?>
		<?php if(isset($jsmaps)){ echo $jsmaps;}?>
		<?php if (isset($javascript_footer)){echo $javascript_footer;}?>
		<script type="text/javascript">
	         (function () {
                var options = {
                    whatsapp: "+6285747875865", // WhatsApp number
                    call_to_action: "Chat", // Call to action
                    position: "right", // Position may be 'right' or 'left'
                };
                var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
            
    		function deletecart(id) {
    			if(confirm("Apakah anda ingin menghapus data ini?")){
    			  $.ajax({
    				type: 'POST',
    				url: '<?= site_url('cart/deletecart');?>',
    				data: 'id='+id,
    				error: function (xhr, ajaxOptions, thrownError) {
    					return false;		  	
    				},
    				success: function (e) {
    						window.location.reload('<?=site_url()?>');
    					}
    				});
    			}
    		};
		</script>
    </body>
</html>