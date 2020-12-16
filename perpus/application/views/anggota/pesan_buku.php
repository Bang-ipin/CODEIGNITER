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
								<?php echo form_open('anggota/simpanbooking',array('onsubmit'=>'return validasi(this)'));?> 
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="id">NIS</label>
											</div>
											<div class="col-xs-4">
												<input type="hidden" class="form-control" value="<?php echo $id_booking;?>" name="id" id="id" readonly="readonly"  >
												<input type="hidden" class="form-control" value="<?php echo $kode_booking;?>" name="kode" id="kode" readonly="readonly"  >
												<input type="text" class="form-control" value="<?php echo $this->session->userdata('nis');?>" name="nis" id="nis" readonly="readonly" placeholder="No Induk Siswa">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="nama">Nama</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $this->session->userdata('nama_pengguna');?>" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="judul">Judul Buku</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="pengarang">Pengarang</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang Buku"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="penerbit">Penerbit</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="tanggal">Tanggal Pesan</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="tglpesan" id="tglpesan"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3"></div>
											<div class="col-xs-8">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>anggota">
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
		<script type="text/javascript">
			$(document).ready(function(){
				$('#tglpesan').datetimepicker({
					lang:'en',
					format:'d-m-yy',
					autoclose:true,
					showAnim:'slide',
				});
			});
			function validasi(form){
				var id 			= $('#id').val();
				var nis 		= $('#nis').val();
				var nama		= $('#nama').val();
				var judul		= $('#judul').val();
				var pengarang 	= $('#pengarang').val();
				var penerbit	= $('#penerbit').val();
				var tgl			= $('#tglpesan').val();
					if(	id=="" || id==null)
					{
						$.messager.show({
							title:'Info',
							msg:'Maaf, Id tidak boleh kosong', 
							timeout:2000,
							showType:'show'
						});
						form.id.focus();
						return false;
					}else
					if(	nis=="" || nis==null)
					{
						$.messager.show({
							title:'Info',
							msg:'Maaf, NIS tidak boleh kosong', 
							timeout:2000,
							showType:'show'
						});
						form.nis.focus();
						return false;
					}else
					if(	nama=="" || nama==null)
					{
						$.messager.show({
							title:'Info',
							msg:'Maaf, Nama Siswa tidak boleh kosong', 
							timeout:2000,
							showType:'show'
						});
						form.nama.focus();
						return false;
					}
					else
					if(	judul=="" || judul==null)
					{
						$.messager.show({
							title:'Info',
							msg:'Maaf, Judul Buku tidak boleh kosong', 
							timeout:2000,
							showType:'show'
						});
						form.judul.focus();
						return false;
					}
					else
					if(	pengarang=="" || pengarang==null)
					{
						$.messager.show({
							title:'Info',
							msg:'Maaf, Nama Pengarang tidak boleh kosong', 
							timeout:2000,
							showType:'show'
						});
						form.pengarang.focus();
						return false;
					}
					else
					if(	penerbit=="" || penerbit==null)
					{
						$.messager.show({
							title:'Info',
							msg:'Maaf, Nama Penerbit tidak boleh kosong', 
							timeout:2000,
							showType:'show'
						});
						form.penerbit.focus();
						return false;
					}
					else
					if(	tgl=="" || tgl==null)
					{
						$.messager.show({
							title:'Info',
							msg:'Maaf, Tanggal Pesan tidak boleh kosong', 
							timeout:2000,
							showType:'show'
						});
						form.tglpesan.focus();
						return false;
					}
				}
			</script>