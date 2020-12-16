				 
			<div class="fables-header fables-after-overlay bg-rules">
				<div class="container"> 
					 <h2 class="fables-page-title fables-second-border-color wow fadeInLeft" data-wow-duration="1.5s"><?=$title;?></h2>
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
				 <div class="row my-4 my-lg-5">
					  <div class="col-12 col-lg-8">
						<h1 class="h2">Tag for <em>"<?=$title;?>"</em></h1>
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
												<img class='lazy' data-src=".base_url('files/media/'.$post['gambar'].'')."  alt='".strip_tags($post['judul_blog'])."' /></a>";
								}else{
									$gambar = "<a href=".base_url('assets/public/img/no-image.jpg')." class='w-100 fancy-view'>
												<img class='img-responsive lazy'  data-src=".base_url('assets/public/img/no-image.jpg')." alt='".strip_tags($post['judul_blog'])."' ></a>";
									}
								
							?>
							<div class="mb-4 mb-lg-5 wow fadeIn" data-wow-delay=".3s">
								<div class="row">
									<div class="col-12 col-sm-5">
										<div class="image-container zoomIn-effect">
											<?=$gambar;?>
											<span class="above-date position-absolute text-center fables-second-background-color white-color px-3 py-2">
												<span class="bold-font day"><?=ambiltglblog($post['tgl_posting']);?></span>  <span class="month d-block"><?=ambilbulanblog($post['tgl_posting']);?></span>
											</span>
										</div>
									</div>
									<div class="col-12 col-sm-7">
										<h2 class="font-18 semi-font mt-3 mt-sm-0 mb-2"><a href="<?=site_url('blog/'.$post['kategori'].'/'.strip_tags($post['judul_seo']));?>" class="fables-main-text-color fables-second-hover-color"><?php echo strip_tags($post['judul_blog']);?></a></h2>
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
										<div class="fables-forth-text-color font-14 my-2">                                  
											<span class="fables-iconuser fables-second-text-color mr-1"></span> 
											<span class="mr-3"> <?php echo $post['posting'];?>
											<span class="fables-icondata fables-second-text-color mr-1"></span>
											<span class="mr-3"> <span><?php echo strip_tags($post['kategori']);?></span></span>
											<span class="fables-iconcomment fables-second-text-color mr-1"></span> 
											<a href="" class="fables-forth-text-color fables-second-hover-color position-relative z-index"><?=$komentarid;?> Komentar</a> 
										</div>
										<p class="fables-forth-text-color font-14 mb-3">
											<?=strip_tags(character_limiter($post['isi']),5000);?>
										</p>
										<a href="<?=site_url('blog/'.$post['kategori'].'/'.strip_tags($post['judul_seo']));?>" class="btn fables-second-text-color underline fables-main-hover-text-color p-0 fables-main-hover-color">Read More</a>
									</div>
								</div>
							</div>
						  <?php endforeach; ?>
						  <?php echo $pagination; ?>
						</div>
						<div class="col-12 col-lg-4">
							<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-format="fluid"
                                 data-ad-layout-key="-fb+5w+4e-db+86"
                                 data-ad-client="ca-pub-2393340186290964"
                                 data-ad-slot="7670393732"></ins>
                            <script>
                                 (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
							<div class="mt-4">
								<h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Kategori</h2>
								<?php 
								$kat=$this->db->query("SELECT * FROM kategori ORDER BY id ASC");
								if($kat->num_rows() > 0){ ?>
								<ul class="nav fables-blog-cat-list fables-forth-text-color fables-second-hover-color-link">
									<?php 
									foreach ($kat->result_array() as $rows):
									echo "<li><a href=".site_url('blog/'.$rows['kategori_seo']).">".$rows['kategori']."</a></li>";
									endforeach;
									?>
								</ul>
								<?php } ?>
								<hr>
							</div>
							<div class="mt-4">
								<h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Artikel Terbaru</h2> 
								<div class="row">
									<?php 
									$new=$this->db->query("SELECT * FROM blog ORDER BY id DESC limit 5");
									if($new->num_rows() > 0){ ?>
									 <?php foreach ($new->result_array() as $data): ?>
									<div class="col-12 col-md-6 col-lg-12">
										<div class="row mb-4">
											<div class="col-4">
												<a href="<?=site_url('blog/'.$data['kategori'].'/'.$data['judul_seo'].'')?>"><img class='lazy img-fluid w-100' data-src="<?=base_url('files/thumbnail/'.$data['gambar'].'');?>" alt="<?=$data['judul_blog'];?>"></a>
											</div>
											<div class="col-8 pl-0">
												<a href="<?=site_url('blog/'.$data['kategori'].'/'.$data['judul_seo'].'')?>" class="fables-main-text-color bold-font fables-second-hover-color"><?=$data['judul_blog'];?></a>
												<p class="fables-forth-text-color fables-blog-date-cat font-14 mt-1"><span class="fables-iconcalender fables-second-text-color mr-1"></span> <?=converttgl($data['tgl_posting']);?></p>
											</div>
										</div>
									</div>  
								   <?php endforeach;?>
								   <?php } ?>
							   </div>
							   <div class="text-right">
								   <a href="<?=site_url('semua-artikel');?>" class="btn fables-second-text-color underline fables-main-text-color font-14"> More</a>
							   </div>
							   <hr>
							</div>
							<div class="mt-4">
								<h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Tages</h2>
								<ul class="nav fables-blog-cat-list fables-forth-text-color fables-second-hover-color-link fables-blog-cat-tags">
									<?php 
										$tag=$this->db->query("SELECT * FROM tags ORDER BY id DESC limit 15");
										if($tag->num_rows() > 0){ 
											foreach ($tag->result_array() as $data):
												echo "<li><a href='".site_url('tag/'.$data['tag_seo'])."'>".$data['tag']."</a></li>";
											endforeach;
										}
									?>
								</ul> 
							</div>
						</div>
					</div>   
				</div>
			   