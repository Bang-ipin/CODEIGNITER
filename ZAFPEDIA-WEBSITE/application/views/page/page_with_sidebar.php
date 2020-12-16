<main id="blog" class="inner-bottom-xs">
	<div class="container">
		<div class="row">
			
			<div class="col-md-9 col-sm-9 margin-bottom-25">
				<div class="content-page">
					<h1 class="section-title"><?=$title;?></h1>
						<?php if (isset($konten)){
							echo $konten;
							}
						?>
				</div>
			</div>
			
			<div class="col-md-3">
				<aside class="sidebar blog-sidebar">
					<div class="widget clearfix">
						<div class="body">
							<form action="<?=site_url('cari');?>" method="post" role="search" class="search-form">
								<div class="form-group">
									<label class="sr-only" for="page-search">Type your search here</label>
									<input id="page-search" class="search-input form-control" type="search" name="keyblog" placeholder="Enter Keywords...">
								</div>
								<button class="page-search-button">
									<span class="fa fa-search">
										<span class="sr-only">Search</span>
									</span>
								</button><!-- /.page-search-button-->
							</form><!-- /.search-form -->
						</div>
					</div><!-- /.widget -->

					<div class="widget">
						<h4>Categories</h4>
						<div class="body">
							<?php 
							$kat=$this->db->query("SELECT * FROM kategori ORDER BY id ASC");
							if($kat->num_rows() > 0){ ?>
							<ul class="le-links">
							<?php 
								foreach ($kat->result_array() as $rows):
								$ktgr=$rows['kategori_seo'];
								$count= $this->db->query("SELECT * FROM blog WHERE kategori='$ktgr'")->num_rows();
								echo "<li><a href=".site_url('blog/'.$rows['kategori_seo']).">".$rows['kategori']." <span class='badge badge-info'>".$count."</span></a></li>";
								endforeach;
								?>
							</ul>
							<?php } ?>
						</div>
					</div><!-- /.widget -->

					<div class="widget">
						<div class="simple-banner">
							<a href="#"><img alt="" class="img-responsive" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/banners/banner-simple.jpg');?>" /></a>
						</div>
					</div>

					<!-- ========================================= RECENT POST ========================================= -->
					<div class="widget">
						<h4>Recent Posts</h4>
						<div class="body">
						<?php 
						$new=$this->db->query("SELECT * FROM blog ORDER BY id DESC limit 5");
						if($new->num_rows() > 0){ ?>
							<ul class="recent-post-list">
								<?php foreach ($new->result_array() as $data): ?>
								<li class="sidebar-recent-post-item">
									<div class="media">
										<a href="#" class="thumb-holder pull-left">
											<img alt="<?=$data['judul_blog'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/thumbnail/'.$data['gambar'].'');?>" />
										</a>
										<div class="media-body">
											<h5><a href="<?=site_url('blog/'.$data['kategori'].'/'.$data['judul_seo'].'')?>"><?=$data['judul_blog'];?></a></h5>
											<div class="posted-date"><?=converttgl($data['tgl_posting']);?></div>
										</div>
									</div>
								</li><!-- /.sidebar-recent-post-item -->
								<?php endforeach;?>
							</ul><!-- /.recent-post-list -->
							<?php } ?>
						</div><!-- /.body -->
					</div><!-- /.widget -->
					<!-- ========================================= RECENT POST : END ========================================= -->

					<div class="widget">
						<h4>Popular Tags</h4>
						<div class="body">
							<div class="tagcloud">
								<ul>
									<?php 
										$tag=$this->db->query("SELECT * FROM tags ORDER BY id DESC limit 15");
										if($tag->num_rows() > 0){ 
											foreach ($tag->result_array() as $data):
												echo "<li><a href='".site_url('tag/'.$data['tag_seo'])."'><i class='fa fa-tags'></i>".$data['tag']."</a></li>";
											endforeach;
										}
									?>
								</ul>
							</div><!-- /.tagcloud -->
						</div><!-- /.body -->
					</div><!-- /.widget -->
				</aside><!-- /.sidebar .blog-sidebar -->
			</div>
		</div>
	</div>
</div>