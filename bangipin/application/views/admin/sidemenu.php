		<div class="page-container">
			<div class="page-sidebar-wrapper">
				<div class="page-sidebar navbar-collapse collapse">
					<ul class="page-sidebar-menu page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top:0px">
						<li class="nav-item start active open">
							<a href="<?=site_url('appweb/home');?>" class="nav-link nav-toggle">
								<i class="fa fa-home"></i>
								<span class="title">Beranda</span>
								 <span class="selected"></span>
							</a>
						</li>
										
						<li class="nav-item">
							<a href="<?php echo site_url('appweb/menu');?>" class="nav-link">
								<i class="fa fa-list"></i>
								<span class="title">Menu</span>
							</a>
						</li>
						<li>
							<a href="javascript:;" class="nav-link nav-toggle">
								<i class="fa fa-list"></i>
								<span class="title">Modul</span>
								<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
							    <li class="nav-item">
									<a href="<?=site_url('appweb/modul');?>" class="nav-link">
										<span class="title">Modul</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('appweb/sliders');?>" class="nav-link">
										<span class="title">Slider</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('appweb/ads');?>" class="nav-link">
										<span class="title">Iklan</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('appweb/pages');?>" class="nav-link">
								<i class="fa fa-file"></i>
								<span class="title">Pages</span>
							</a>
						</li>
						<li>
							<a href="javascript:;" class="nav-link nav-toggle">
								<i class="fa fa-list"></i>
								<span class="title">Laman Statis</span>
								<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li class="nav-item">
									<a href="<?=site_url('appweb/linkhome');?>" class="nav-link">
										<span class="title">Home</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('appweb/linkfeatures');?>" class="nav-link">
										<span class="title">Fitur</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('appweb/linkapp');?>" class="nav-link">
										<span class="title">App</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('appweb/linkvideo');?>" class="nav-link">
										<span class="title">Video</span>
									</a>
								</li>
                            	<li class="nav-item">
									<a href="<?=site_url('appweb/linkabout');?>" class="nav-link">
										<span class="title">About</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('appweb/linkfaq');?>" class="nav-link">
										<span class="title">FAQ</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('appweb/categories');?>" class="nav-link">
								<i class="fa fa-files-o"></i>
								<span class="title">Kategori</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('appweb/articles');?>" class="nav-link">
								<i class="fa fa-files-o"></i>
								<span class="title">Blog</span>
							</a>
						</li>
						<?php
							$t = "SELECT count(*) as jml FROM komentar WHERE dibaca=0 AND status=0";
							$d = $this->db->query($t);
							$r = $d->num_rows();
							if($r > 0){
								foreach($d->result() as $h){
									$komentarbelumterbuka = $h->jml;
								}
							}else{
								$komentarbelumterbuka = 0;
							}
						?>
						<li class="nav-item">
							<a href="<?php echo site_url('appweb/comments');?>" class="nav-link">
								<i class="fa fa-comments-o"></i>
								<span class="title">Komentar <?php if(!empty($komentarbelumterbuka)){
									echo "<span class='badge badge-danger'>".$komentarbelumterbuka."</span>"; 
								} ?></span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('appweb/tags');?>" class="nav-link">
								<i class="fa fa-tag"></i>
								<span class="title">Tag</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('assets/filemanager/dialog.php?type=0&fldr=');?>" class="nav-link fancy ">
								<i class="fa fa-camera"></i>
								<span class="title">Media</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('appweb/gallery');?>" class="nav-link">
								<i class="fa fa-image"></i>
								<span class="title">Gallery</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('appweb/testimoni');?>" class="nav-link">
								<i class="fa fa-comments-o"></i>
								<span class="title">Testimoni</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('appweb/downloads');?>" class="nav-link nav-toggle">
								<i class="fa fa-cloud-download"></i>
								<span class="title">Download</span>
							</a>
						</li>
						<li class="nav-item">
							<li class="nav-item">
								<a href="<?=site_url('appweb/maps');?>" class="nav-link">
									<i class="fa fa-map-marker"></i>
									<span class="title">Maps</span>
								</a>
							</li>
						</li>
						<li class="nav-item">
							<li class="nav-item">
								<a href="<?=site_url('appweb/fanpage');?>" class="nav-link">
									<i class="fa fa-facebook"></i>
									<span class="title">Fanpage FB</span>
								</a>
							</li>
						</li>
						<li class="nav-item">
							<a href="javascript:;" class="nav-link nav-toggle">
								<i class="fa fa-gears"></i>
								<span class="title">System</span>
								<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li class="nav-item">
									<a href="<?=site_url('appweb/config');?>" class="nav-link">
										<span class="title">Pengaturan</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('appweb/config/logo');?>" class="nav-link">
										<span class="title">Logo</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('appweb/backupdb');?>" class="nav-link">
										<span class="title">Backup DB</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('appweb/user');?>" class="nav-link">
								<i class="fa fa-users"></i>
								<span class="title">User</span>
								<span class="arrow"></span>
							</a>
						</li>
							<li class="nav-item">
							<a href="<?=site_url('appweb/visitor');?>" class="nav-link">
								<i class="fa fa-line-chart"></i>
								<span class="title">Visitor</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
								<i class="fa fa-home"></i>
								<a href="<?=site_url('appweb/home');?>">Home</a>
							</li>
						</ul>
						<div class="page-toolbar">
							<div id="jam"></div>
						</div>
					</div>
					<h3 class="page-title">
						Dashboard <small> dashboard & statistics </small>
					</h3>
					<div class="clearfix"></div>
					<?php if($this->session->flashdata('SUCCESSMSG')) { ?>
						<div role="alert" class="alert alert-success">
							<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
							<strong>Sukses!</strong>
							<?=$this->session->flashdata('SUCCESSMSG')?>
						</div>
					<?php } ?>
					<?php if($this->session->flashdata('GAGALMSG')) { ?>
						<div role="alert" class="alert alert-danger">
							<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
							<?=$this->session->flashdata('GAGALMSG')?>
						</div>
					<?php } ?>
					<?php echo $this->session->flashdata('error') ?>
					<?php
						if(isset($content)){
							echo $content;
						}
					?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>