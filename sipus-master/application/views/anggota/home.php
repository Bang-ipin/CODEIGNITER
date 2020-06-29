		<link href="<?=config_item('asset');?>/loginanggota.css" rel="stylesheet" />
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					
				</h1>
			</section>
			<section class=" content-ang">
				<div class="login-wrapper fadeInDown animated">
					<form class="lobi-form login-form visible" id="form">
						<div class="login-header">
							Hai <?php echo $this->session->userdata('nama_pengguna');?>, Selamat Datang di Perpustakaan SMK Piri Sleman
						</div>
					</form>
				</div>
			</section>
			<section class="contents">
				<div class="row">
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-blue">
							<div class="inner">
								<h3><?php echo $total_buku;?></h3>
								<p>Koleksi Buku</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<a class="more" href="<?=site_url('anggota/buku');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3><?php echo $total_pesanan;?></h3>
								<p>Lihat Pesanan Anda</p>
							</div>
							<div class="icon">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<a class="more" href="<?=site_url('anggota/lihatpesanan');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-green">
							<div class="inner">
								<h3>+</h3>
								<p>Buat Pesanan</p>
							</div>
							<div class="icon">
								<i class="fa fa-envelope"></i>
							</div>
							<a class="more" href="<?=site_url('anggota/booking');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-navy">
							<div class="inner">
								<h3><?php echo $total_ebook;?></h3>
								<p>E-Book</p>
							</div>
							<div class="icon">
								<i class="fa fa-file-pdf-o"></i>
							</div>
							<a class="more" href="<?=site_url('anggota/ebook');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-xs-4">
						<div class="small-box bg-teal">
							<div class="inner">
								<h3><?php echo $total_pembelajaran;?></h3>
								<p>Pembelajaran</p>
							</div>
							<div class="icon">
								<i class="fa fa-pencil"></i>
							</div>
							<a class="more" href="<?=site_url('anggota/materi');?>">
							View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
				</div>
			</section>
		</div>