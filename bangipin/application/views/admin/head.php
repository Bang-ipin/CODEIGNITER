<!DOCTYPE html>
<html lang="id" class="no-js">
	<head>
		<meta charset="utf-8"/>
		<title><?=$title;?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta content="<?=$author;?>" name="author"/>
		<link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>"/>
		<link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/plugins/fancybox/source/jquery.fancybox.css');?>" rel="stylesheet" media="screen" />
		<?php 
			if(isset($css)){
				echo $css;
			}
		?>
		<link href="<?=base_url('assets/admin/css/components-md.css');?>" id="style_components" rel="stylesheet"/>
		<link href="<?=base_url('assets/admin/css/plugins-md.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('assets/admin/css/layout.css');?>" rel="stylesheet"/>
		<link href="<?=base_url('assets/admin/css/themes/white.css');?>" rel="stylesheet" id="style_color" />
		<link href="<?=base_url('assets/admin/css/custom.css');?>" rel="stylesheet"/>
	</head>
	<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
		