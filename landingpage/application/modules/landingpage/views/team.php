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
				<?php echo form_open_multipart('landingpage/landingpage/simpan',array('class'=>"form-horizontal form-bordered form-row-stripped", 'id'=>""))?>
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
								<a href="#tab_home" data-toggle="tab">
								Home </a>
							</li>
							<li>
								<a href="#tab_features" data-toggle="tab">
								Features </a>
							</li>
							<li>
								<a href="#tab_app" data-toggle="tab">
								App </a>
							</li>
							<li>
								<a href="#tab_gallery" data-toggle="tab">
								Gallery </a>
							</li>
							<li>
								<a href="#tab_portofolio" data-toggle="tab">
								Portofolio </a>
							</li>
							<li>
								<a href="#tab_team" data-toggle="tab">
								Team </a>
							</li>
							<li>
								<a href="#tab_pricing" data-toggle="tab">
								Pricing </a>
							</li>
							<li>
								<a href="#tab_contact" data-toggle="tab">
								Contact </a>
							</li>
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_home">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Judul: <span class="required">* </span></label>
										<div class="col-md-10">
											<input type="hidden" readonly="true" class="form-control" name="id" id="id" value="<?=$id;?>" placeholder="ID" readonly>
											<input type="text" class="form-control maxlength-handler" name="judul" id="judul" maxlength="70" value="<?=$judul;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Deskripsi: <span class="required"></span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" name="deskripsi" rows="6" maxlength="500"><?=$deskripsi;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Link: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="link" maxlength="100" value="<?=$link;?>" placeholder="Link">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Text Link: <span class="required"></span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="textlink" maxlength="100" value="<?=$textlink;?>" placeholder="Text Link">
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_features">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Font-Icon 1: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="fonticon1" id="fonticon1" value="<?=$fonticon1;?>" placeholder="Font Icon">
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
											<input type="text" class="form-control maxlength-handler" id="link1" value="<?=$link1;?>" name="link1"/>
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
											<input type="text" class="form-control maxlength-handler" name="fonticon3" id="fonticon3" value="<?=$fonticon3;?>" placeholder="Font Icon">
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
											<input type="text" class="form-control maxlength-handler" id="link3" value="<?=$link3;?>" name="link3" />
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
							<div class="tab-pane" id="tab_app">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Meta Keywords:</label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="meta_keyword" maxlength="300"></textarea>
											<span class="help-block">
											max 300 chars </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Meta Description: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea class="form-control maxlength-handler" rows="8" name="meta_deskripsi" maxlength="160"></textarea>
											<span class="help-block">
											max 160 chars </span>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_gallery">
								<div class="form-group ">
									<label class="col-md-2 control-label">Favicon:<span class="text-danger">*</span></label>
									<div class="col-md-10">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
												<?php if(empty($fvc)){ ?>
													<img src="<?php echo base_url('files/images/no-image.jpg');?>" style="width:100px;height:100px;" alt="favicon"/>
												<?php }else{ ?>
													<img src="<?php echo base_url('files/media/'.$fvc);?>" style="width:100px;height:100px;"  alt="favicon"/>
												<?php } ?>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;"></div>
											<div>
												<span class="btn btn-primary btn-file">
													<span class="fileinput-new">Select image </span>
													<span class="fileinput-exists">Change </span>
													<input type="file" name="favicon">
												</span>
												<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
												<input type="hidden"  class="form-control" name="faviconlama" value="<?=$favicon;?>">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_portofolio">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Footer 1: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler " name="titleprefooter1" maxlength="30" value="" placeholder="Title" />
											<!--
											<br/><textarea class="form-control maxlength-handler " rows="8" name="prefooter1" maxlength="500"><?=$prefooter1;?></textarea>
											<span class="help-block">
											max 300 chars </span>
											-->
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Footer 2: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler " name="titleprefooter2" maxlength="30" value="" placeholder="Title" />
											<!--<br/><textarea class="form-control maxlength-handler " rows="8" name="prefooter2" maxlength="500"><?//=$prefooter2;?></textarea>
											<span class="help-block">
											max 300 chars </span>
											-->
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Footer 3: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler " name="titleprefooter3" maxlength="30" value="" placeholder="Title" />
											<!--
											<br/><textarea class="form-control maxlength-handler" rows="8" name="prefooter3" maxlength="500"><?=$prefooter3;?></textarea>
											<span class="help-block">
											max 300 chars </span>
											-->
										</div>
										
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Footer 4: <span class="required"> </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler " name="titleprefooter4" maxlength="30" value="" placeholder="Title" />
											<!--<br/><textarea class="form-control maxlength-handler" rows="8" name="prefooter4" maxlength="500"><?=$prefooter4;?></textarea>
											<span class="help-block">
											max 300 chars </span>
											-->
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Hak Cipta: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control maxlength-handler" name="hak_cipta" maxlength="100" value="" placeholder="">
											<span class="help-block">
											max 25 chars </span>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_team">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Facebook: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="facebook" value="" placeholder="">
											<span class="help-block">
											Contoh :bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Twitter: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="twitter" value="" placeholder="">
											<span class="help-block">
											Contoh : bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Instagram: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="instagram"  value="" placeholder="">
											<span class="help-block">
											Contoh : bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Google Plus: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="googleplus" value="" placeholder="">
											<span class="help-block">
											Contoh :+Bangipin15 </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Tumblr: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="tumblr"  value="" placeholder="">
											<span class="help-block">
											Contoh :bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Linked In: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control " name="linkedin" value="" placeholder="">
											<span class="help-block">
											Contoh :bangipin15</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Youtube: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="youtube" value="" placeholder="">
											<span class="help-block">
											Masukkan Username Youtube </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Vimeo: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="vimeo"  value="" placeholder="">
											<span class="help-block">
											Masukkan Username Vimeo </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Skype: <span class="required">
										</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="skype" value="" placeholder="">
											<span class="help-block">
											Masukkan URL Skype</span>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_pricing">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Code Share: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea rows="6" class="form-control" name="sharethis"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Code Live Chat: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea rows="6" class="form-control" name="livechat"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Google Analythic: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea rows="6" class="form-control" name="analityc"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_contact">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Code Share: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea rows="6" class="form-control" name="sharethis"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Code Live Chat: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea rows="6" class="form-control" name="livechat"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Google Analythic: <span class="required">
										 </span></label>
										<div class="col-md-10">
											<textarea rows="6" class="form-control" name="analityc"></textarea>
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