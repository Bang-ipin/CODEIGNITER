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
				<?php echo form_open_multipart('landingpage/landingpage/simpan_home',array('class'=>"form-horizontal form-bordered form-row-stripped", 'id'=>""))?>
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
								<a href="#tab_home" data-toggle="tab">
								Home </a>
							</li>
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_home">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Judul: <span class="required">* </span></label>
										<div class="col-md-10">
											<input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID" readonly>
											<input type="text" class="form-control maxlength-handler" name="judul" id="judul" maxlength="70" value="<?=$judul;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Deskripsi: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" name="deskripsi" rows="6" maxlength="500"><?=$deskripsi;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Link: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="link" maxlength="100" value="<?=$link;?>" placeholder="Link">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Text Link: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="textlink" maxlength="100" value="<?=$textlink;?>" placeholder="Text Link">
										</div>
									</div>
									<div class="form-group ">
										<label class="col-md-2 control-label">Background:<span class="text-danger">*</span></label>
										<div class="col-md-10">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 300px; height: 300px;">
													<?php if(empty($image)){ ?>
														<img src="<?php echo base_url('assets/admin/layout/img/no-image.jpg');?>" style="width:300px;height:300px;" alt="background"/>
													<?php }else{ ?>
														<img src="<?php echo base_url('files/media/'.$image);?>" style="width:300px;height:300px;"  alt="background"/>
													<?php } ?>
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 300px;"></div>
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