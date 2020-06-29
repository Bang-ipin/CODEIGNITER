
	<div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <!-- BEGIN PAGE CONTENT-->
			<div class="tiles">
				<?php
					$t = "SELECT count(*) as jml FROM kontak WHERE status=0";
					$d = $this->db->query($t);
					$r = $d->num_rows();
					if($r > 0){
						foreach($d->result() as $h){
							$pesanbelumterbuka = $h->jml;
						}
					}else{
						$pesanbelumterbuka = 0;
					}
				?>
				<a href="<?=site_url('administrator/inbox');?>" class="tile bg-green-turquoise">
					<div class="tile-body">
						<i class="fa fa-envelope"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							Inbox
						</div>
						<div class="number">
							 <?=$pesanbelumterbuka;?>
						</div>
					</div>
				</a>
				<a href="<?php echo base_url('asset/filemanager/dialog.php?type=0&fldr=');?>"  class="tile bg-blue image fancy">
					<div class="tile-body">
						<i class="fa fa-image"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Media
						</div>
					</div>
				</a>
	
				<a href="<?=site_url('administrator/config');?>" class="tile bg-yellow-lemon selected">
					<div class="corner">
					</div>
					<div class="check">
					</div>
					<div class="tile-body">
						<i class="fa fa-cogs"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Settings
						</div>
					</div>
				</a>
				<a href="<?=site_url('administrator/landingpage-home');?>" class="tile bg-red selected">
					<div class="corner">
					</div>
					<div class="check">
					</div>
					<div class="tile-body">
						<i class="fa fa-camera"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Intro
						</div>
					</div>
				</a>
				<a href="<?=site_url('administrator/landingpage-video');?>" class="tile bg-green selected">
					<div class="corner">
					</div>
					<div class="check">
					</div>
					<div class="tile-body">
						<i class="fa fa-film"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Video
						</div>
					</div>
				</a>
				<a href="<?=site_url('administrator/landingpage-gallery');?>" class="tile bg-yellow-lemon selected">
					<div class="corner">
					</div>
					<div class="check">
					</div>
					<div class="tile-body">
						<i class="fa fa-briefcase"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Portofolio
						</div>
					</div>
				</a><a href="<?=site_url('administrator/landingpage-testimoni');?>" class="tile bg-blue selected">
					<div class="corner">
					</div>
					<div class="check">
					</div>
					<div class="tile-body">
						<i class="fa fa-comments"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Testimoni
						</div>
					</div>
				</a>
			</div>
			<!-- END PAGE CONTENT-->
	    </div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-bar-chart font-dark hide"></i>
						<span class="caption-subject font-dark bold uppercase"><i class="fa fa-bar-chart"></i> Visitors</span>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body">
					<canvas id="site_statistics" style="width:300px;height:290px;"> </canvas>
				</div>
			</div>
		</div>
	</div>
	