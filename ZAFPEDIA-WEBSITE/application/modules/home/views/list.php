	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
			<div class="dashboard-stat blue-madison">
				<div class="visual">
					<i class="fa fa-users fa-icon-medium"></i>
				</div>
				<div class="details">
					<div class="number">
						 <span data-counter="counterup" data-value="<?=$totalcustomers['user'];?>">0</span>
					</div>
					<div class="desc">
						Members
					</div>
				</div>
				<a class="more" href="<?=site_url('appweb/members');?>">
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
						<?php if(empty($totalomset['harga'])){
								echo "<span>".convertrp('')."</span>0";
							}else{
								echo "<span>".convertrp('')."</span><span data-counter='counterup' data-value='".$totalomset['harga']."'>0</span>";
							}
						?>
					</div>
					<div class="desc"> Total Profit </div>
				</div>
				<a class="more" href="#">
					View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
			<div class="dashboard-stat red-intense">
				<div class="visual">
					<i class="fa fa-shopping-cart"></i>
				</div>
				<div class="details">
					<div class="number">
						<?php if(empty($totalorders['total'])){
								echo " 0 items";
							}else{
								echo "<span data-counter='counterup' data-value='".$totalorders['total']."'>0 items</span>";
							}
						?>
					</div>
					<div class="desc">
						 Total Orders
					</div>
				</div>
				<a class="more" href="<?=site_url('appweb/orders');?>">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<!--div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-bottom-10">
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
		</div-->
	</div>
	<div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <!-- BEGIN PAGE CONTENT-->
			<div class="tiles">
				<?php
					$t = "SELECT count(*) as jml FROM produk WHERE status_barang=1";
					$d = $this->db->query($t);
					$r = $d->num_rows();
					if($r > 0){
						foreach($d->result() as $h){
							$jumlahbarang = $h->jml;
						}
					}else{
						$jumlahbarang = 0;
					}
					?>
				
				<a href="<?php echo site_url('appweb/products');?>" class="tile bg-red-sunglo">
					<div class="tile-body">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Product
						</div>
						<div class="number">
							 <?=$jumlahbarang;?>
						</div>
					</div>
				</a>
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
				<a href="<?=site_url('appweb/tags');?>" class="tile bg-green">
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
				<a href="<?=site_url('appweb/tags');?>" class="tile bg-yellow">
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
								<a href="#visitorbulanan" data-toggle="tab">
									Total Visitor
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="visitorbulanan">
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
						<i class="icon-basket-loaded"></i> E-commerce</span>
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
								<a href="#topselling" data-toggle="tab">
								Top Selling </a>
							</li>
							<li>
								<a href="#newcustomers" data-toggle="tab">
								New Customers </a>
							</li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
								Orders <i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="#lastten" tabindex="-1" data-toggle="tab">
										Latest 5 Orders </a>
									</li>
									<li>
										<a href="#pendingorder" tabindex="-1" data-toggle="tab">
										Unpaid </a>
									</li>
									<li>
										<a href="#completedorder" tabindex="-1" data-toggle="tab">
										Paid </a>
									</li>
									<li>
										<a href="#cancelorder" tabindex="-1" data-toggle="tab">
										Canceled </a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="mostviewed">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													 Produk
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
											foreach($topviewproduk as $data) {
											$kategori	= slug($data->kategori);
											$produk		= slug($data->produk);
											?>
											<tr>
												<td>
													<a href="javascript:;"><?php echo $data->produk;?></a>
												</td>
												<td>
													 <?php echo $data->kategori;?>
												</td>
												<td>
													 <?php echo $data->dibaca;?>&nbsp;<i class="fa fa-eye"></i>
												</td>
												<td>
													<a href="<?=site_url('produk/'.$kategori.'/'.$produk);?>" target="_blank" class="btn btn-xs btn-default">
													 <i class="fa fa-search"></i> View </a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="topselling">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													Produk
												</th>
												<th>
													Total Price
												</th>
												<th>
													Terjual
												</th>
												<th>
													Aksi
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($topselling as $data) {
											$kategori	=slug($data->kategori);
											$produk		=slug($data->produk);
											?>
											<tr>
												<td width="45%">
													<a href="javascript:;"><?php echo $data->produk;?></a>
												</td>
												<td width="25%">
													 <?php echo convertrp($data->totalprice);?>
												</td>
												<td width="15%">
													 <?php echo $data->totaljumlah;?>&nbsp;items;
												</td>
												<td width="15%">
													<a href="<?=site_url('produk/'.$kategori.'/'.$produk);?>" target="_blank" class="btn btn-sm btn-default">
													 <i class="fa fa-search"></i> View </a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="newcustomers">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													Pelanggan
												</th>
												<th>
													Total Pesan
												</th>
												<th>
													 Total Beli
												</th>
												<th> Aksi
												</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$jumlah=0;
											$totalprice=0;
											foreach($newcustomer as $data) {
											$jumlah += $data->jumlah;
											$totalprice += $data->jumlah * $data->harga;
											$user	=$data->nama_lengkap;
										?>
											<tr>
												<td>
													<a href="javascript:;">
													 <?php echo $user;?> </a>
												</td>
												<td align="center">
													 <?php echo $jumlah;?>&nbsp;items
												</td>
												<td>
													 <?php echo convertrp($totalprice);?>
												</td>
												<td>
													<a href="javascript:;"  target="_blank" class="btn btn-sm btn-default">
													<i class="fa fa-search"></i> View </a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="lastten">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													 Pelanggan
												</th>
												<th>
													 Tanggal
												</th>
												<th>
													 Total Beli
												</th>
												<th>
													 Status
												</th>
												<th>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($lastorder as $data) { 
											if($data->status_pesanan== 0){
												$label = "<span class='label label-info'>Pending</span>";
											}else if($data->status_pesanan == 2 && $data-status_pembayaran==2){
												$label = "<span class='label label-success'>Complete</span>";
											}else{
												$label = "<span class='label label-danger'>Dibatalkan</span>";
											}
											?>
											<tr>
												<td>
													<a href="javascript:;">
													<?=$data->nama_lengkap;?> </a>
												</td>
												<td>
													 <?=converttgl($data->tgl_pesan);?>
												</td>
												<td>
													 <?php 
													 $totalprice = $data->harga * $data->jumlah;
													 echo convertrp($totalprice);
													 ?>
												</td>
												<td>
													<?=$label;?>
												</td>
												<td>
													<a href="javascript:;"  target="_blank" class="btn btn-sm btn-default">
													<i class="fa fa-search"></i> View </a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="pendingorder">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													 Pelanggan
												</th>
												<th>
													 Tanggal
												</th>
												<th>
													 Total Beli
												</th>
												<th>
													 Status
												</th>
												<th>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($pendingorder as $data) { 
											$hrg=$data->harga;
											$jml=$data->jumlah;
											$totalprice= $hrg * $jml;?>
											<tr>
												<td>
													<a href="javascript:;">
													<?=$data->nama_lengkap;?> </a>
												</td>
												<td>
													 <?=converttgl($data->tgl_pesan);?>
												</td>
												<td>
													 <?=convertrp($totalprice);?>
												</td>
												<td>
													<span class="label label-warning">Belum Bayar</span>
												</td>
												<td>
													<a href="javascript:;"  target="_blank" class="btn btn-sm btn-default">
													<i class="fa fa-search"></i> View </a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="completedorder">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													 Pelanggan
												</th>
												<th>
													 Tanggal
												</th>
												<th>
													 Total Beli
												</th>
												<th>
													 Status
												</th>
												<th>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($paidorder as $data) {
											$hrg=$data->harga;
											$jml=$data->jumlah;
											$totalprice= $hrg * $jml;
											?>
											<tr>
												<td>
													<a href="javascript:;">
													<?=$data->nama_lengkap;?> </a>
												</td>
												<td>
													 <?=converttgl($data->tgl_pesan);?>
												</td>
												<td>
													 <?=convertrp($totalprice);?>
												</td>
												<td>
													<span class="label label-success">Lunas</span>
												</td>
												<td>
													<a href="javascript:;"  target="_blank" class="btn btn-sm btn-default">
													<i class="fa fa-search"></i> View </a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="cancelorder">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>
													 Pelanggan
												</th>
												<th>
													 Tanggal
												</th>
												<th>
													 Total Beli
												</th>
												<th>
													 Status
												</th>
												<th>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($cancelorder as $data) { 
											$hrg=$data->harga;
											$jml=$data->jumlah;
											$totalprice= $hrg * $jml;
											?>
											<tr>
												<td>
													<a href="javascript:;">
													<?=$data->nama_lengkap;?> </a>
												</td>
												<td>
													 <?=converttgl($data->tgl_pesan);?>
												</td>
												<td>
													 <?=convertrp($totalprice);?>
												</td>
												<td>
														<span class="label label-danger">Cancel</span>
												</td>
												<td>
													<a href="javascript:;"  target="_blank" class="btn btn-sm btn-default">
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
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="portlet light bordered">
				<div class="portlet-title tabbable-line">
					<div class="caption">
						<i class="icon-bubbles font-dark hide"></i>
						<span class="caption-subject font-dark bold uppercase"><i class="icon-speech"></i> Review Product</span>
					</div>
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#portlet_reviews_1" data-toggle="tab"> Review </a>
						</li>
						<li>
							<a href="#portlet_reviews_2" data-toggle="tab"> Rejected </a>
						</li>
					</ul>
				</div>
				<div class="portlet-body">
					<div class="tab-content">
						<div class="tab-pane active" id="portlet_reviews_1">
							<!-- BEGIN: Comments -->
							<div class="mt-comments">
								<?php foreach($reviewsprodukapprove as $data): 
								date_default_timezone_set('Asia/Jakarta');
								?>
								<div class="mt-comment">
									<div class="mt-comment-img">
										
									</div>
									<div class="mt-comment-body">
										<div class="mt-comment-info">
											<span class="mt-comment-author"><?=$data['username'];?></span>
											<span class="mt-comment-date"><?=converttgl($data['tanggal']);?></span>
										</div>
										<div class="mt-comment-text"> <?=strip_tags($data['review']);?> </div>
										<div class="mt-comment-details">
											<div class="review">
												<div class="rateit" data-rateit-value="<?=$data['votes'];?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
											</div>
											<ul class="mt-comment-actions">
												<li>
													<a href="<?=site_url('appweb/review-product');?>">View</a>
												</li>
												<li>
													<a href="<?=site_url('appweb/review-product/hapus/'.$data['id']);?>">Hapus</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
							<!-- END: Comments -->
						</div>
						<div class="tab-pane" id="portlet_reviews_2">
							<!-- BEGIN: Comments -->
							<div class="mt-comments">
								<?php foreach($reviewsprodukrejected as $data): ?>
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
											<span class="mt-comment-status mt-comment-status-approved">Rejected</span>
											<ul class="mt-comment-actions">
												<li>
													<a href="<?=site_url('appweb/review-product/hapus/'.$data['id']);?>">Delete</a>
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
	