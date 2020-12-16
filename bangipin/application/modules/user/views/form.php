<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject bold uppercase">User</span>
				</div>
			</div>
				
			<div class="portlet-body form">
				<?=form_open_multipart('user/user/simpan', array('id'=>"formuser",'class'=>"form-horizontal form-bordered form-label-stripped"));?>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('appweb/user');?>" class="btn btn-sm btn-danger btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn btn-sm  btn-warning btn-circle" name="reset" id="reset" type="reset" ><i class="fa fa-reply"></i> Reset</button>
								<button class="btn btn-sm  green-haze btn-circle"  name="submit" id="submituser"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
					<div class="form-body ">
						<div class="form-group">
							<label class="col-md-2 control-label">Username <span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="username" name="username" value="<?php echo $username; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password <span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="password" id="password" name="password" value="<?php echo $password; ?>">
								<span class="help-block">
								Password Boleh di Kosongkan jika tidak diedit </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama&nbsp;Lengkap <span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="user" value="<?php echo $user; ?>" name="user" placeholder="Nama Lengkap" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email<span class="required">*</span></label>
							<div class="col-md-10">
								<input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email" />
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Telepon<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="telepon" maxlength="13" value="<?php echo $telepon; ?>" name="telepon" placeholder="Telepon" >
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
							<label class="col-md-2 control-label">Status: <span class="required">*</span></label>
							<div class="col-md-10">
								<?php 
								$atributes="class='table-group-action-input form-control select2me'";
								$pilih_status=$this->input->post('status')? $this->input->post('status'):$status;
								echo form_dropdown('status',$dd_status,$pilih_status,$atributes);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Level: <span class="required">*</span></label>
							<div class="col-md-10">
								<?php 
								$atributes="class='table-group-action-input form-control select2me'";
								$pilih_status=$this->input->post('level')? $this->input->post('level'):$level;
								echo form_dropdown('level',$dd_level,$pilih_status,$atributes);
								?>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('appweb/user');?>" class="btn btn-sm btn-danger btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn btn-sm  btn-warning btn-circle" name="reset" id="reset" type="reset" ><i class="fa fa-reply"></i> Reset</button>
								<button class="btn btn-sm  green-haze btn-circle"  name="submit" id="submituser"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?=form_close();?>
			</div>
		</div>
	</div>
</div>


