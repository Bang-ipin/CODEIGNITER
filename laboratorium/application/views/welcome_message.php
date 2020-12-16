<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $judul; ?></title>

<link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?=base_url();?>asset/css/fonts/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>asset/css/web.css" rel="stylesheet"  type="text/css" />
<script src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>asset/js/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">

button {margin: 0; padding: 0;}

button {margin: 2px; position: relative; padding: 4px 4px 4px 2px; 

cursor: pointer; float: left;  list-style: none;}

button span.ui-icon {float: left; margin: 0 4px;}

</style>

</head>

<body>

	<div class="blok_header">

		<div class="header">

		  <div class="logo">

		  <a href="<?php echo base_url();?>index.php/home">

		  <img src="<?php echo base_url();?>asset/img/laboratorium.jpg" width="71" height="71" border="0" alt="logo" /></a>

		  </div>

		  <div class="judul">

		  <h1><?php echo $instansi;?></h1>

		  <p>Alamat : <?php echo $alamat_instansi;?></p>

		  </div>

		  <div class="clr"></div>

		</div>

		<div class="clr"></div>   

	</div>              

	<div class="container">
		<fieldset>
			<h1 class="text-center">Menu Utama</h1>

				<div class="row">
			
					<!--team-1-->
					<div class="col-sm-3">
						<div class="our-team-main">
			
							<div class="team-front">
								<a href="#">
									<img src="<?=base_url();?>asset/img/igd.jpg" class="img-fluid" style="width:90px;height:90px;" />
									<h3>IGD</h3>
								</a>
							</div>
						</div>
					</div>
					<!--team-1-->
					<!--team-2-->
					<div class="col-sm-3">
						<div class="our-team-main">
			
							<div class="team-front">
								<a href="#">
									<img src="<?=base_url();?>asset/img/poligigi.jpg" class="img-fluid" style="width:90px;height:90px;" />
									<h3>Poli Gigi</h3>
								</a>
							</div>
						</div>
					</div>
					<!--team-2-->
					
					<!--team-3-->
					<div class="col-sm-3">
						<div class="our-team-main">
			
							<div class="team-front">
								<a href="<?=base_url('index.php/antrian');?>">
									<img src="<?=base_url();?>asset/img/laboratorium.jpg" class="img-fluid" style="width:90px;height:90px;" />
									<h3>Laboratorium</h3>
								</a>
							</div>
						</div>
					</div>
					<!--team-3-->
					
					<!--team-4-->
					<div class="col-sm-3">
						<div class="our-team-main">
			
							<div class="team-front">
								<a href="#">
									<img src="<?=base_url();?>asset/img/polikia.png" class="img-fluid" style="width:90px;height:90px;"/>
									<h3>Poli KIA</h3>
								</a>
							</div>
						</div>
					</div>
					<!--team-4-->
				</div>
			
		</fieldset>

	</div>
	<div class="clr"></div>   
	<div id="footer" align="center">

		<p>Copyright &copy; <?php date_default_timezone_set('Asia/Jakarta'); echo date('Y');?> <?php echo $instansi;?></p>

		<p>Halaman ini dimuat selama <strong>{elapsed_time}</strong> detik</p>

	</div>

</body>

</html>