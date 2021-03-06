		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					<?=$title;?>
				</h1>
			</section>
		
			<section class="content">
				<div class="row">
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-blue">
							<div class="inner">
								<h3><?php echo $total_anggota;?></h3>
								<p>Anggota</p>
							</div>
							<div class="icon">
								<i class="fa fa-user"></i>
							</div>
							<a class="more" href="<?=site_url('admin/anggota');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3><?php echo $total_buku;?></h3>
								<p>Koleksi Buku</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<a class="more" href="<?=site_url('admin/buku');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-red">
							<div class="inner">
								<h3><?php echo $total_pengunjung;?></h3>
								<p>Pengunjung</p>
							</div>
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<a class="more" href="<?=site_url('admin/pengunjung');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-green">
							<div class="inner">
								<h3><?php echo $total_peminjaman;?></h3>
								<p>Peminjaman</p>
							</div>
							<div class="icon">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<a class="more" href="<?=site_url('admin/peminjaman');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-maroon">
							<div class="inner">
								<h3><?php echo $total_pengembalian;?></h3>
								<p>Pengembalian</p>
							</div>
							<div class="icon">
								<i class="fa fa-reply"></i>
							</div>
							<a class="more" href="<?=site_url('admin/pengembalian');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-black">
							<div class="inner">
								<h3><?php echo $total_booking;?></h3>
								<p>Pesan Buku</p>
							</div>
							<div class="icon">
								<i class="fa fa-envelope"></i>
							</div>
							<a class="more" href="<?=site_url('admin/lihatpesanan');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-navy">
							<div class="inner">
								<h3><?php echo $total_booking;?></h3>
								<p>E-Book</p>
							</div>
							<div class="icon">
								<i class="fa fa-file-pdf-o"></i>
							</div>
							<a class="more" href="<?=site_url('admin/ebook');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-teal">
							<div class="inner">
								<h3><?php echo $total_booking;?></h3>
								<p>Pembelajaran</p>
							</div>
							<div class="icon">
								<i class="fa fa-pencil"></i>
							</div>
							<a class="more" href="<?=site_url('admin/materi');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
				</div>
				
			</section>
		</div>
