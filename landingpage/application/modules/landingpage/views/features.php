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
				<?php echo form_open_multipart('landingpage/landingpage/simpan_features',array('class'=>"form-horizontal form-bordered form-row-stripped", 'id'=>""))?>
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
								<a href="#tab_features" data-toggle="tab">
								Features </a>
							</li>
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_features">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Font-Icon 1: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID" readonly>
											<input type="text" class="form-control" name="fonticon1" id="fonticon1" value="<?=$fonticon1;?>" placeholder="Font Icon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nama: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="namafeatures1" id="namafeatures1" value="<?=$namafeatures1;?>" placeholder="Nama">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="deskripsi1" maxlength="300"><?=$deskripsi1;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Link 1: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" id="link1" value="<?=$link1;?>" name="link1"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Text Link 1: <span class="required"></span></label>
										<div class="col-md-10">
											<input id="textlink1" name="textlink1" value="<?=$textlink1;?>" type="text" class="form-control" />
										</div>
									</div>
									<hr/>
									<div class="form-group">
										<label class="col-md-2 control-label">Font-Icon 2: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="fonticon2" id="fonticon2" value="<?=$fonticon2;?>" placeholder="Font Icon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nama: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control " name="namafeatures2" id="namafeatures2" value="<?=$namafeatures2;?>" placeholder="Nama">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="deskripsi2" maxlength="300"><?=$deskripsi2;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Link 2: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" id="link2" value="<?=$link2;?>" name="link2"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Text Link 2: <span class="required"></span></label>
										<div class="col-md-10">
											<input id="textlink2" name="textlink2" value="<?=$textlink2;?>" type="text" class="form-control" />
										</div>
									</div>
									<hr/>
									<div class="form-group">
										<label class="col-md-2 control-label">Font-Icon 3: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="fonticon3" id="fonticon3" value="<?=$fonticon3;?>" placeholder="Font Icon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nama : <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="namafeatures3" id="namafeatures3" value="<?=$namafeatures3;?>" placeholder="Nama">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Keterangan: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="deskripsi3" maxlength="300"><?=$deskripsi3;?></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Link 3: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" id="link3" value="<?=$link3;?>" name="link3" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Text Link 3: <span class="required"></span></label>
										<div class="col-md-10">
											<input id="textlink3" name="textlink3" value="<?=$textlink3;?>" type="text" class="form-control" />
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