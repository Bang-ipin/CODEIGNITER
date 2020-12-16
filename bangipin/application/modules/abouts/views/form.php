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
				<?php echo form_open_multipart('abouts/abouts/simpan',array('class'=>"form-horizontal form-bordered form-row-stripped", 'id'=>"formabouts"))?>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-10 col-md-2">
								<button class="btn btn-sm green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
					<div class="tabbable">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_general" data-toggle="tab">
								General </a>
							</li>
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_general">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Deskripsi Utama: <span class="required">* </span></label>
										<div class="col-md-10">
											<input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID">
											<textarea class="form-control editor1" name="deskripsi1" rows="6"><?=$deskripsi1;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Deskripsi Singkat: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" name="deskripsi2" rows="6" maxlength="500"><?=$deskripsi2;?></textarea>
										</div>
									</div>
									<div class="form-group ">
										<label class="col-md-2 control-label">Gambar:<span class="text-danger">*</span></label>
										<div class="col-md-10">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<?php if(empty($gambar)){ ?>
														<img src="<?php echo base_url('assets/admin/img/no-image.jpg');?>" style="width:200px;height:150px;" alt="gambar"/>
													<?php }else{ ?>
														<img src="<?php echo base_url('files/media/'.$gambar);?>" style="width:200px;height:150px;"  alt="gambar"/>
													<?php } ?>
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
												<div>
													<span class="btn btn-primary btn-file">
														<span class="fileinput-new">Select image </span>
														<span class="fileinput-exists">Change </span>
														<input type="file" name="gambar">
													</span>
													<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
													<input type="hidden"  class="form-control" name="gambarlama" value="<?=$gambar;?>">
												</div>
												<span class="help-block">Max Dimension Image 900 x 900 px </span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Fitur 1: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="judul1" maxlength="100" value="<?=$judul1;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan : <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" name="text1" rows="6" maxlength="500"><?=$text1;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Fitur 2: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="judul2" maxlength="100" value="<?=$judul2;?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan : <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" name="text2" rows="6" maxlength="500"><?=$text2;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Fitur 3: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="judul3" maxlength="100" value="<?=$judul3;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan : <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" name="text3" rows="6" maxlength="500"><?=$text3;?></textarea>
										</div>
									</div>
								</div>
							</div>
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