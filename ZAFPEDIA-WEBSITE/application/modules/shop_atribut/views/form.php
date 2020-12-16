<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift "></i>
					<span class="caption-subject uppercase">Atribut Groups</span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?php echo form_open('shop_atribut/atributs/simpan',array('id'=>'formatribut','class'=>"form-horizontal form-bordered form-row-stripped"))?>
						<div class="form-group">
							<label class="col-md-2 control-label">Label<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="hidden" class="form-control" id="id" name="id" readonly value="<?=$id;?>" />
								<input type="text" class="form-control" id="label" name="label" value="<?=$label;?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Root: <span class="required"></span></label>
							<div class="col-md-10">
								<?php 
								$attribute='class="table-group-action-input form-control select2me" id="root"';
								$cat_selected= $this->input->post('root')?$this->input->post('root'):$root;
								echo form_dropdown('root',$dd_parent,$cat_selected,$attribute);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Keterangan<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="keterangan" value="<?=$keterangan;?>" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Posisi<span class="text-danger"></span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="posisi" maxlength="4" value="<?=$posisi;?>" name="posisi" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Status: <span class="required">* </span></label>
							<div class="col-md-10">
								<?php 
								$atributes="id='status' class='table-group-action-input form-control select2me'";
								$pilih_status=$this->input->post('status')? $this->input->post('status'):$status;
								echo form_dropdown('status',$dd_status,$pilih_status,$atributes);
								?>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-8 col-md-4">
									<a href="<?=site_url('appweb/atributs');?>" class="btn btn-sm btn-danger btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
									<button class="btn btn-sm btn-warning btn-circle" name="reset" id="reset" type="reset" ><i class="fa fa-reply"></i> Reset</button>
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
		
	

