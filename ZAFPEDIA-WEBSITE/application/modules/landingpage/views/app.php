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
				<?php echo form_open_multipart('landingpage/landingpage/simpan_app',array('class'=>"form-horizontal form-bordered form-row-stripped", 'id'=>""))?>
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
								<a href="#tab_app" data-toggle="tab">
								App </a>
							</li>
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_app">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">App-Icon 1: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID" readonly>
											<input type="text" class="form-control" name="appicon1" id="appicon1" value="<?=$appicon1;?>" placeholder="App Icon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nama: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="appfeatures1" id="appfeatures1" value="<?=$appfeatures1;?>" placeholder="Nama">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="appdeskripsi1" maxlength="300"><?=$appdeskripsi1;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<hr/>
									<div class="form-group">
										<label class="col-md-2 control-label">App-Icon 2: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="appicon2" id="appicon2" value="<?=$appicon2;?>" placeholder="App Icon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nama: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="appfeatures2" id="appfeatures2" value="<?=$appfeatures2;?>" placeholder="Nama">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="appdeskripsi2" maxlength="300"><?=$appdeskripsi2;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<hr/>
									<div class="form-group">
										<label class="col-md-2 control-label">App-Icon 3: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="appicon3" id="appicon3" value="<?=$appicon3;?>" placeholder="App Icon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nama: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="appfeatures3" id="appfeatures3" value="<?=$appfeatures3;?>" placeholder="Nama">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="appdeskripsi3" maxlength="300"><?=$appdeskripsi3;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<!--<hr/>
									<div class="form-group">
										<label class="col-md-2 control-label">App-Icon 4: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="appicon4" id="appicon4" value="<?=$appicon4;?>" placeholder="App Icon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nama: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="appfeatures4" id="appfeatures4" value="<?=$appfeatures4;?>" placeholder="Nama">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="appdeskripsi4" maxlength="300"><?=$appdeskripsi4;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<!--
									<div class="form-group ">
										<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
										<div class="col-md-10">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 300px; height: 150px;">
													<?php if(empty($image)){ ?>
														<img src="<?php echo base_url('assets/admin/layout/img/no-image.jpg');?>" style="width:300px;height:150px;" alt="background"/>
													<?php }else{ ?>
														<img src="<?php echo base_url('assets/frontend/img/mockups/'.$image);?>" style="width:300px;height:150px;"  alt="background"/>
													<?php } ?>
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 150px;"></div>
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
									-->
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