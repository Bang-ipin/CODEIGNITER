<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject uppercase">Level Pendidikan</span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?php echo form_open('jobs_level/jobs_level/simpan',array('id'=>'formpendidikan','class'=>'form-horizontal form-bordered form-row-stripped'));?>
						<div class="form-group">
							<label class="col-md-2 control-label">Tag <span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
								<input class="form-control" type="text" id="pendidikan" name="pendidikan" value="<?php echo $pendidikan; ?>" />
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-8 col-md-4">
									<a href="<?=site_url('appweb/jobs-level');?>" class="btn btn-sm btn-danger btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
									<button class="btn btn-sm green-haze btn-circle"  name="submit" ><i class="fa fa-check"></i> Save</button>
								</div>
							</div>
						</div>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>