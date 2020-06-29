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
								<?php echo form_open_multipart('admin/simpanebook',array('onsubmit'=>'return validasi(this)'));?> 
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="judul">Judul </label>
											</div>
											<div class="col-xs-5">
												<input type="hidden" class="form-control" value="<?php echo $id_ebook;?>" name="id" id="id" readonly="readonly"  >
												<input type="text" class="form-control" name="judulbuku" id="judulbuku" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="kategori">Kategori</label>
											</div>
											<div class="col-xs-5">
												<?php
													$attr		=" class='form-control select2' id='kategori' required";
													$kat_select=$this->input->post('kategori')? $this->input->post('kategori'):'';
													echo form_dropdown('kategori',$dd_kategori,$kat_select,$attr);
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="pengarang">Pengarang</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="pengarang" id="pengarang" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="penerbit">Penerbit</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="penerbit" id="penerbit" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="tahunterbit">Tahun Terbit</label>
											</div>
											<div class="col-xs-5">
												<?php
												$attr		=" class='form-control select2' id='thnterbit' required";
												$thn_select	=$this->input->post('tahunterbit')? $this->input->post('tahunterbit'):'';
												echo form_dropdown('tahunterbit',$dd_tahun,$thn_select,$attr);
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="files">Files</label>
											</div>
											<div class="col-xs-5">
												<input type="file" class="form-control" name="files" id="files" required>
												<span class="help-block">File .txt tidak akan di download</span>
											</div>
										</div>										
										<div class="form-group">
											<div class="col-xs-3"></div>
											<div class="col-xs-8">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>admin/ebook">
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
			$(document).ready(function() {
				function validasi(form){
					var judul		= $('#judulbuku').val();
					var kategori	= $('#kategori').val();
					var pengarang	= $('#pengarang').val();
					var penerbit	= $('#penerbit').val();
					var thnterbit	= $('#thnterbit').val();
					
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
							msg:'Maaf, Kategori Buku belum dipilih', 
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
							msg:'Maaf, Nama enerbit Buku tidak boleh kosong', 
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
							msg:'Maaf, Tahun terbit Belum dipilih', 
							timeout:2000,
							showType:'show'
						});
						form.thnterbit.focus();
						return false;
					}
				}
			});
			
		</script>