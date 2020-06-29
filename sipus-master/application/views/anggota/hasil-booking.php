		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					<?=$title;?>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="box">
							<div class="box-body">
								<div class="form-horizontal">
									<div class="form-group">
										<div class="col-xs-3">
											<label for="id">NIS</label>
										</div>
										<div class="col-xs-4">
											: <label for="NIS"><?php echo $nis;?></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="nama">Nama</label>
										</div>
										<div class="col-xs-5">
											: <label for="nama"><?php echo $nama;?></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="judul">Judul Buku</label>
										</div>
										<div class="col-xs-5">
											: <label for="judul"><?php echo $judul_buku;?></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="pengarang">Pengarang</label>
										</div>
										<div class="col-xs-5">
											: <label for="pengarang"><?php echo $pengarang;?></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="penerbit">Penerbit</label>
										</div>
										<div class="col-xs-5">
											: <label for="penerbit"><?php echo $penerbit;?></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="tanggal">Tanggal Pesan</label>
										</div>
										<div class="col-xs-5">
											: <label for="tanggal"><?php echo $tanggal;?></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="tanggal">Status </label>
										</div>
										<div class="col-xs-5">
											<?php if ($status==1){
												$stt="<label class='label label-success'>Dalam Proses</label>";
												}
												else if($status==2){
												$stt="<label class='label label-danger'>Di Tolak</label>";	
												}
												else{
													$stt="<label class='label label-info'>Sudah Tersedia</label>";	
												}
												?>
												: <label for="tanggal"><?php echo $stt;?></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-3">
											<label for="keterangan">Keterangan</label>
										</div>
										<div class="col-xs-5">
											: <label for="keterangan"><?php echo $keterangan;?></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-3"></div>
										<div class="col-xs-8">
											<a href="<?=base_url();?>anggota/lihatpesanan">
											<button type="button" name="kembali" class="btn btn-warning">Kembali</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>