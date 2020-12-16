<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket"></i>
					<span class="caption-subject bold uppercase">
					Maps </span>
					<span class="caption-helper"></span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open('lokasi/maps/simpan',array('class'=>"form-horizontal form-row-seperated form-bordered form-label-stripped", 'id'=>"formlokasi"))?>
					<div class="form-body">
						<input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID">
						<div class="form-group">
							<label class="col-md-2 control-label">Name: <span class="required">* </span></label>
							<div class="col-md-10">
								<input type="text" class="form-control maxlength-handler" name="name" id="name" maxlength="50" value="<?=$name;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Content: <span class="required">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control maxlength-handler" name="caption" id="caption" maxlength="200" value="<?=$caption;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Latitude: <span class="required">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="lat" id="lat" value="<?=$lat;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Longitude: <span class="required">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="lng" id="lng" value="<?=$lng;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Status: <span class="required">* </span></label>
							<div class="col-md-10">
								<?php 
								$atributes="class='table-group-action-input form-control select2me'";
								$pilih_status=$this->input->post('status')? $this->input->post('status'):$status;
								echo form_dropdown('status',$dd_status,$pilih_status,$atributes);
								?>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-10 col-md-2">
								<button class="btn btn-xs green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>