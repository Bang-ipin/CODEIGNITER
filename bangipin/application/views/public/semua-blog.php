<div class="container py-4 py-lg-5"> 
    <div class="fables-blog my-3">
       <h2 class="fables-second-text-color mb-4 mb-lg-5 font-weight-bold">Blog</h2> 
		<div class="row"> 
			<?php 
			if(!$jmlhpage){
				$no=0;
			}
			else{
				$no=$jmlhpage;
			}
			foreach($datablog as $post):
			date_default_timezone_set('Asia/Jakarta');
			$no++;
			if (!empty($post['gambar'])){
					$gambar = "<a href=".base_url('files/media/'.$post['gambar'].'')." class='w-100 fancy-view'>
								<img class='lazy' data-src=".base_url('files/media/'.$post['gambar'].'')."  alt='".strip_tags($post['judul_blog'])."' style='width:350px;height:210px' />";
				}else{
					$gambar = "<a href=".base_url('assets/public/img/no-image.jpg')." class='w-100 fancy-view'>
								<img class='lazy img-responsive'  data-src=".base_url('files/images/no-image.jpg')." alt='".strip_tags($post['judul_blog'])."' style='width:350px;height:210px'>";
					}
				
			?>
			<!-- anywhere -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-2393340186290964"
                 data-ad-slot="6330223027"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script> 
            <div class="col-12 col-md-4 mb-4 mb-lg-5">
			    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <div class="position-relative"> 
					<?=$gambar;?>
					<span class="above-date position-absolute text-center fables-second-background-color white-color px-3 py-2">
						<span class="bold-font day"><?=ambiltglblog($post['tgl_posting']);?></span>  <span class="month d-block"><?=ambilbulanblog($post['tgl_posting']);?></span>
					</span>
				</div>
				<?php 
					$t = "SELECT count(*) as jml FROM komentar WHERE blogid='$post[id]'";
					$d = $this->db->query($t);
					$r = $d->num_rows();
					if($r > 0){
						foreach($d->result() as $h){
							$komentarid = $h->jml;
						}
					}else{
							$komentarid = 0;
					}
				?>
				<div class="above-date py-3 fables-fifth-text-color">
					<div class="float-left font-13">
						 <span class="fables-iconuser"></span> <?php echo $post['posting'];?>, <span><?php echo strip_tags($post['kategori']);?></span>  
					</div> 
					<div class="float-right font-13">
					   <span class="fa fa-comments"></span> <?=$komentarid;?> Komentar  
					</div>
				</div>
				<h2 class="font-weight-bold font-20 my-3"><a href="#" class="fables-second-text-color fables-main-hover-color"><?php echo strip_tags($post['judul_blog']);?></a></h2>
				<p class="fables-forth-text-color font-14 mb-2">
					<?=strip_tags(character_limiter($post['isi']),5000);?>
				</p>
				<a href="<?=site_url('blog/'.$post['kategori'].'/'.strip_tags($post['judul_seo']));?>" class="btn fables-second-text-color fables-main-hover-color p-0 mt-2">
					<span class="underline">Read More</span>
					<span class="fables-iconarrow-light ml-2"></span>
				</a>  
			</div>
			<?php endforeach; ?>
		</div>
		<?php echo $pagination; ?>		
    </div>
</div>