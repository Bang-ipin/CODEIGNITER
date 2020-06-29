<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket"></i>
					<span class="caption-subject bold uppercase">
					Konfigurasi </span>
					<span class="caption-helper"></span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open_multipart('landingpage/landingpage/simpan_testimoni',array('class'=>"form-horizontal form-bordered form-row-stripped", 'id'=>""))?>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-10 col-md-2">
								<button class="btn btn-xs green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
					<div class="tabbable">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_testimoni" data-toggle="tab">
								Testimoni </a>
							</li>
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_testimoni">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Nama: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="namaclient" id="namaclient" value="<?=$namaclient;?>" placeholder="Nama">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Email: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" id="emailclient" value="<?=$emailclient;?>" name="emailclient"/>
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