	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
			<div class="dashboard-stat blue-madison">
				<div class="visual">
					<i class="fa fa-users fa-icon-medium"></i>
				</div>
				<div class="details">
					<div class="number">
						 <span data-counter="counterup" data-value="<?=$totalgaleri['galeri'];?>">0</span>
					</div>
					<div class="desc">
						Galeri
					</div>
				</div>
				<a class="more" href="<?=site_url('appweb/gallery');?>">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
			<div class="dashboard-stat dashboard-stat red" href="#">
				<div class="visual">
					<i class="fa fa-money"></i>
				</div>
				<div class="details">
					<div class="number">
						<span data-counter="counterup" data-value="<?=$totalartikel['artikel'];?>">0</span>
					</div>
					<div class="desc"> Artikel </div>
				</div>
				<a class="more" href="<?=site_url('appweb/articles');?>">
					View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
			<div class="dashboard-stat green-haze">
				<div class="visual">
					<i class="fa fa-download fa-icon-medium"></i>
				</div>
				<div class="details">
					<div class="number">
						 <?php if(empty($totaldownload['download'])){
								echo " 0 ";
							}else{
								echo "<span data-counter='counterup' data-value='".$totaldownload['download']."'>0 items</span>";
							}
						?>
					</div>
					<div class="desc">
						File Download
					</div>
				</div>
				<a class="more" href="<?=site_url('appweb/downloads');?>">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <!-- BEGIN PAGE CONTENT-->
			<div class="tiles">
				<a href="<?php echo site_url('appweb/articles');?>" class="tile bg-blue-steel ">
					<div class="tile-body">
						<i class="fa fa-list"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Blogs
						</div>
						<div class="number">
							 <?=$totalartikel['artikel'];?>
						</div>
					</div>
				</a>
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
				<a href="<?=site_url('appweb/inbox');?>" class="tile bg-green-turquoise">
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
				<a href="<?php echo base_url('assets/filemanager/dialog.php?type=0&fldr=');?>"  class="tile bg-blue-madison fancy">
					<div class="tile-body">
						<!--img src="<?=base_url('assets/admin/img/image.jpg');?>" alt=""-->
						<i class="fa fa-camera"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Media
						</div>
					</div>
				</a>
				<?php
				$t = "SELECT count(*) as jml FROM kategori WHERE status=1";
				$d = $this->db->query($t);
				$r = $d->num_rows();
				if($r > 0){
					foreach($d->result() as $h){
						$jumlahkategori = $h->jml;
					}
				}else{
					$jumlahkategori = 0;
				}
				?>
				<a href="<?php echo site_url('appweb/categories');?>" class="tile bg-yellow-lemon">
					<div class="tile-body">
						<i class="fa fa-files-o"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Kategori
						</div>
						<div class="number">
							 <?=$jumlahkategori;?>
						</div>
					</div>
				</a>
				<?php
					$t = "SELECT count(*) as jml FROM komentar WHERE dibaca=0 AND status=0";
					$d = $this->db->query($t);
					$r = $d->num_rows();
					if($r > 0){
						foreach($d->result() as $h){
							$komentarbelumterbuka = $h->jml;
						}
					}else{
						$komentarbelumterbuka = 0;
					}
				?>
				<a href="<?=site_url('appweb/comments');?>" class="tile bg-red">
					<div class="tile-body">
						<i class="fa fa-comment"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Komentar
						</div>
						<div class="number">
							 <?=$komentarbelumterbuka;?>
						</div>
					</div>
				</a>
				<?php
					$t = "SELECT count(*) as jml FROM tags";
					$d = $this->db->query($t);
					$r = $d->num_rows();
					if($r > 0){
						foreach($d->result() as $h){
							$jumlahtag = $h->jml;
						}
					}else{
						$jumlahtag = 0;
					}
				?>
				<a href="<?=site_url('appweb/tags');?>" class="tile bg-blue">
					<div class="tile-body">
						<i class="fa fa-briefcase"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Tags
						</div>
						<div class="number">
							 <?=$jumlahtag;?>
						</div>
					</div>
				</a>
				<a href="<?=site_url('appweb/gallery');?>" class="tile bg-green">
					<div class="tile-body">
						<i class="fa fa-image"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Gallery
						</div>
						<div class="number">
							 <?=$totalgaleri['galeri'];?>
						</div>
					</div>
				</a>
				<a href="<?=site_url('appweb/downloads');?>" class="tile bg-yellow">
					<div class="tile-body">
						<i class="fa fa-download"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Downloads
						</div>
						<div class="number">
							 <?=$totaldownload['download'];?>
						</div>
					</div>
				</a>
				<a href="<?=site_url('appweb/config');?>" class="tile bg-yellow-lemon">
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
					<div class="tabbable-line">
						<ul class="nav nav-tabs">
							
							<li class="active">
								<a href="#visitorharian" data-toggle="tab">
									Visitor Harian
								</a>
							</li>
							<li >
								<a href="#visitorbulanan" data-toggle="tab">
									Total Visitor
								</a>
							</li>
						</ul>
						<div class="tab-content">
							
							<div class="tab-pane active" id="visitorharian">
								<div class="table-responsive">
								    <div id="container"> </div>
								</div>
								<div class="clear">&nbsp;</div>
								<div>
									<div>
										<div>
											<h3>
											    Today :  <strong><?php echo $visits_today; ?> Visits </strong> |
											    Last week : <strong><?php echo $visits_last_week; ?> Visits </strong> |
											    Online : <strong><?php echo $visitor_online; ?> Visitor </strong>
										    </h3> 
										</div>
									</div>
								</div>
								<div class="clear">&nbsp;</div>
								<div>
									<div><span style="font-size: 30px;font-weight: bold; color: #129FEA;">Check Visits statistics</span>
										<div style="float: right;margin: -4px 20px 0 5px;">
											<form id="select_month_year" style="margin: 0;padding: 0;" method="post">
												<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
												<?php echo $this->site_config->generate_months() . '&nbsp;&nbsp;' . $this->site_config->generate_years(); ?>
												<input type="button" name="submit" id="chart_submit_btn" value="Get Data"/>
											</form>
										</div>
									</div>
									<div class="table-responsive">
									    <div id="month_year_container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
								    </div>
								</div>
							</div>
							<div class="tab-pane" id="visitorbulanan">
								<canvas id="site_statistics_bulanan" style="width:300px;height:290px;"> </canvas>
							</div>
						</div>
					</div>							
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<!-- Begin: life time stats -->
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption">
						<span class="caption-subject font-dark bold uppercase">
						<i class="icon-basket-loaded"></i> Blog</span>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body">
					<div class="tabbable-line">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#mostviewed" data-toggle="tab">
								Most Viewed </a>
							</li>
							<li>
								<a href="#lastpost" data-toggle="tab">
								Last Post </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="mostviewed">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													 Judul
												</th>
												<th>
													 Kategori
												</th>
												<th>
													 Dilihat
												</th>
												<th>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($topviewblog as $data) {
											$kategori	=slug($data->kategori);
											$artikel	=$data->judul_seo;
											?>
											<tr>
												<td>
													<a href="javascript:;"><?php echo $data->judul_blog;?></a>
												</td>
												<td>
													 <?php echo $data->kategori;?>
												</td>
												<td>
													 <?php echo $data->hits;?>&nbsp;<i class="fa fa-eye"></i>
												</td>
												<td>
													<a href="<?=site_url('blog/'.$kategori.'/'.$artikel);?>" target="_blank" class="btn btn-sm btn-default">
													 <i class="fa fa-search"></i> View </a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="lastpost">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													Judul
												</th>
												<th>
													Kategori
												</th>
												<th>
													Dilihat
												</th>
												<th>
													Aksi
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($lastpost as $data) {
											$kategori	=slug($data->kategori);
											$artikel	=$data->judul_seo;
											?>
											<tr>
												<td width="45%">
													<a href="javascript:;"><?php echo $data->judul_blog;?></a>
												</td>
												<td  width="25%">
													 <?php echo $data->kategori;?>
												</td>
												<td  width="15%">
													 <?php echo $data->hits;?>&nbsp;<i class="fa fa-eye"></i>
												</td>
												<td width="15%">
													<a href="<?=site_url('blog/'.$kategori.'/'.$artikel);?>" target="_blank" class="btn btn-sm btn-default">
													 <i class="fa fa-search"></i> View </a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- End: life time stats -->
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="portlet light bordered">
				<div class="portlet-title tabbable-line">
					<div class="caption">
						<i class="icon-bubbles font-dark hide"></i>
						<span class="caption-subject font-dark bold uppercase"><i class="icon-speech"></i> Comments</span>
					</div>
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#portlet_comments_1" data-toggle="tab"> Approve </a>
						</li>
						<li>
							<a href="#portlet_comments_2" data-toggle="tab"> Pending </a>
						</li>
						<li>
							<a href="#portlet_comments_3" data-toggle="tab"> Rejected </a>
						</li>
					</ul>
				</div>
				<div class="portlet-body">
					<div class="tab-content">
						<div class="tab-pane active" id="portlet_comments_1">
							<!-- BEGIN: Comments -->
							<div class="mt-comments">
								<?php foreach($komentarapprove as $data): ?>
								<div class="mt-comment">
									<div class="mt-comment-img">
										
									</div>
									<div class="mt-comment-body">
										<div class="mt-comment-info">
											<span class="mt-comment-author"><?=$data['username'];?></span>
											<span class="mt-comment-date"><?=converttgl($data['tanggal']);?></span>
										</div>
										<div class="mt-comment-text"> <?=strip_tags($data['review']);?>  </div>
										<div class="mt-comment-details">
											<span class="mt-comment-status mt-comment-status-approved">Approved</span>
											<ul class="mt-comment-actions">
												<li>
													<a href="<?=site_url('appweb/comments');?>">View</a>
												</li>
												<li>
													<a href="<?=site_url('appweb/comments/hapus/'.$data['id']);?>">Delete</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							</div>
						</div>
						<div class="tab-pane" id="portlet_comments_2">
							<!-- BEGIN: Comments -->
							<div class="mt-comments">
								<?php foreach($komentarpending as $data): 
								date_default_timezone_set('Asia/Jakarta');
								?>
								<div class="mt-comment">
									<div class="mt-comment-img">
										
									</div>
									<div class="mt-comment-body">
										<div class="mt-comment-info">
											<span class="mt-comment-author"><?=$data['username'];?></span>
											<span class="mt-comment-date"><?=converttgl($data['time']);?></span>
										</div>
										<div class="mt-comment-text"> <?=strip_tags($data['review']);?> </div>
										<div class="mt-comment-details">
											<span class="mt-comment-status mt-comment-status-pending">Pending</span>
											<ul class="mt-comment-actions">
												<li>
													<a href="<?=site_url().'appweb/comments/approve/'.$data['id'].'/1';?>"><span class="label label-default">Approve</span></a>
												</li>
												<li>
													<a href="<?=site_url('appweb/comments');?>">View</a>
												</li>
												<li>
													<a href="<?=site_url('appweb/comments/reject/'.$data['id'].'/3');?>">Reject</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
							<!-- END: Comments -->
						</div>
						<div class="tab-pane" id="portlet_comments_3">
							<!-- BEGIN: Comments -->
							<div class="mt-comments">
								<?php foreach($komentarrejected as $data): ?>
								<div class="mt-comment">
									<div class="mt-comment-img">
										
									</div>
									<div class="mt-comment-body">
										<div class="mt-comment-info">
											<span class="mt-comment-author"><?=$data['username'];?></span>
											<span class="mt-comment-date"><?=converttgl($data['time']);?></span>
										</div>
										<div class="mt-comment-text"> <?=strip_tags($data['review']);?>  </div>
										<div class="mt-comment-details">
											<span class="mt-comment-status mt-comment-status-rejected">Rejected</span>
											<ul class="mt-comment-actions">
												<li>
													<a href="<?=site_url('appweb/comments/hapus/'.$data['id']);?>">Delete</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	