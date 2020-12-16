			<div class="fables-header fables-after-overlay">
				<div class="container"> 
					 <h2 class="fables-page-title fables-second-border-color"><?=$title;?></h2>
				</div>
			</div>  
			<div class="fables-light-background-color">
				<div class="container"> 
					<nav aria-label="breadcrumb">
					  <ol class="fables-breadcrumb breadcrumb px-0 py-3">
						<li class="breadcrumb-item"><a href="<?=site_url();?>" class="fables-second-text-color">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
					  </ol>
					</nav> 
				</div>
			</div>
			<div class="container">
				<div class="row mt-3 mt-lg-5 mb-2">
				   <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
					   <div class="text-center">
						   <h2 class="fables-main-text-color font-35 bold-font my-3">Latest Works</h2>
						   <p class="fables-forth-text-color my-4">
							  
							</p>
						</div>
					</div>
				</div>

				<div class="gallery-filter">
					
					<div class="portfolioContainer mt-4 my-lg-5 row">
						<?php 
							if(!$jmlhpage){
								$no=0;
							}
							else{
								$no=$jmlhpage;
							}
							foreach($datadownload as $post):
							date_default_timezone_set('Asia/Jakarta');
							$no++;
							if (!empty($post['background'])){
								$gambar = "<img class='lazy img-responsive' data-src=".$post['background']."  alt='".strip_tags($post['judul'])."'>";
							}else{
								$gambar	= "<img class='lazy img-responsive'  data-src=".base_url('assets/public/img/no-image.jpg')." alt='".strip_tags($post['judul'])."'>";
							}
							
						?>
						<div class="webDesign objects col-sm-6 col-md-3 mb-4">
							<div class="filter-img-block position-relative image-container translate-effect-right">  
								<?=$gambar;?> 
								<div class="img-filter-overlay fables-main-color-transparent row m-0">
									<a href="<?=$post['url'];?>" title="Demo" class="gallery-filter-icon white-color fables-second-hover-color"><span class="fables-iconlink"></span></a>
									<a href="<?=site_url('download/file/'.$post['id'].'/'.$post['nama_file']);?>" class="gallery-filter-icon white-color fables-second-hover-color" title="Download" ><span class="fa fa-download"></span></a>
								</div>
								<p><strong><?=$post['judul'];?></strong></p>
								<span><i class="fa fa-download"></i> <?=$post['hits'];?>&nbsp;x</span>
								
							</div>

						</div>
						<?php 
							endforeach;
						?>	
					</div>
					<?php
						echo $pagination; 
					?> 
				</div>                  
			</div>
			