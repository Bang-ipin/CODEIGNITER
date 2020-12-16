		<?php if(!empty($slider)):?>
		<div class="fables-header fables-after-overlay overlay-lighter bg-rules">
			<div class="container overflow-hidden">  
				<div class="owl-carousel owl-theme default-carousel fables-sqr-nav dots-0 wow fadeInUpBig" data-wow-duration="2s">
					<?php
						foreach ($slider as $key => $value) :
					?>
					<div>
						<h1 class="white-color bold-font mt-lg-5 mb-4"><?=$value['judul'];?><br> 
						</h1>  
						<p class="fables-third-text-color mt-3 mb-5 light-font fables-header-slider-details">
							<?=strip_tags($value['deskripsi']);?> 
						</p>
						<a href="<?=$value['link'];?>" class="btn fables-second-border-color white-color rounded-0 px-md-4 py-2 fables-second-hover-background-color"><?=$value['textlink'];?></a>  
					</div> 
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php endif;?>			
		