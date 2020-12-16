<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket"></i>
					<span class="caption-subject bold uppercase">
					Fan Page FB </span>
					<span class="caption-helper"></span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open('fb/fbpage/simpan',array('class'=>"form-horizontal form-row-seperated form-bordered form-label-stripped", 'id'=>"formfanpage"))?>
					<div class="form-body">
						<input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID">
						<div class="form-group">
							<label class="col-md-2 control-label">Application ID: <span class="required">* </span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="application_id" id="application_id" value="<?=$application_id;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">URL: <span class="required">* </span></label>
							<div class="col-md-10">
								<input type="text" class="form-control maxlength-handler" name="url_fp" id="url_fp" maxlength="50" value="<?=$url_fp;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">width: <span class="required">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control maxlength-handler" name="width" id="width" maxlength="3" value="<?=$width;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Height: <span class="required">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="height" id="height" value="<?=$height;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Show Face: <span class="required">* </span></label>
							<div class="col-md-10">
								<?php 
								$atributes="class='table-group-action-input form-control select2me'";
								$pilih_status=$this->input->post('show_face')? $this->input->post('show_face'):$show_face;
								echo form_dropdown('show_face',$dd_show_face,$pilih_status,$atributes);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Show Status: <span class="required">* </span></label>
							<div class="col-md-10">
								<?php 
								$atributes="class='table-group-action-input form-control select2me'";
								$pilih_status=$this->input->post('show_status')? $this->input->post('show_status'):$show_status;
								echo form_dropdown('show_status',$dd_show_status,$pilih_status,$atributes);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Show Header Fb: <span class="required">* </span></label>
							<div class="col-md-10">
								<?php 
								$atributes="class='table-group-action-input form-control select2me'";
								$pilih_status=$this->input->post('show_header_fb')? $this->input->post('show_header_fb'):$show_header_fb;
								echo form_dropdown('show_header_fb',$dd_show_header_fb,$pilih_status,$atributes);
								?>
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