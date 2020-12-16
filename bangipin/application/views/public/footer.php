		<span itemscope itemtype="http://schema.org/LocalBusiness">
		<div class="fables-footer-image fables-after-overlay white-color py-4 py-lg-5 mt-4 bg-rules">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-4 mb-4 mb-md-0">
						<?php if(empty($logo)){?>
						<a class="mb-4" href="<?=site_url();?>"><?=$situs;?></a>
						<?php }else{?>
						<a href="<?=site_url();?>"><img itemprop="image" src="<?=base_url('files/thumbnail/'.$logo.'');?>" alt="<?=$situs;?>" class="mb-4"/></a>
						<?php } ?>
						<p class="font-15 fables-third-text-color mb-4">
						   <?=$deskripsi_web;?>
						</p> 
						<ul class="nav fables-footer-social-links">
							<?php if(isset($facebook)){
								echo"<li><a href='https://facebook.com/".$facebook."' target='_blank' class='fa fa-facebook'></a></li>";
							}?>
							<?php if(isset($twitter)){
								echo"<li><a href='https://twitter.com/".$twitter."' target='_blank' class='fa fa-twitter-square'></a></li>";
							}?>
							<?php if(isset($instagram)){
								echo"<li><a href='https://instagram.com/".$instagram."' target='_blank' class='fa fa-instagram'></a></li>";
							}?>
							<?php if(isset($youtube)){
								echo"<li><a href='https://youtube.com/channel/".$youtube."' target='_blank' class='fa fa-youtube-square'></a></li>";
							}?>
							<?php if(isset($linkedin)){
								echo"<li><a href='https://linkedin.com/in/".$linkedin."' target='_blank' class='fa fa-linkedin'></a></li>";
							}?>
						</ul>
					</div>
				 
					<div class="col-12 col-sm-6 col-md-4">
						<h2 class="font-20 semi-font mb-5">Artikel</h2> 
						<?php foreach($blogger as $data):?>
						<div class="row mb-3">
							<div class="col-12">
								<a href="<?=site_url('blog/'.$data['kategori'].'/'.strip_tags($data['judul_seo']));?>" class="fables-second-hover-color font-15 font-weight-bold white-color"><?=$data['judul_blog'];?></a>
								<p class="fables-fifth-text-color font-12 mt-2"><span class="fa fa-calendar"></span>  <?php date_default_timezone_set('Asia/Jakarta');
									echo date('d F Y',strtotime($data['tgl_posting']));?></p>
							</div>
						</div>
						<?php endforeach;?>
					</div>
					<div class="col-12 col-sm-6 col-md-4">
						<h2 class="font-20 semi-font mb-5">Kontak</h2>
						<div class="mb-3">
							<h3 class="font-16 semi-font mb-2"> Alamat</h3>
							<p class="fables-fifth-text-color font-14 "><i class="fa fa-map-marker"></i><span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"> <?=$alamat;?></span></p>
						</div>
						<div class="mb-3">
							<h3 class="font-16 semi-font mb-2"> Whatsapp </h3>
							<p itemprop="telephone" class="fables-fifth-text-color font-14"><i class="fa fa-whatsapp"></i>  <?=$telp;?></p>
						</div>
						<div class="mb-3">
							<h3 class="font-16 semi-font mb-2"> E-Mail </h3>
							<p itemprop="email" class="fables-fifth-text-color font-14"><i class="fa fa-envelope"></i>  <?=$email;?></p>
						</div>
						<div class="mb-3">
							<h3 class="font-16 semi-font mb-2"> Website </h3>
							<p itemprop="url" class="fables-fifth-text-color font-14"><i class="fa fa-home"></i>  <?=$website;?></p>
						</div>
					</div> 
				</div>  
			</div>
		</div>
		<script src="<?=base_url('assets/public/js/jquery.min.js');?>"></script>
		<script src="<?=base_url('assets/public/js/bootstrap.min.js');?>" ></script>
	   	<script src="<?=base_url('assets/public/js/bootstrap-4-navbar.js');?>" ></script>
	   	<script src="<?=base_url('assets/public/js/owl.carousel.min.js');?>" ></script> 
       	<script src="<?=base_url('assets/public/js/range-slider.js');?>" ></script> 
        <script src="<?=base_url('assets/public/js/wow.min.js');?>" ></script>
	    <script src="<?=base_url('assets/plugins/jquery.cookie/jquery.cookie.js')?>"></script>
	    <script src="<?=base_url('assets/public/js/jquery.lazy.min.js');?>" ></script> 
        <?php if (isset($js)){echo $js;}?>
        <?php if(isset($jsblog)){ echo $jsblog;}?>
		<?php if(isset($jsmaps)){ echo $jsmaps;}?>
		<script  src="<?=base_url('assets/public/js/custom.js');?>"></script>
		<script>$(function() {$('.lazy').lazy();});</script>
		<div class="copyright fables-main-background-color mt-0 border-0 white-color">
			<p>Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
			<p class="mb-0">Copyright © <span itemprop="name"><?=$situs;?></span>. All rights reserved.</p> 
		</div>
		<?php $this->Site_model->kunjungan(); ?>
	</body>
</html>