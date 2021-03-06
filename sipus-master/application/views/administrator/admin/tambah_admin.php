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
								<?php echo form_open_multipart('administrator/simpanadmin',array('onsubmit'=>'return validasi(this)'));?> 
									<div class="form-horizontal">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="id">Id</label>
											</div>
											<div class="col-xs-4">
												<input type="text" class="form-control" value="<?php echo $id_user;?>" name="id" id="id" readonly="readonly"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="username">Username</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="username" id="username"  >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="password">Password</label>
											</div>
											<div class="col-xs-5">
												<input type="password" class="form-control" name="password" id="password" >
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="user">Nama</label>
											</div>
											<div class="col-xs-5">
												<input type="text" class="form-control" name="user" id="user">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<label for="akses">Hak Akses</label>
											</div>
											<div class="col-xs-5">
												<?php 
													$attribute='class="table-group-action-input form-control select2me" id="akses"';
													$admin_selected= $this->input->post('akses')?$this->input->post('akses'):'';
													echo form_dropdown('akses',$dd_admin,$admin_selected,$attribute);
												?>
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-xs-3"></div>
											<div class="col-xs-8">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="<?=base_url();?>administrator/admin">
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
				var kode 	= $('#id').val();
				var u		= $('#username').val();
				var pass	= $('#password').val();
				var user	= $('#user').val();
				var lvl		= $('#level').val();
				if(	u=="" || u==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Username tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.username.focus();
					return false;
				}else
				if (
					pass==null || pass==""){
					$.messager.show({
						title:'Info',
						msg:'Maaf, Password tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.password.focus();
					return false;
				}else
				if(	user=="" || user==null)
				{
					$.messager.show({
						title:'Info',
						msg:'Maaf, Nama Operator Admin tidak boleh kosong', 
						timeout:2000,
						showType:'show'
					});
					form.user.focus();
					return false;
				}else
				if(
					form.level.value==null || form.level.value==""){
					$.messager.show({
						title:'Info',
						msg:'Maaf, Level Belum Dipilih', 
						timeout:2000,
						showType:'show'
					});
					form.level.focus();
					return false;
				}
			}
	</script>