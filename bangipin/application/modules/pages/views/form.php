
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject uppercase">Pages</span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?php echo form_open('pages/pages/simpan',array('id'=>'formpages','class'=>'form-horizontal form-row-stripped form-bordered'));?>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Pages:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id; ?>">
								<input class="form-control" type="text" name="pages" id="pages" value="<?php echo $pages; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Konten Pages:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<textarea class="form-control editor1" name="konten" ><?php echo $konten; ?></textarea>
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
							<label class="col-md-2 control-label">Posisi:<span class="text-danger"></span></label>
							<div class="col-md-10">
								<input class="form-control" type="text"  name="posisi" id="posisi" maxlength="4" value="<?=$posisi;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Layout: <span class="required">
							</span>
							</label>
							<div class="col-md-10">
								<?php 
								$attribute='class="table-group-action-input form-control select2me" id="layout"';
								$layout_sel= $this->input->post('layout')?$this->input->post('layout'):$layout;
								echo form_dropdown('layout',$dd_layout,$layout_sel,$attribute);
								?>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-8 col-md-4">
									<a href="<?=site_url('appweb/pages');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
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
