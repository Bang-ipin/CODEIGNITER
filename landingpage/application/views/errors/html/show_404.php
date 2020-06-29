<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $heading; ?></title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<meta property="og:site_name" content="-CUSTOMER VALUE-">
		<meta property="og:title" content="-CUSTOMER VALUE-">
		<meta property="og:description" content="-CUSTOMER VALUE-">
		<meta property="og:type" content="website">
		<meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
		<meta property="og:url" content="-CUSTOMER VALUE-">

		<!-- Fonts START -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
		<!-- Fonts END -->

		<!-- Global styles START -->          
		<link href="<?=base_url('asset/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
		<!-- Global styles END --> 
	   
		<!-- Page level plugin styles START -->
		<link href="<?=base_url('asset/plugins/fancybox/source/jquery.fancybox.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/plugins/owl.carousel/assets/owl.carousel.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css">
		<link href="<?=base_url('asset/plugins/rateit/src/rateit.css');?>" rel="stylesheet" type="text/css">
		<link href="<?=base_url('asset/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css">
		<link href="<?=base_url('asset/global/plugins/slider-layer-slider/css/layerslider.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css">
		<link href="<?=base_url('asset/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/global/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" />
		<!-- Page level plugin styles END -->
		
		<!-- Theme styles START -->
		<link href="<?=base_url('asset/admin/pages/css/error.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/frontend/pages/css/portfolio.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/admin/pages/css/blog.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/admin/pages/css/news.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/admin/pages/css/invoice.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?=base_url('asset/pages/css/animate.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/pages/css/profile.css" rel="stylesheet');?>" type="text/css"/>
		<link href="<?=base_url('asset/pages/css/tasks.css" rel="stylesheet');?>" type="text/css"/>
		<link href="<?=base_url('asset/global/css/components-md.css');?>" id="style_components" rel="stylesheet">
		<link href="<?=base_url('asset/global/css/plugins-md.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/frontend/layout/css/style.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/pages/css/style-shop.css');?>" rel="stylesheet" type="text/css">
		<link href="<?=base_url('asset/frontend/pages/css/style-layer-slider.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/frontend/layout/css/style-responsive.css');?>" rel="stylesheet">
		<link href="<?=base_url('asset/frontend/layout/css/themes/blue.css');?>" rel="stylesheet" id="style-color">
		<link href="<?=base_url('asset/frontend/layout/css/custom.css');?>" rel="stylesheet" id="style-color">
		<!-- Theme styles END -->
	</head>
	<body class="page-404-full-page">
		<div class="row">
			<div class="col-md-12 page-404">
				<div class="number">
					 404
				</div>
				<div class="details">
					<h3>Oops! You're lost.</h3>
					<p>
						 We can not find the page you're looking for.<br/>
						<a href="<?=site_url();?>">
						Return home </a>
						or try the search bar below.
					</p>
				</div>
			</div>
		</div>
		<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
		<script src="<?=base_url('asset/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery-migrate.min.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery-ui/jquery-ui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>      
		<script src="<?=base_url('asset/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->

		<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
		<script src="<?=base_url('asset/plugins/fancybox/source/jquery.fancybox.pack.js')?>" type="text/javascript"></script><!-- pop up -->
		<script src="<?=base_url('asset/plugins/owl.carousel/owl.carousel.min.js')?>" type="text/javascript"></script><!-- slider for products -->
		<script src="<?=base_url('asset/plugins/zoom/jquery.zoom.min.js')?>" type="text/javascript"></script><!-- product zoom -->
		<script src="<?=base_url('asset/plugins/bootstrap-touchspin/bootstrap.touchspin.js')?>" type="text/javascript"></script><!-- Quantity -->
		<script src="<?=base_url('asset/plugins/uniform/jquery.uniform.min.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/plugins/validation/dist/jquery.validate.js')?>" type="text/javascript" ></script>
		<script src="<?=base_url('asset/plugins/validation/dist/additional-methods.min.js')?>" type="text/javascript" ></script>
		<script src="<?=base_url('asset/plugins/rateit/src/jquery.rateit.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/plugins/gmaps/gmaps.js');?>" type="text/javascript"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js');?>"  type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery.cokie.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/select2/js/select2.min.js');?>" type="text/javascript"></script>
		
		<!-- BEGIN LayerSlider -->
		<script src="<?=base_url('asset/global/plugins/slider-layer-slider/js/greensock.js')?>" type="text/javascript"></script><!-- External libraries: GreenSock -->
		<script src="<?=base_url('asset/global/plugins/slider-layer-slider/js/layerslider.transitions.js')?>" type="text/javascript"></script><!-- LayerSlider script files -->
		<script src="<?=base_url('asset/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js')?>" type="text/javascript"></script><!-- LayerSlider script files -->
		<script src="<?=base_url('asset/frontend/pages/scripts/layerslider-init.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/global/plugins/jquery-mixitup/jquery.mixitup.min.js');?>" type="text/javascript"></script>
		<!-- END LayerSlider -->
		
		
		<script src="<?=base_url('asset/global/scripts/metronic.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/frontend/layout/scripts/layout.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/pages/scripts/bs-carousel.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/pages/scripts/contact-us.js')?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/frontend/pages/scripts/portfolio.js');?>" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				Metronic.init(); // init metronic core components
				Layout.init();    
			});
		</script>
	</body>
</html>
	
