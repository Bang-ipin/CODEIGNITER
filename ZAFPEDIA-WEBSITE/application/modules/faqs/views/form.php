
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject uppercase">FAQ</span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?php echo form_open('faqs/faqs/simpan',array('id'=>'formfaq','class'=>'form-horizontal form-row-stripped form-bordered'));?>
						<div class="form-group">
							<label class="col-md-2 control-label">Pertanyaan:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id; ?>">
								<input class="form-control" type="text" name="pertanyaan" id="pertanyaan" value="<?php echo $pertanyaan; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jawaban:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<textarea class="form-control editor1" type="text" name="jawaban" data-error-container="#jawaban"><?php echo $jawaban; ?></textarea>
								<div id="jawaban"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Collapse:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="collapse" id="collapse" value="<?php echo $collapse; ?>" readonly>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-8 col-md-4">
									<a href="<?=site_url('appweb/faqs');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
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
