<div class="main">
	<div class="container-fluid">
		<ul class="breadcrumb">
			<li><a href="<?=site_url();?>">Home</a></li>
			<li class="active"><?=$title;?></li>
		</ul>

		<div class="row recent-work margin-bottom-40">
			<div class="col-md-12 col-sm-12">
				<h2 class="section-title"><?=strtoupper($title);?></h2>
				<div class="content-page">
					<div class="row">
						<?php 
							if(!$jmlhpage){
								$no=0;
							}
							else{
								$no=$jmlhpage;
							}
							foreach($datadownload as $post):
							date_default_timezone_set('Asia/Jakarta');
							$no++;
							if (!empty($post['background'])){
								$gambar = "<img class='img-responsive' src=".$post['background']."  alt='".strip_tags($post['judul'])."' style='width:auto;height:240px;'>";
							}else{
								$gambar	= "<img class='img-responsive'  src=".base_url('files/images/no-image.jpg')." alt='".strip_tags($post['judul'])."' style='width:auto;height:240px;'>";
							}
							
						?>
						<div class="col-md-4">
							<div class="recent-work-item">
								<em>
									<?=$gambar;?>
									<a href="<?=$post['url'];?>" title="Demo" ><i class="fa fa-link"></i></a>
									<a href="<?=site_url('download/file/'.$post['id'].'/'.$post['nama_file']);?>" title="Download"><i class="fa fa-download"></i></a>
								</em>
								<a class="recent-work-description" href="javascript:;">
									<strong><?=$post['judul'];?></strong>
									<b><?=$post['hits'];?>&nbsp;x <i class="glyphicon glyphicon-download-alt"></i></b>
								</a>
							</div>
						</div>
						<?php 
							endforeach;
						?>
					</div>
					<?php
						echo "<span class='pull-right'>".$pagination."</span>"; 
					?>  
				</div>
			</div>
		</div>
	</div>
</div>
