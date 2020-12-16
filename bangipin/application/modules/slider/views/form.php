<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift "></i>
					<span class="caption-subject uppercase">Slider</span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?php echo form_open_multipart('slider/sliders/simpan',array('id'=>'formslider','class'=>'form-horizontal form-row-stripped form-bordered'));?>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="hidden" id="id" value="<?php echo $id; ?>" name="id" readonly>
								<input class="form-control" type="text" id="name" value="<?php echo $name; ?>" name="name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Deskripsi:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="deskripsi" value="<?php echo $deskripsi; ?>" name="deskripsi">
							</div>
						</div>
						<?php if(isset($img)){?>
						<div class="form-group ">
							<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
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
						<?php }else{?>
						<div class="form-group ">
							<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<?php if(empty($image)){ ?>
											<img src="<?php echo base_url('assets/admin/img/no-image.jpg');?>" style="width:200px;height:150px;" alt=""/>
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
						<div class="form-group">
							<label class="col-md-2 control-label">Status: <span class="required">
							* </span>
							</label>
							<div class="col-md-10">
								<?php 
								$atributes="class='table-group-action-input form-control select2me'";
								$pilih_status=$this->input->post('status')? $this->input->post('status'):$status;
								echo form_dropdown('status',$dd_status,$pilih_status,$atributes);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Type: <span class="required">* </span></label>
							<div class="col-md-10">
								<?php 
								$atributes="class='table-group-action-input form-control select2me'";
								$pilih_type=$this->input->post('type')? $this->input->post('type'):$type;
								echo form_dropdown('type',$dd_type,$pilih_type,$atributes);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Posisi:<span class="required"></span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="posisi" value="<?=$posisi;?>" name="posisi">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">URL:</label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="link" value="<?=$link;?>" name="link">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Button Text:</label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="textbutton" value="<?=$textlink;?>" name="textbutton">
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-8 col-md-4">
									<a href="<?=site_url('appweb/sliders');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
									<button class="btn green-haze btn-sm btn-circle"  name="submit" ><i class="fa fa-check"></i> Save</button>
								</div>
							</div>
						</div>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>
