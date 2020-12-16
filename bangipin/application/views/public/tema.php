<?php if(isset($header)==1){
		include_once(APPPATH.'views/public/header-amp.php');
	}
	else {
		include_once(APPPATH.'views/public/header.php');
	}
?>
	
	<?php if (isset($konten))
		{
		
		    echo $konten;
		}
	?>
	
<?php  include_once(APPPATH.'views/public/footer.php');?>
	