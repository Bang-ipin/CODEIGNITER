 <!--FOOTER AREA-->
    <div class="footer-area white">
        <div class="footer-top-area blue-bg padding-100-50">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
        </div>
        <div class="footer-bottom-area blue-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="footer-social-bookmark text-center wow fadeIn">
                            <div class="footer-logo mb50">
                                <a href="#"><img src="<?=base_url('files/media/'.$logo.'');?>" alt=""></a>
                            </div>
                            <ul class="social-bookmark">
                                <li><a class="facebook" href="https://facebook.com/<?=$fb;?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="https://twitter.com/<?=$twitter;?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="linkedin" href="https://linkedin.com/in/<?=$linked;?>"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="instagram" href="https://instagram.com/<?=$instagram;?>"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="footer-copyright text-center wow fadeIn">
                            <!--<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developer <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="<?//=$website;?>" target="_blank"><?//=$situs;?></a></p>-->
                        </div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-lg-4 col-md-6 footer-info">
						<h4>About Us</h4>
						<p><?=ucwords($deskripsi_web);?></p>
					</div>

					<div class="col-lg-4 col-md-6 footer-contact">
						<h4>Contact Us</h4>
						<p>
						<strong>Alamat: </strong><?=$alamat;?><br/>
						<strong>Telepon: </strong><?=$telp;?><br>
						<strong>Email: </strong><?=$email;?><br>
						</p>
					</div>

					<div class="col-lg-4 col-md-6 footer-newsletter">
						<h4>Twitter</h4>
						<a class="twitter-timeline" data-lang="id" data-height="250" data-theme="dark" href="https://twitter.com/<?=$twitter;?>"></a> 
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="copyright wow fadeIn">
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> <strong><?=$situs;?></strong>. All Rights Reserved
			</div>
			<div class="credits wow fadeIn">
				Designed by <a href="https://facebook.com/bangipin15">Developer</a>
			</div>
		</div>
	</footer>
    
	<?php if (isset($sharethis)){echo $sharethis;}?>
	<?php if (isset($analityc)){echo $analityc;}?>
	<?php if (isset($livechat)){echo $livechat;}?>
	<?php $this->Site_model->kunjungan(); ?>
	<!--====== SCRIPTS JS ======-->
    <script src="<?=base_url('asset/frontend/js/vendor/jquery-1.12.4.min.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/vendor/bootstrap.min.js');?>"></script>

    <!--====== PLUGINS JS ======-->
    <script src="<?=base_url('asset/frontend/js/vendor/jquery.easing.1.3.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/vendor/jquery-migrate-1.2.1.min.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/vendor/jquery.appear.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/owl.carousel.min.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/slick.min.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/stellar.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/wow.min.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/jquery-modal-video.min.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/stellarnav.min.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/contact-form.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/jquery.ajaxchimp.js');?>"></script>
    <script src="<?=base_url('asset/frontend/js/jquery.sticky.js');?>"></script>

    <!--===== ACTIVE JS=====-->
    <script src="<?=base_url('asset/frontend/js/main.js');?>"></script>
</body>

</html>