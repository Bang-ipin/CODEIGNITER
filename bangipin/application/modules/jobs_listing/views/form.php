<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus "></i>
					<span class="caption-subject uppercase">Tambah Pekerjaan </span>
				</div>
			</div>
			<div class="form">
				<?php echo form_open_multipart('jobs_listing/jobs/simpan',array('id'=>'formpekerjaan','class'=>'form-horizontal'));?>
					<div class="row margin-bottom-25 produk-block">
						<div class="form-body">
							<div class="alert alert-danger display-hide">
								<button class="close" data-close="alert"></button>
								You have some form errors. Please check below.
							</div>
							<h3 class="block">Detail Pekerjaan</h3>
							<div class="form-group">
								<input type="hidden" class="form-control" name="id" value="<?=$id?>" readonly="true">
								<label class="col-md-2 control-label"> Judul Pekerjaan: <span class="required">* </span></label>
								<div class="col-md-10">
									<input type="text" class="form-control maxlength-handler" maxlength="120"name="nama_pekerjaan" id="nama_pekerjaan" value="<?=$nama_pekerjaan?>" required>
									<div style="margin-top: 0px; color: red;"><?= form_error('nama_pekerjaan'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Description: <span class="required"></span></label>
								<div class="col-md-10">
									<textarea class="form-control editor1" id="deskripsi" name="deskripsi"  data-error-container ="#deskripsi_error" ><?=$deskripsi?></textarea>
									<div id="deskripsi_error"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Short Description: <span class="required">
								</span>
								</label>
								<div class="col-md-10">
									<textarea class="form-control" name="short_deskripsi" id="editorsummernote" rows="8"  data-error-container ="#short_deskripsi_error"><?=$short_deskripsi?></textarea>
									<span class="help-block">shown in product listing </span>
									<div id="short_deskripsi_error"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Kategori: <span class="required">*</span></label>
								<div class="col-md-10">
									<?php 
									$attribute='class="table-group-action-input form-control select2me" required';
									$kat_selected= $this->input->post('kategori')? $this->input->post('kategori'):$kategori;
									echo form_dropdown('kategori',$category,$kat_selected,$attribute);
									?>
									<div style="margin-top: 0px; color: red;"><?= form_error('kategori'); ?></div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="row margin-bottom-25 produk-block">
						<div class="form-body">
						<h3 class="block">Detail Info</h3>
							<div class="form-group">
								<label class="col-md-2 control-label">Provinsi</label>
								<div class="col-md-10">
								<?php 
									$attribute='class="table-group-action-input form-control select2me" id="destination"';
									$selected= $this->input->post('province')?$this->input->post('province'):$provinsi;
									echo form_dropdown('province',$dd_province,$selected,$attribute);
								?>
									<div style="margin-top: 0px; color: red;"><?= form_error('province'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Kota/Kab</label>
								<div class="col-md-10">
									<?php 
									$attribute='class="table-group-action-input form-control select2me" id="kabupatenkota"';
									$selected= $this->input->post('kota')?$this->input->post('kota'):$kota;
									echo form_dropdown('kota',$dd_kotakab,$selected,$attribute);
									?>
									<div style="margin-top: 0px; color: red;"><?= form_error('kotakab'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Gaji: <span class="required">* </span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="gaji" id="gaji" value="<?=$gaji?>" required>
									<div style="margin-top: 0px; color: red;"><?= form_error('gaji'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Status: <span class="required">* </span>	</label>
								<div class="col-md-10">
									<?php 
									$attribute="id='status' class='table-group-action-input form-control select2me' required";
									$pilih_status=$this->input->post('status')? $this->input->post('status'):$status;
									echo form_dropdown('status',$dd_status_pekerjaan,$pilih_status,$attribute);
									?>
									<div style="margin-top: 0px; color: red;"><?= form_error('status'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Pendidikan</label>
								<div class="col-md-10">
									<?php 
										$attribute="id='pendidikan' class='table-group-action-input form-control select2me' required";
										$pendidikan_selected= $this->input->post('pendidikan')?$this->input->post('pendidikan'):$pendidikan;
										echo form_dropdown('pendidikan',$levelpendidikan,$pendidikan_selected,$attribute);
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Tipe Pekerjaan: <span class="required"></span></label>
								<div class="col-md-10">
									<?php 
									$attribute='id="label" class="table-group-action-input form-control select2me"';
									$label_selected= $this->input->post('label')?$this->input->post('label'):$label;
									echo form_dropdown('label',$dd_label,$label_selected,$attribute);
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Batas Waktu: <span class="required"></span></label>
								<div class="col-md-10">
									<input class="form-control" name="bataswaktu"  id="bataswaktu" value="<?php echo $bataswaktu;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Email Perusahaan: <span class="required"></span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="email" id="email" value="<?=$email?>" >
								</div>
							</div>
						</div>
					</div>
			
					<div class="row margin-bottom-25 produk-block">
						<div class="form-body">
							<h3 class="block">Detail Meta</h3>
							<div class="form-group">
								<label class="col-md-2 control-label">Meta Description:</label>
								<div class="col-md-10">
									<textarea class="form-control maxlength-handler" rows="8" name="meta_description"  maxlength="255"><?=$meta_description;?></textarea>
									<span class="help-block">
									max 255 chars </span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Meta Keywords:</label>
								<div class="col-md-10">
									<textarea class="form-control maxlength-handler" rows="8" name="meta_keywords" maxlength="1000"><?=$meta_keywords;?></textarea>
									<span class="help-block">
									max 1000 chars </span>
								</div>
							</div>
						</div>
					</div>
				
					<div class="row margin-bottom-25 produk-block">
						<div class="form-body">
							<h3 class="block">Detail Perusahaan</h3>
							<div class="form-group">
								<label class="col-md-2 control-label">Nama Perusahaan: <span class="required">* </span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="perusahaan" id="perusahaan" value="<?=$perusahaan?>" required>
									<div style="margin-top: 0px; color: red;"><?= form_error('perusahaan'); ?></div>
								</div>
							</div>
							<?php if(isset($img)){?>
							<div class="form-group ">
								<label class="col-md-2 control-label">Logo:<span class="text-danger">*</span></label>
								<div class="col-md-10">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<?php if(empty($img)){ ?>
												<img src="<?php echo base_url('assets/admin/img/no-image.jpg');?>" style="width:200px;height:150px;" alt=""/>
											<?php }else{ ?>
												<img src="<?php echo base_url('files/media/'.$img);?>" style="width:200px;height:150px;"  alt=""/>
											<?php } ?>
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-primary btn-file">
												<span class="fileinput-new">Select image </span>
												<span class="fileinput-exists">Change </span>
												<input type="file" name="image">
											</span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
										</div>
									</div>
								</div>
							</div>
							<?php }else{ ?>
							<div class="form-group ">
								<label class="col-md-2 control-label">Logo:<span class="text-danger">*</span></label>
								<div class="col-md-10">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
											<?php if(empty($image)){ ?>
												<img src="<?php echo base_url('assets/admin/img/no-image.jpg');?>" style="width:200px;height:150px;" alt="image"/>
											<?php }else{ ?>
												<img src="<?php echo base_url('files/media/'.$image);?>" style="width:200px;height:150px;"  alt="image"/>
											<?php } ?>
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-primary btn-file">
												<span class="fileinput-new">Select image </span>
												<span class="fileinput-exists">Change </span>
												<input type="file" name="image">
											</span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
											<input type="hidden"  class="form-control" name="imagelama" value="<?=$image;?>">
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('appweb/jobs')?>" class="btn btn-sm btn-danger btn-circle">
									<i class="fa fa-angle-left"></i><span class="hidden-480"> Back</span>
								</a>
								<button class="btn btn-sm green-haze btn-circle" name="submit"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
