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
						<h1 class="section-title"><?=$title;?></h1>
						<?php if (isset($konten)){
							echo $konten;
							}
						?>	
					</div>
					<div class="col-12 col-lg-4">
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
							<h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Artikel Terbaru</h2> 
							<div class="row">
								<?php 
								$new=$this->db->query("SELECT * FROM blog WHERE status='1' ORDER BY id DESC limit 5");
								if($new->num_rows() > 0){ ?>
								 <?php foreach ($new->result_array() as $data): ?>
								<div class="col-12 col-md-6 col-lg-12">
									<div class="row mb-4">
										<div class="col-4">
											<a href="<?=site_url('blog/'.$data['kategori'].'/'.$data['judul_seo'].'')?>"><img data-src="<?=base_url('files/thumbnail/'.$data['gambar'].'');?>" alt="<?=$data['judul_blog'];?>" class="lazy img-fluid w-100"></a>
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
							<h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Topik</h2>
							<ul class="nav fables-blog-cat-list fables-forth-text-color fables-second-hover-color-link fables-blog-cat-tags">
								<?php 
									$tag=$this->db->query("SELECT * FROM tags ORDER BY id DESC");
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
				
