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
								<?php foreach($query as $rows)?>
								<?php echo form_open_multipart('admin/simpaneditanggota',array('onsubmit'=>'return validasi(this)'));?> 
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="id">Nis</label>
											</div>
											<div class="col-xs-5">
												<input type="hidden" class="form-control" value="<?php echo $rows->id_anggota;?>" name="id" id="id" readonly="readonly"  >
												<input type="text" class="form-control" name ="nis" id="nis" value="<?php echo $rows->nis?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="nama">Nama</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $rows->nama_anggota?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="jenis_kelamin">Jenis Kelamin</label>
											</div>
											<div class="col-xs-5">
												<?php 
													$attribute='class="table-group-action-input form-control select2me" id="gender"';
													$gender_selected= $this->input->post('gender')?$this->input->post('gender'):$rows->jenis_kelamin;
													echo form_dropdown('gender',$dd_gender,$gender_selected,$attribute);
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="alamat">Alamat</label>
											</div>
											<div class="col-xs-5">
												<textarea rowspan="5" class="form-control" name="alamat" id="alamat" ><?php echo $rows->alamat?></textarea>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="tanggal">Tanggal Daftar</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control uneditable-input" name="tgldaftar" id="tgldaftar"  value="<?php echo $this->M_admin->tgl_str($rows->tgl_daftar)?>" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="password">Password</label>
											</div>
											<div class="col-xs-6">
												<input type="password" class="form-control" name="password" id="password">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
											</div>
											<div class="col-xs-7">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>admin/anggota">
												<button type="button" name="kembali" class="btn btn-warning">Kembali</button>
												</a>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	<script type="text/javascript">
		$("#nis").keyup(function(e){
			var isi = $(e.target).val();
			$(e.target).val(isi.toUpperCase());
		});
		function validasi(form){
			var kode = $('#nis').val();
			var nama=$('#nama').val();
			var alamat=$('#alamat').val();
			var tgl=$('#tgldaftar').val();
			var password=$('#password').val();
			if(	kode=="" || kode==null)
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
			if(	alamat=="" || alamat==null)
			{
				$.messager.show({
					title:'Info',
					msg:'Maaf, Alamat Siswa tidak boleh kosong', 
					timeout:2000,
					showType:'show'
				});
				form.alamat.focus();
				return false;
			}
			else
			if(	tgl=="" || tgl==null)
			{
				$.messager.show({
					title:'Info',
					msg:'Maaf, Tanggal Pendaftaran tidak boleh kosong', 
					timeout:2000,
					showType:'show'
				});
				form.tgldaftar.focus();
				return false;
			}	
		}
	</script>