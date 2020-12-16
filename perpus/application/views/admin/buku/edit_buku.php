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
								<?php echo form_open_multipart('admin/simpaneditbuku',array('onsubmit'=>'return validasi(this)'));?> 
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="id">Kode</label>
											</div>
											<div class="col-xs-4">
												<input type="hidden" class="form-control" value="<?php echo $rows->id_buku;?>" name="id" id="id" readonly="readonly"  >
												<input type="hidden" class="form-control" value="<?php echo $rows->status_buku;?>" name="status" id="status" readonly="readonly"  >
												<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $rows->kode_buku;?>" placeholder="Kode Buku">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="judul">Judul buku</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="judulbuku" id="judulbuku" value="<?php echo $rows->judul_buku;?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="kategori">Kategori buku</label>
											</div>
											<div class="col-xs-5">
												<?php
													$attr		=" class='form-control select2' id='kategori'";
													$kat_select=$this->input->post('kategori')? $this->input->post('kategori'):$rows->id_kategori;
													echo form_dropdown('kategori',$dd_kategori,$kat_select,$attr);
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="pengarang">Pengarang</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="pengarang" id="pengarang" value="<?php echo $rows->nama_pengarang;?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="penerbit">Penerbit</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="penerbit" id="penerbit" value="<?php echo $rows->penerbit;?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="password">Tahun Terbit</label>
											</div>
											<div class="col-xs-5">
												<?php
												$attr		=" class='form-control select2' id='thnterbit'";
												$thn_select	=$this->input->post('tahunterbit')? $this->input->post('tahunterbit'):$rows->tahun_terbit;
												echo form_dropdown('tahunterbit',$dd_tahun,$thn_select,$attr);
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="lokasi">Lokasi Buku</label>
											</div>
											<div class="col-xs-5">
												<?php
												$attr		=" class='form-control select2' id='lokasirak'";
												$rak_select=$this->input->post('rak')? $this->input->post('rak'):$rows->id_rak;
												echo form_dropdown('rak',$dd_rak,$rak_select,$attr);
												?>
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-xs-3"></div>
											<div class="col-xs-8">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>admin/buku">
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
			$("#kode").keyup(function(e){
				var isi = $(e.target).val();
				$(e.target).val(isi.toUpperCase());
			});
			function validasi(form){
				var kode 		= $('#kode').val();
				var judul		= $('#judulbuku').val();
				var kategori	= $('#kategori').val();
				var pengarang	= $('#pengarang').val();
				var penerbit	= $('#penerbit').val();
				var thnterbit	= $('#thnterbit').val();
				var rak			= $('#lokasirak').val();
				
				if(	kode	=="" || kode==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Kode Buku tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.kode.focus();
					return false;
				}else
				if(	judul=="" || judul==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Judul Buku tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.judulbuku.focus();
					return false;
				}
				else
				if(	kategori=="" || kategori==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Nama Kategori Buku tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.kategori.focus();
					return false;
				}
				else
				if(	pengarang=="" || pengarang==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Nama Pengarang Buku tidak boleh kosong', 
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
						msg:'Maaf, Nama Penerbit Buku tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.penerbit.focus();
					return false;
				}
				else
				if(	thnterbit=="" || thnterbit==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Tahun Terbit Buku Belum Dipilih', 
						timeout:2000,
						showType:'show'
					});
					form.thnterbit.focus();
					return false;
				}
				else
				if (
					rak==null || rak==""){
					$.messager.show({
						title:'Info',
						msg:'Maaf, Lokasi Buku Belum dipilih', 
						timeout:2000,
						showType:'show'
					});
					form.lokasirak.focus();
					return false;
				}	
			}
			$(document).ready(function() { 
				$("#jumlah").keypress(function(data){
					if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
						return false;
					}
				});

			});
			$('#kategori').change(function(){
				var idrak = $('#kategori').val();
				$.ajax({
					type : 'GET',
					url : '<?=site_url('admin/getlokasirak');?>',
					data :  'rakid=' + idrak,
						success: function (data) {
						$("#lokasirak").html(data);
					}
				});
				});
	</script>