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
								<?php echo form_open_multipart('admin/simpankategori',array('onsubmit'=>'return validasi(this)'));?> 
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="id">Id</label>
											</div>
											<div class="col-xs-4">
												<input type="text" class="form-control" value="<?php echo $id_kategori;?>" name="id" id="id" readonly="readonly"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="nama">Nama Kategori</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="namakategori" id="namakategori">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3"></div>
											<div class="col-xs-8">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>admin/kategori">
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
			function validasi(form){
				var kode = $('#id').val();
				var nama=$('#namakategori').val();
				if(	kode=="" || kode==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, ID tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.id.focus();
					return false;
				}else
				if(	nama=="" || nama==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Nama Kategori Buku tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.namakategori.focus();
					return false;
				}
			}
		</script>