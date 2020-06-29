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
								<?php echo form_open('admin/saveresponbooking',array('onsubmit'=>'return validasi(this)'));?> 
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="id">Kode Pesanan</label>
											</div>
											<div class="col-xs-4">
												<input type="text" class="form-control" value="<?php echo $kode_booking;?>" name="kode" id="kode" readonly="readonly"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="id">NIS</label>
											</div>
											<div class="col-xs-4">
												<input type="text" class="form-control" value="<?php echo $nis;?>" name="nis" id="nis" readonly="readonly" placeholder="No Induk Siswa">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="nama">Nama Siswa</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama;?>" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="judul">Judul Buku</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul_buku;?>"  readonly="readonly" placeholder="Judul Buku"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="pengarang">Pengarang</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="pengarang" id="pengarang" value="<?php echo $pengarang;?>" placeholder="Pengarang Buku"  readonly="readonly" >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="penerbit">Penerbit</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="penerbit" id="penerbit" value="<?php echo $penerbit;?>" placeholder="Penerbit" readonly="readonly" >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="tanggal">Tanggal Pesan</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="tglpesan" id="tglpesan" value="<?php echo $tanggal;?>" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="status">Status Pesanan</label>
											</div>
											<div class="col-xs-5">
												<?php
													$attr		="class='form-control select2' id='kategori'";
													$stt_select =$this->input->post('dd_status')? $this->input->post('dd_status'):$status;
													echo form_dropdown('dd_status',$dd_status,$stt_select,$attr);
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="keterangan">Keterangan</label>
											</div>
											<div class="col-xs-5">
												<textarea rowspan="8" class="form-control" name="keterangan" id="keterangan" ><?php echo $keterangan;?></textarea>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3"></div>
											<div class="col-xs-8">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>admin/lihatpesanan">
												<button type="button" name="kembali" class="btn btn-warning">Kembali</button>
												</a>
											</div>
										</div>
									</div>
								<?php form_close();?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		