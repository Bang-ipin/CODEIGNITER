<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift "></i>
					<span class="caption-subject bold uppercase">Download</span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open_multipart('downloads/downloads/simpan',array('id'=>"formdownload",'class'=>'form-horizontal form-bordered form-row-stripped'));?>
					<div class="form-body">
						<div class="form-group">
							<input class="form-control" type="hidden" id="id" name="id"  value="<?php echo $id; ?>">
							<label class="col-md-2 control-label">Judul:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="judul" name="judul"  value="<?php echo $judul; ?>">
							</div>
						</div>
						<div class="form-group">
							<input class="form-control" type="hidden" id="id" name="id"  value="<?php echo $id; ?>">
							<label class="col-md-2 control-label">URL:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="url" name="url"  value="<?php echo $url; ?>">
							</div>
						</div>
						<?php if(isset($img)){?>
						<div class="form-group ">
							<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<?php if(empty($img)){ ?>
											<img src="<?php echo base_url('assets/admin/layout/img/no-image.jpg');?>" style="width:200px;height:150px;" alt=""/>
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
						<?php }else{?>
						<div class="form-group ">
							<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<?php if(empty($image)){ ?>
											<img src="<?php echo base_url('assets/admin/layout/img/no-image.jpg');?>" style="width:200px;height:150px;" alt=""/>
										<?php }else{ ?>
											<img src="<?php echo base_url('files/media/'.$image);?>" style="width:200px;height:150px;"  alt=""/>
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
						<div class="form-group ">
							<label class="col-md-2 control-label">File:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="file" name="nama_file">
								<input type="hidden"  class="form-control" name="file_lama" value="<?=$nama_file;?>">
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('appweb/downloads');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn btn-warning btn-sm btn-circle" name="reset" id="reset" type="reset" ><i class="fa fa-reply"></i> Reset</button>
								<button class="btn green-haze btn-sm btn-circle"  name="submit" ><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>