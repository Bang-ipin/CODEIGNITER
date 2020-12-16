<?php if(isset($header)==1){
		include_once(APPPATH.'views/header.php');
	}
	else {
		include_once(APPPATH.'views/header-alt.php');
	}
?>
	<?php if (isset($konten))
		{
			echo $konten;
		}
	?>
	
<?php  include_once(APPPATH.'views/footer.php');?>
	