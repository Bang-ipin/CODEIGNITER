<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket"></i>
					<span class="caption-subject bold uppercase">
					Konfigurasi </span>
					<span class="caption-helper"></span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open_multipart('settings/config/simpan',array('class'=>"form-horizontal form-bordered form-row-stripped", 'id'=>"formconfig"))?>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-10 col-md-2">
								<button class="btn btn-sm green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				    <input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID">
					<div class="tabbable">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_general" data-toggle="tab">
								General </a>
							</li>
							<li>
								<a href="#tab_data" data-toggle="tab">
								Data </a>
							</li>
							<li>
								<a href="#tab_meta" data-toggle="tab">
								Meta </a>
							</li>
							<li>
								<a href="#tab_images" data-toggle="tab">
								Images </a>
							</li>
							<li>
								<a href="#tab_social" data-toggle="tab">
								Social </a>
							</li>
							<!--li>
								<a href="#tab_others" data-toggle="tab">
								Others </a>
							</li-->
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_general">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Judul Situs: <span class="required">* </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="judul_situs" id="judul_situs" maxlength="70" value="<?=$judul;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Slogan: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="slogan" maxlength="100" value="<?=$slog;?>" placeholder="Slogan">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Deskripsi Situs: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" name="deskripsi_situs" rows="6" maxlength="500"><?=$deskripsi;?></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_data">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Telepon: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="telp" id="telepon" maxlength="13" value="<?=$telp;?>" placeholder="Telepon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Alamat: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="alamat" maxlength="300"><?=$almt;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Provinsi: <span class="required"></span></label>
										<div class="col-md-10">
										<?php 
											$attribute='id="provinsi" class="form-control select2me"';
											$selected= $this->input->post('provinsi')?$this->input->post('provinsi'):$provinsi;
											echo form_dropdown('provinsi',$kotaasal,$selected,$attribute);
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Email Web: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" rows="8" id="email" value="<?=$email;?>" name="email_web" maxlength="50"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Pemilik: <span class="required"></span></label>
										<div class="col-md-10">
											<input id="pemilik" name="pemilik" value="<?=$owner;?>" type="text" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Website</label>
										<div class="col-md-10">
											<input id="website" name="website" type="text" class="form-control" id="url" value="<?=$web;?>" />
											<span class="help-block">
											e.g: http://www.demo.com or http://demo.com </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Komentar</label>
										<div class="col-md-10">
											<input id="komentar" name="komentar" type="text" class="form-control tags" value="<?=$kmntr;?>" />
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_meta">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Meta Keywords:</label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="meta_keyword" maxlength="300"><?=$mekeyword;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Meta Description: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="meta_deskripsi" maxlength="160"><?=$medeskripsi;?></textarea>
											<span class="help-block">
											max 160 chars </span>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_images">
								<div class="form-group ">
									<label class="col-md-2 control-label">Favicon:<span class="text-danger">*</span></label>
									<div class="col-md-10">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
												<?php if(empty($fvc)){ ?>
													<img src="<?php echo base_url('assets/admin/layout/img/no-image.jpg');?>" style="width:100px;height:100px;" alt="favicon"/>
												<?php }else{ ?>
													<img src="<?php echo base_url('files/media/'.$fvc);?>" style="width:100px;height:100px;"  alt="favicon"/>
												<?php } ?>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;"></div>
											<div>
												<span class="btn btn-primary btn-file">
													<span class="fileinput-new">Select image </span>
													<span class="fileinput-exists">Change </span>
													<input type="file" name="favicon">
												</span>
												<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
												<input type="hidden"  class="form-control" name="faviconlama" value="<?=$favicon;?>">
											</div>
											<span class="help-block">Max Dimension Image 900 x 900 px </span>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_social">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Facebook: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="facebook" value="<?=$facebook;?>" placeholder="">
											<span class="help-block">
											Contoh :bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Twitter: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="twitter" value="<?=$twitter;?>" placeholder="">
											<span class="help-block">
											Contoh : bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Instagram: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="instagram"  value="<?=$instagram;?>" placeholder="">
											<span class="help-block">
											Contoh : bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Google Plus: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="googleplus" value="<?=$googleplus;?>" placeholder="">
											<span class="help-block">
											Contoh :+Bangipin15 </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Tumblr: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="tumblr"  value="<?=$tumblr;?>" placeholder="">
											<span class="help-block">
											Contoh :bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Linked In: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control " name="linkedin" value="<?=$linkedin;?>" placeholder="">
											<span class="help-block">
											Contoh :bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Youtube: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="youtube" value="<?=$youtube;?>" placeholder="">
											<span class="help-block">
											Masukkan Username Youtube </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Vimeo: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="vimeo"  value="<?=$vimeo;?>" placeholder="">
											<span class="help-block">
											Masukkan Username Vimeo </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Skype: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="skype" value="<?=$skype;?>" placeholder="">
											<span class="help-block">
											Masukkan URL Skype</span>
										</div>
									</div>
									
									
								</div>
							</div>
							<!--div class="tab-pane" id="tab_others">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Insert Javascript Header: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea rows="6" class="form-control" name="javascript_header"><?=$javascript_header;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Insert Javascript Footer: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea rows="6" class="form-control" name="javascript_footer"><?=$javascript_footer;?></textarea>
										</div>
									</div>
								</div>
							</div-->
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-10 col-md-2">
								<button class="btn btn-sm green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>