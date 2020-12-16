<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8"/>
		<title><?=$title;?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta content="<?=$author;?>" name="author"/>
		<link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>"/>
		<link href="<?=base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/global/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/global/plugins/fancybox/jquery.fancybox.css');?>" rel="stylesheet" media="screen" />
		<?php 
			if(isset($css)){
				echo $css;
			}
		?>
		<link href="<?=base_url('assets/global/css/components.min.css');?>" id="style_components" rel="stylesheet"/>
		<link href="<?=base_url('assets/global/css/plugins.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('assets/admin/layout/css/layout.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('assets/admin/layout/css/themes/blue.css');?>" rel="stylesheet" type="text/css" id="style_color" />
		<link href="<?=base_url('assets/admin/layout/css/custom.css');?>" rel="stylesheet" type="text/css"/>
	</head>
	<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
		