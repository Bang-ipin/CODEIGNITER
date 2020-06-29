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
								<?php echo form_open_multipart('admin/simpaneditmateri',array('onsubmit'=>'return validasi(this)'));?> 
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="judul">Judul</label>
											</div>
											<div class="col-xs-5">
											<input type="hidden" class="form-control" value="<?php echo 	$rows->id_materi;?>" name="id" id="id" readonly="readonly"  >
												<input type="text" class="form-control" name="judulmateri" id="judulmateri" value="<?php echo $rows->judul_materi;?>" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="pengampu">Pengampu</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="pengampu" id="pengampu" value="<?php echo $rows->nama_pengampu;?>" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="tanggal_upload">Tanggal Upload</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="tanggal_upload" id="tanggal_upload" value="<?php echo $this->M_admin->tgl_str($rows->tanggal_upload);?>" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="files">Files</label>
											</div>
											<div class="col-xs-5">
												<input type="file" class="form-control" name="files" id="files" required>
												<input type="hidden" class="form-control" name="filelama" id="filelama" value="<?php echo $rows->files;?>">
												<span class="help-block">File .txt tidak akan di download</span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3"></div>
											<div class="col-xs-8">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>admin/materi">
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
				var judul		= $('#judulmateri').val();
				var pengampu	= $('#pengampu').val();
				var tgl			= $('#tanggal_upload').val();
				
				if(	judul	=="" || judul==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Judul Materi tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.judulmateri.focus();
					return false;
				}
				
				else
				if(	pengampu=="" || pengampu==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Nama Pengampu tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.pengampu.focus();
					return false;
				}
				
				else
				if(	tgl=="" || tgl==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Tanggal Upload Belum Dipilih', 
						timeout:2000,
						showType:'show'
					});
					form.tanggal_upload.focus();
					return false;
				}
				
			}
			$(function(){
				$('#tanggal_upload').datetimepicker({
				lang:'en',
				timepicker:false,
				format:'d-m-Y',
				closeOnDateSelect:true,
				showAnim:'slide',
				});
			});
	</script>