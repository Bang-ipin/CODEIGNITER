		<div class="page-header -i navbar navbar-fixed-top">
			<div class="page-header-inner">
				<div class="page-logo">
					<?php if(empty($logo)){?>
					<a href="<?=site_url('appweb/home');?>">
						<h4><span><?=$situs;?></span></h4>
					</a>
					<?php }else{?>
					<a>
						<img src="<?=base_url('files/media/'.$logo.'');?>" alt="<?=$title;?>" width="100" height="40" class="logo-default"/>
					</a>
					<?php } ?>
					<div class="menu-toggler sidebar-toggler"></div>
				</div>
				<!--<form class="search-form" action="extra_search.html" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search..." name="query">
						<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
						</span>
					</div>
				</form>
				-->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown dropdown-web">
							<a href="<?=site_url();?>" title="Lihat Website" target="_blank" class="dropdown-toggle" data-hover="dropdown">
								<i class="fa fa-eye"></i>
							</a>
						</li>
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
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
							<a href="javascript:;" title="Inbox" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<?php if (!empty($pesanbelumterbuka)){
									echo "<i class='fa fa-inbox'></i>";
								}else{
									echo "<i class='fa fa-envelope'></i>";
								}
								?>
								<?php if(!empty($pesanbelumterbuka)){
								echo "<span class='badge badge-default'>".$pesanbelumterbuka."</span>"; 
								}?>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>You have <span class="bold"><?php if(!empty($pesanbelumterbuka)){echo $pesanbelumterbuka;}?> New</span> Messages</h3>
									<a href="<?=site_url('appweb/inbox');?>">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<?php $sql=$this->db->query('SELECT * FROM kontak WHERE status=0 order by tanggal DESC');
										if($sql->num_rows() > 0){
											foreach($sql->result_array() as $inb){ 
											date_default_timezone_set('Asia/Jakarta');
											$date=date('d F , H:i',strtotime($inb['tanggal']));
											?>
										<li>
											<a href="<?=site_url('appweb/inbox');?>" data-messageid="<?=$inb['id'];?>">
												<span class="photo">
													<img src="<?=base_url('assets/admin/layout/img/avatars.jpg');?>" class="img-circle" alt="">
												</span>
												<span class="subject">
													<span class="from">
													<?=$inb['nama'];?> </span>
													<span class="time"><?=$date;?>&nbsp;WIB</span>
												</span>
												<span class="message">
													<?php 
														$text = $inb['pesan'];
														echo character_limiter($text,20);
													?> 
												</span>
											</a>
										</li>
									<?php } } ?>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<span class="username username-hide-on-mobile">
								<?php echo $this->session->userdata('nama_lengkap');?> </span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="<?=site_url('appweb/logout');?>" title="Keluar">
										<i class="fa fa-sign-out"></i> Keluar
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		