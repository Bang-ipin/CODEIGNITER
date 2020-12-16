
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject uppercase">Menu</span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?php echo form_open('menu/menu/simpan',array('id'=>'formmenu','class'=>'form-horizontal form-row-stripped form-bordered'));?>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Menu:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id; ?>">
								<input class="form-control" type="hidden" name="parent_id" id="parent_id" value="<?php echo $parent_id; ?>" >
								<input class="form-control" type="text" name="menu" id="menu" value="<?php echo $menu; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Root: <span class="required"></span></label>
							<div class="col-md-10">
								<?php 
								$attribute='class="table-group-action-input form-control select2me" id="root"';
								$level_selected= $this->input->post('root')?$this->input->post('root'):$root;
								echo form_dropdown('root',$dd_parent,$level_selected,$attribute);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Status: <span class="required">
							</span>
							</label>
							<div class="col-md-10">
								<?php 
								$attribute='class="table-group-action-input form-control select2me" id="status"';
								$status_selected= $this->input->post('status')?$this->input->post('status'):$status;
								echo form_dropdown('status',$dd_status,$status_selected,$attribute);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Type: <span class="required"></span></label>
							<div class="col-md-10">
								<?php 
								$attribute='class="table-group-action-input form-control select2me" id="type"';
								$type_selected= $this->input->post('type')?$this->input->post('type'):$type;
								echo form_dropdown('type',$dd_type,$type_selected,$attribute);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">URL:<span class="text-danger"></span></label>
							<div class="col-md-10">
								<input class="form-control" type="text"  name="url" id="url" value="<?=$url;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Posisi:<span class="text-danger"></span></label>
							<div class="col-md-10">
								<input class="form-control" type="text"  name="posisi" id="posisi" maxlength="4" value="<?=$posisi;?>">
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-8 col-md-4">
									<a href="<?=site_url('appweb/menu');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
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
</div>
