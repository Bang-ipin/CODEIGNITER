<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject bold uppercase">Level</span>
				</div>
			</div>
			<div class="portlet-body form">
				<?=form_open('level/levels/simpan', array('id'=>"formlevel",'class'=>"form-horizontal form-bordered form-label-stripped"));?>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-2 control-label">ID <span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="id" id="id" maxlength="2" value="<?php echo $id; ?>" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Level<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="level" id="level" value="<?php echo $level; ?>">
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('administrator/level');?>" class="btn btn-xs btn-danger btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn btn-xs btn-warning btn-circle" name="reset" id="reset" type="reset" ><i class="fa fa-reply"></i> Reset</button>
								<button class="btn btn-xs green-haze btn-circle"  name="submit" ><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
