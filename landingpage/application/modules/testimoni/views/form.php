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
				<?php echo form_open_multipart('testimoni/testimoni/simpan',array('id'=>"formdownload",'class'=>'form-horizontal form-bordered form-row-stripped'));?>
					<div class="form-body">
						<div class="form-group">
							<input class="form-control" type="hidden" id="id" name="id"  value="<?php echo $id; ?>">
							<label class="col-md-2 control-label">Nama:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="namaclient" name="namaclient"  value="<?php echo $namaclient; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="emailclient" name="emailclient"  value="<?php echo $emailclient; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Testimoni: <span class="required"></span></label>
							<div class="col-md-10">
								<textarea class="form-control maxlength-handler" rows="8" name="testimoni" maxlength="500"><?=$testimoni;?></textarea>
								<span class="help-block">
								max 500 chars </span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('administrator/landingpage-testimoni');?>" class="btn btn-danger btn-xs btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn green-haze btn-xs btn-circle"  name="submit" ><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>