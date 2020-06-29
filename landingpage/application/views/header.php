<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
   <!--====== TITLE TAG ======-->
    <title><?php if(!empty($slogan)){echo character_limiter(ucwords($title).'&nbsp;-&nbsp;'.$slogan,80);}else{echo $title;}?></title>
	 <!--====== USEFULL META ======-->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$meta_deskripsi;?>" />
    <meta name="keywords" content="<?=$meta_keyword;?>" />
	<meta name="author" content="<?=$author;?>" >
	<!--====== PROPERTY ======-->
	<meta property="og:site_name" content="<?=$situs;?>">
	<meta property="og:title" content="<?=$slogan;?>">
	<meta property="og:description" content="<?=$deskripsi_web;?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?=$situs;?>">
	<meta property="og:url" content="<?=$website;?>">

    <!--====== FAVICON ICON =======-->
	<link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>">

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/normalize.css');?>">
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/animate.css');?>">
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/modal-video.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/stellarnav.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/owl.carousel.css');?>">
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/slick.css');?>">
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/bootstrap.min.css');?>" >
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/font-awesome.min.css');?>" >
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/material-icons.css');?>" >

    <!--====== MAIN STYLESHEETS ======-->
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/style.css');?>" >
    <link rel="stylesheet" href="<?=base_url('asset/frontend/css/responsive.css');?>" >

    <script src="<?=base_url('asset/frontend/js/vendor/modernizr-2.8.3.min.js');?>"></script>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="home-one" data-spy="scroll" data-target=".mainmenu-area" data-offset="90">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area" id="home">
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <?php if (empty($logo)){?>
								<a href="#home" class="navbar-brand"><?=$situs;?></a>
							<?php }else{?>
								<a href="#home" class="navbar-brand"><img src="<?=base_url('files/media/'.$logo.'');?>" alt="logo"></a>
							<?php } ?>
                        </div>
                        <div id="main-nav" class="stellarnav">
                            <!--<div class="search-and-signup-button white pull-right hidden-md hidden-sm hidden-xs">
                                <button data-toggle="collapse" data-target="#search-form-switcher"><i class="fa fa-search"></i></button>
                                <a href="#" class="sign-up">SignUp</a>
                            </div>
							-->
                            <ul id="nav" class="nav">
                                <li class="active"><a href="#home">Home</a></li>
                                <li><a href="#features">Fitur</a></li>
                                <li><a href="#app">App</a></li>
                                <li><a href="#video">Video</a></li>
                                <li><a href="#gallery">Galeri</a></li>
                                <li><a href="#testimoni">Testimoni</a></li>
                                <li><a href="#contact">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
            </div>
            <!--END MAINMENU AREA END-->
        </div>