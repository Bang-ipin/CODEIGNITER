<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8"/>
		<title><?=$title;?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta content="<?=$author;?>" name="author"/>
		<link href="<?=base_url('asset/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
		<link href="<?=base_url('asset/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
		<link href="<?=base_url('asset/global/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css">
		<link href="<?=base_url('asset/global/plugins/fancybox/source/jquery.fancybox.css');?>" rel="stylesheet" type="text/css" media="screen" />
		<?php 
			if(isset($css)){
				echo $css;
			}
		?>
		<link href="<?=base_url('asset/global/css/components.min.css');?>" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/global/css/plugins.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/admin/layout/css/layout.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/admin/layout/css/themes/blue.css');?>" rel="stylesheet" type="text/css" id="style_color" />
		<link href="<?=base_url('asset/admin/layout/css/custom.css');?>" rel="stylesheet" type="text/css"/>
		<link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>"/>
	</head>
	<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
		<div class="page-header -i navbar navbar-fixed-top">
			<div class="page-header-inner">
				<div class="page-logo">
					<?php if(empty($logo)){?>
					<a href="<?=site_url('administrator/home');?>">
						<h4><span><?=$situs;?></span></h4>
					</a>
					<?php }else{?>
					<a>
						<img src="<?=base_url('files/media/'.$logo.'');?>" alt="<?=$title;?>" width="100" height="40" class="logo-default"/>
					</a>
					<?php } ?>
					<div class="menu-toggler sidebar-toggler"></div>
				</div>
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown dropdown-web">
							<a href="<?=site_url();?>" title="Lihat Website" target="_blank" class="dropdown-toggle" data-hover="dropdown">
								<i class="fa fa-eye"></i>
							</a>
						</li>
						<?php
							$t = "SELECT count(*) as jml FROM kontak WHERE status=0";
							$d = $this->db->query($t);
							$r = $d->num_rows();
							if($r > 0){
								foreach($d->result() as $h){
									$pesanbelumterbuka = $h->jml;
								}
							}else{
								$pesanbelumterbuka = 0;
							}
							?>
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
							<a href="javascript:;" title="Inbox" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<?php if (!empty($pesanbelumterbuka)){
									echo "<i class='fa fa-inbox'></i>";
								}else{
									echo "<i class='fa fa-envelope'></i>";
								}
								?>
								<?php if(!empty($pesanbelumterbuka)){
								echo "<span class='badge badge-default'>".$pesanbelumterbuka."</span>"; 
								}?>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>You have <span class="bold"><?php if(!empty($pesanbelumterbuka)){echo $pesanbelumterbuka;}?> New</span> Messages</h3>
									<a href="<?=site_url('administrator/inbox');?>">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<?php $sql=$this->db->query('SELECT * FROM kontak WHERE status=0 order by tanggal DESC');
										if($sql->num_rows() > 0){
											foreach($sql->result_array() as $inb){ 
											date_default_timezone_set('Asia/Jakarta');
											$date=date('d F , H:i',strtotime($inb['tanggal']));
											?>
										<li>
											<a href="<?=site_url('administrator/inbox');?>" data-messageid="<?=$inb['id'];?>">
												<span class="photo">
													<img src="<?=base_url('asset/admin/layout/img/avatars.jpg');?>" class="img-circle" alt="">
												</span>
												<span class="subject">
													<span class="from">
													<?=$inb['nama'];?> </span>
													<span class="time"><?=$date;?>&nbsp;WIB</span>
												</span>
												<span class="message">
													<?php 
														$text = $inb['pesan'];
														echo character_limiter($text,20);
													?> 
												</span>
											</a>
										</li>
									<?php } } ?>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<span class="username username-hide-on-mobile">
								<?php echo $this->session->userdata('nama_lengkap');?> </span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="<?=site_url('administrator/logout');?>" title="Keluar">
										<i class="fa fa-sign-out"></i> Keluar
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="page-container">
			<div class="page-sidebar-wrapper">
				<div class="page-sidebar navbar-collapse collapse">
					<ul class="page-sidebar-menu page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
						<li class="nav-item start active open">
							<a href="<?=site_url('administrator/home');?>" class="nav-link nav-toggle">
								<i class="fa fa-home"></i>
								<span class="title">Beranda</span>
								 <span class="selected"></span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/landingpage-home');?>" class="nav-link">
								<i class="fa fa-camera"></i>
								<span class="title">Intro</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/landingpage-features');?>" class="nav-link">
								<i class="fa fa-file"></i>
								<span class="title">Features</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/landingpage-app');?>" class="nav-link">
								<i class="fa fa-android"></i>
								<span class="title">App</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/landingpage-video');?>" class="nav-link">
								<i class="fa fa-film"></i>
								<span class="title">Video</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/landingpage-gallery');?>" class="nav-link">
								<i class="fa fa-briefcase"></i>
								<span class="title">Portofolio</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/landingpage-testimoni');?>" class="nav-link">
								<i class="fa fa-comments"></i>
								<span class="title">Testimoni</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/inbox');?>" class="nav-link">
								<i class="fa fa-inbox"></i>
								<span class="title">Inbox</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('asset/filemanager/dialog.php?type=0&fldr=');?>" class="nav-link fancy ">
								<i class="fa fa-camera"></i>
								<span class="title">Media</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/config/logo');?>" class="nav-link">
								<i class="fa fa-image"></i>
								<span class="title">Logo</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/user');?>" class="nav-link">
								<i class="fa fa-user"></i>
								<span class="title">User</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('administrator/config');?>" class="nav-link">
								<i class="fa fa-gear"></i>
								<span class="title">Pengaturan</span>
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
								<a href="<?=site_url('administrator/home');?>">Home</a>
							</li>
						</ul>
						<div class="page-toolbar">
							<div id="jam"></div>
						</div>
					</div>
					<h3 class="page-title">
						Dashboard <small>dashboard & statistics</small>
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
					<?php echo $this->session->flashdata('error');?>
					<?php
						if(isset($content)){
							echo $content;
						}
					?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner">
				 2014 - <?php date_default_timezone_set('Asia/Jakarta');
				 echo date('Y');?> &copy; by Bangunjiwo Desain Web .
			</div>
			<div class="scroll-to-top">
				<i class="fa fa-arrow-up"></i>
			</div>
		</div>
		
		<script src="<?=base_url('asset/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery-ui/jquery-ui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery.cokie.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/uniform/jquery.uniform.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/fancybox/source/jquery.fancybox.pack.js');?>" type="text/javascript" ></script>
		<?php 
			if(isset($js)){
				echo $js;
			}
		?>
<script src="<?=base_url('asset/global/scripts/metronic.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/admin/layout/scripts/layout.js');?>" type="text/javascript"></script>
		<?php 
			if(isset($script)){
				echo $script;
			}
		?>
		
	</body>
</html>