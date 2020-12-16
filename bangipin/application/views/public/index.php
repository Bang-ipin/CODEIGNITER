		<?php if (isset($slider))
			{
				include_once(APPPATH.'views/public/slider.php');
			}
		?>
		<div class="fables-page-content">     
			
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="font-35 font-weight-bold fables-main-text-color my-3 my-lg-5 my-md-4 text-center">Blog</h2>
					</div>
					<?php foreach($eightblog as $data):?>
					<div class="col-12 col-md-4 mb-4 mb-lg-5 wow fadeIn" data-wow-delay=".3s">
						<div class="position-relative"> 
							<div class="image-container translate-effect-right">
								<a href="<?=site_url('blog/'.$data['kategori'].'/'.strip_tags($data['judul_seo']));?>"><img class="img-fluid w-100 lazy" data-src="<?=base_url('files/media/'.$data['gambar'].'');?>" alt="<?=$data['judul_blog'];?>" style="width:200px;height:180px" /></a> 
								<span class="above-date position-absolute text-center fables-second-background-color white-color px-3 py-2">
									<span class="bold-font day"><?=ambiltglblog($data['tgl_posting']);?></span>  <span class="month d-block"><?=ambilbulanblog($data['tgl_posting']);?></span>
								</span>
							</div> 
						  
							<h3 class="font-18 my-3"><a href="<?=site_url('blog/'.$data['kategori'].'/'.strip_tags($data['judul_seo']));?>" class="fables-main-text-color fables-second-hover-color"><?=$data['judul_blog'];?></a></h3>
						  
							<p class="fables-forth-text-color font-14 mb-2">
								<?=strip_tags(character_limiter($data['isi'],400));?>
							</p>
							<a href="<?=site_url('blog/'.$data['kategori'].'/'.strip_tags($data['judul_seo']));?>" class="btn fables-second-text-color fables-main-hover-color p-0 font-15 border-0">Read More  <i class="fas fa-long-arrow-alt-right"></i></a> 
						</div> 
					</div>
					<?php endforeach;?>
				</div>
			    <div class="row">
			        	<a href="<?=site_url('artikel');?>" class="btn fables-second-border-color fables-second-text-color rounded-0 mt-4 mx-auto px-5 py-2 fables-second-hover-background-color">Lihat Selengkapnya</a>
			    </div>
			</div>
			
			<div class="container my-4 my-lg-5"> 
				<div class="row">
				   <div class="col-12 col-md-8 offset-md-2">
					   <div class="text-center">
						   <h2 class="fables-main-text-color font-35 font-weight-bold mt-0 mb-4 ">Projects</h2>
						   <p class="fables-forth-text-color mb-5">
							 
						   </p>
					   </div>
				   </div>
			   </div>
				<div class="row">
					<?php foreach($fullgallery as $data):?>
					<div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<div class="filter-img-block position-relative image-container translate-effect-right"> 
							 <img class="lazy img-fluid w-100" data-src="<?=base_url('files/media/'.$data['gambar'].'');?>" alt="<?=$data['judul'];?>"  style="width:200px;height:180px"/> 
							 <div class="img-filter-overlay fables-main-color-transparent flex-center">
								 <a href="#" class="fables-third-text-color fables-second-hover-color work-icon mx-3"><span class="fables-iconlink "></span></a>
								 
							 </div>
						</div>
					</div>
					<?php endforeach;?>
			   </div> 
			</div>
			
		</div>
		