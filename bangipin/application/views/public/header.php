<!DOCTYPE html>
<!-- Markup microdata ditambahkan oleh Pemandu Markup Data Terstruktur Google. -->
<html lang="id">
	<head>
	    <title><?php if(!empty($slogan)){echo character_limiter(ucwords($slogan).' - '.$title,80);}else{echo $title;}?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta content="<?=$meta_deskripsi;?>" name="description">
		<meta content="<?=$meta_keyword;?>" name="keywords">
		<meta content="<?=$author;?>" name="author">
		<meta name="robots" content="all">
		<meta property="og:site_name" content="<?=$situs;?>">
		<meta property="og:description" content="<?=$meta_deskripsi;?>">
		<meta property="og:type" content="website">
		<meta property="og:image" content="<?=$situs;?>">
		<meta property="og:url" content="<?=$website;?>">
		<link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>">
		<link href="<?=base_url('assets/public/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/public/css/animate.min.css');?>" rel="stylesheet" >
	    <link href="<?=base_url('assets/public/css/bootstrap-4-navbar.css');?>" rel="stylesheet" >
		<link href="<?=base_url('assets/public/css/owl.carousel.min.css');?>" rel="stylesheet" >
		<link href="<?=base_url('assets/public/css/owl.theme.default.min.css');?>" rel="stylesheet" >
		<link href="<?=base_url('assets/public/css/range-slider.css');?>" rel="stylesheet"  >
		<link href="<?=base_url('assets/public/css/menu_sideslide.css');?>" rel="stylesheet" >
		<?php if(isset($css)){echo $css;}?>
		<link href="<?=base_url('assets/public/css/custom.css');?>" rel="stylesheet"  media="all">
		<link href="<?=base_url('assets/public/css/custom-responsive.css');?>" rel="stylesheet" >
		<link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" >
		<link href="<?=base_url('assets/public/css/fables-icons.css');?>" rel="stylesheet" >
		<meta name="google-site-verification" content="HpfBBptbjcgWGY6riEJK9Xxx1-Xa-RjAQkEMdnIoo94" />
		<meta name="msvalidate.01" content="62CD313456FFC4EA37F7C4F9B408864B" />
		<meta name="yandex-verification" content="33046ee613b98326" />
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135044730-1"></script>
        <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-135044730-1');</script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: "ca-pub-2393340186290964",enable_page_level_ads: true});</script>
	</head>

	<body>
		<div class="search-section">
			<a class="close-search" href="#"></a>
			<div class="d-flex justify-content-center align-items-center h-100">
				<form method="post" action="<?=site_url('cari');?>" class="w-50">
					<div class="row">
						<div class="col-10">
							<input type="search" value="" name="keyblog" class="form-control palce bg-transparent border-0 search-input" placeholder="Search Here ..." /> 
						</div>
						<div class="col-2 mt-3">
							 <button type="submit" class="btn bg-transparent text-white"> <i class="fa fa-search"></i> </button>
						</div>
					</div>
				</form>
			</div>	 
		</div>
		<div class="fables-navigation fables-main-background-color py-3 py-lg-0">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-10 col-lg-10 pr-md-0">                       
						<nav class="navbar navbar-expand-md btco-hover-menu py-lg-2">
                            <?php if(empty($logo)){?>
							<a class="navbar-brand pl-0" href="<?=site_url();?>"><?=$situs;?></a>
							<?php }else{?>
							<a class="navbar-brand pl-0" href="<?=site_url();?>"><img src="<?=base_url('files/media/'.$logo.'');?>" alt="<?=$situs;?>" width="150" height="40" class="fables-logo"/></a>
							<?php } ?>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fablesNavDropdown" aria-controls="fablesNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fables-iconmenu-icon text-white font-16"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="fablesNavDropdown"> 
                                <ul class="navbar-nav mx-auto fables-nav">   
                                    <?php 
									$menulib= new menu_lib();
									$query= $menulib->getPrimaryMenu();
									foreach ($query->result_array() as $menu) : 
									$menu_id=$menu['id_menu'];
									$child_satu = $menulib->getMenuChild($menu_id);
									if($child_satu->num_rows() == 0){ ?>
									<li class="nav-item">
										<?php if($menu['opsi']==1){ ?>
											<a href="<?=$website.'/'.$menu['url'];?>" class="nav-link"><?=$menu['nama_menu'];?></a>
										<?php }else{ ?>
											<a href="<?=$menu['url'];?>" class="nav-link"><?=$menu['nama_menu'];?></a>
										<?php } ?>
									</li>
									<?php }else{ ?>
									<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="sub-nav2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?=ucwords($menu['nama_menu']);?>
                                        </a>
										<?php if($menulib->getMenuChild($menu_id)) : ?>
                                        <ul class="dropdown-menu" aria-labelledby="sub-nav2">
                                            <?php 
											$child_satu = $menulib->getMenuChild($menu_id);
											foreach ($child_satu->result_array() as $child1) :
											$menu_id2=$child1['id_menu'];
											$child_dua = $menulib->getMenuChild($menu_id2);
											if($child_dua->num_rows() == 0){
											?>
											<li class="nav-item">
												<?php if($child1['opsi']==1){ ?>
													<a href="<?=$website.'/'.$child1['url'];?>" class="dropdown-item"><?=ucwords($child1['nama_menu']);?></a>
												<?php }else{ ?>
													<a href="<?=$child1['url'];?>" class="dropdown-item"><?=ucwords($child1['nama_menu']);?></a>
												<?php } ?>
											</li>
											<?php }else{ ?>
											<li><a class="dropdown-item dropdown-toggle" href="#"><?=ucwords($child1['nama_menu']);?></a>
                                                <?php if($menulib->getMenuChild($menu_id2)) : ?>
												<ul class="dropdown-menu"> 
													<?php 
													$child_dua = $menulib->getMenuChild($menu_id2);
													foreach ($child_dua->result_array() as $child2) : ?>
                                                    <?php if($child2['opsi']==1){ ?>
														<a href="<?=$website.'/'.$child2['url'];?>" class="dropdown-item"><?=ucwords($child2['nama_menu']);?></a>
													<?php }else{ ?>
														<a href="<?=$child2['url'];?>" class="dropdown-item"><?=ucwords($child2['nama_menu']);?></a>
													<?php } ?>
													<?php endforeach;?>
												</ul>
												<?php endif;?>
                                            </li>
											<?php } endforeach;?>
										</ul>
										<?php endif;?>
									</li>
									<?php } endforeach;?>
                                </ul> 
							</div>
						</nav>
					</div>
					<div class="col-12 col-md-2 col-lg-2 pr-md-0 icons-header-mobile">
                    	<div class="fables-header-icons">
							<a href="#" class="open-search fables-third-text-color right  top-header-link px-3 px-md-2 px-lg-4 fables-second-hover-color border-0 max-line-height">
								<span class="fa fa-search"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div> 
