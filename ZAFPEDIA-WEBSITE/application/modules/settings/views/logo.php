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
				<?php echo form_open_multipart('settings/config/savelogo',array('class'=>"form-horizontal form-bordered form-row-stripped", 'id'=>"formconfig"))?>
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
								<a href="#tab_logo" data-toggle="tab">
								Logo </a>
							</li>
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_logo">
								<div class="form-group ">
									<label class="col-md-2 control-label">Logo:<span class="text-danger">*</span></label>
									<div class="col-md-10">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: 80px;">
												<?php if(empty($lg)){ ?>
													<img src="<?php echo base_url('asset/admin/layout/img/no-image.jpg');?>" style="width:200px;height:80px;" alt="Logo"/>
												<?php }else{ ?>
													<img src="<?php echo base_url('files/media/'.$lg);?>" style="width:200px;height:80px;"  alt="Logo"/>
												<?php } ?>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 80px;"></div>
											<div>
												<span class="btn btn-primary btn-file">
													<span class="fileinput-new">Select image </span>
													<span class="fileinput-exists">Change </span>
													<input type="file" name="logo">
												</span>
												<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
												<input type="hidden"  class="form-control" name="logolama" value="<?=$logo;?>">
												<input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID">
											</div>
											<span class="help-block">Max Dimension Image 900 x 900 px </span> 
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