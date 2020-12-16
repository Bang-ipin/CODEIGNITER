<div class="main">
	<div class="container-fluid">
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active"><?=$title;?></li>
		</ul>
		<div class="row margin-bottom-40">
			<div class="col-md-12 col-sm-12">
				<h1><?=$title;?></h1>
				<?php 
					if (isset($konten)){
					echo $konten;
					}
					?>
			</div>
		</div>
	</div>
</div>
