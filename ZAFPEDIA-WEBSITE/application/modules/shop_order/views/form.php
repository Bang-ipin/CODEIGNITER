<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket "></i>
					<span class="caption-subject uppercase">Add Product </span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open('shop_produk/products/simpan',array('id'=>'formproduk','class'=>'form-horizontal form-bordered form-row-stripped'));?>
					<div class="form-actions btn-set">
						<div class="row">
							<div class="col-md-offset-9 col-md-3">
								<a href="<?=site_url('appweb/products')?>" class="btn btn-sm btn-danger btn-circle">
									<i class="fa fa-angle-left"></i><span class="hidden-480"> Back</span>
								</a>
								<button class="btn btn-sm green-haze btn-circle" name="submit"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
					<div class="tabbable">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_general" data-toggle="tab">
								General </a>
							</li>
							<li>
								<a href="#tab_data" data-toggle="tab">
								Data
								</a>
							</li>
							<li>
								<a href="#tab_meta" data-toggle="tab">
								Meta </a>
							</li>
							<li>
								<a href="#tab_images" data-toggle="tab">
								Images </a>
							</li>
							<li>
								<a href="#tab_atribut" data-toggle="tab">
								Atribut </a>
							</li>
						</ul>
						<div class="tab-content no-space">
							<div class="tab-pane active" id="tab_general">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control" name="id" value="<?=$id?>" readonly="true">
										<input type="hidden" class="form-control" name="kode" value="<?=$kode_barang?>" readonly="true">
										<label class="col-md-3 control-label">Produk: <span class="required">* </span></label>
										<div class="col-md-9">
											<input type="text" class="form-control maxlength-handler" maxlength="70"name="product_name" id="product_name" value="<?=$product_name?>" required>
											<div style="margin-top: 0px; color: red;"><?= form_error('product_name'); ?></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Produk Singkat: <span class="required">* </span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="product_singkat" id="product_singkat" maxlength="20" value="<?=$product_singkat?>" required>
											<div style="margin-top: 0px; color: red;"><?= form_error('product_singkat'); ?></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description: <span class="required"></span></label>
										<div class="col-md-9">
											<textarea class="form-control editor1" id="deskripsi" name="deskripsi"  data-error-container ="#deskripsi_error" ><?=$deskripsi?></textarea>
											<div id="deskripsi_error"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Short Description: <span class="required">
										</span>
										</label>
										<div class="col-md-9">
											<textarea class="form-control" name="short_deskripsi" id="short_deskripsi" rows="8"  data-error-container ="#short_deskripsi_error"><?=$short_deskripsi?></textarea>
											<span class="help-block">shown in product listing </span>
											<div id="short_deskripsi_error"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Kategori: <span class="required">*</span></label>
										<div class="col-md-9">
											<?php 
											$attribute='class="table-group-action-input form-control select2me" id="subkategoriview" required';
											$kat_selected= $this->input->post('kategori')? $this->input->post('kategori'):$kategori;
											echo form_dropdown('kategori',$category,$kat_selected,$attribute);
											?>
											<div style="margin-top: 0px; color: red;"><?= form_error('kategori'); ?></div>
										</div>
									</div>
									<div id="subcat">
										<?php if (!empty($subcat)){ ?>
										<div class="form-group">
											<label class="col-md-3 control-label">Sub Kategori: <span class="required"></span></label>
											<div class="col-md-9">
												<?php 
												$attribute='multiple="multiple" class="form-control"';
												$subkat_selected= $this->input->post('subkategori[]')? $this->input->post('subkategori[]'):$subcat;
												echo form_dropdown('subkategori[]',$subcategory,$subkat_selected,$attribute);
												?>
											</div>
										</div>
										<?php } ?>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">QTY: <span class="required">*<span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="jumlah" id="jumlah" maxlength="4" value="<?=$jumlah?>" required>
											<div style="margin-top: 0px; color: red;"><?= form_error('jumlah'); ?></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Price: <span class="required">* </span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="price" id="price" value="<?=$price?>" required>
											<div style="margin-top: 0px; color: red;"><?= form_error('price'); ?></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Diskon: <span class="required"></span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="diskon" id="diskon" value="<?=$diskon?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Favorit: <span class="required"></span></label>
										<div class="col-md-9">
											<?php 
											$atributes="id='favorit' class='table-group-action-input form-control select2me'";
											$pilih_status=$this->input->post('favorit')? $this->input->post('favorit'):$favorit;
											echo form_dropdown('favorit',$dd_favorit,$pilih_status,$atributes);
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Status: <span class="required">* </span>	</label>
										<div class="col-md-9">
											<?php 
											$atributes="id='status' class='table-group-action-input form-control select2me' required";
											$pilih_status=$this->input->post('status')? $this->input->post('status'):$status;
											echo form_dropdown('status',$dd_status_barang,$pilih_status,$atributes);
											?>
											<div style="margin-top: 0px; color: red;"><?= form_error('status'); ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_data">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Label: <span class="required"></span></label>
										<div class="col-md-9">
											<?php 
											$attribute='id="label" class="table-group-action-input form-control select2me"';
											$label_selected= $this->input->post('label')?$this->input->post('label'):$label;
											echo form_dropdown('label',$dd_label,$label_selected,$attribute);
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tax Class: <span class="required"></span>	</label>
										<div class="col-md-9">
											<?php 
											$attribute='class="table-group-action-input form-control select2me"';
											$tax_selected= $this->input->post('tax')?$this->input->post('tax'):$tax;
											echo form_dropdown('tax',$dd_tax,$tax_selected,$attribute);
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Produsen: <span class="required"></span></label>
										<div class="col-md-9">
											<?php 
											$attribute='class="table-group-action-input form-control select2me "';
											$produsen_selected= $this->input->post('produsen')?$this->input->post('produsen'):$produsen;
											echo form_dropdown('produsen',$dd_produsen,$produsen_selected,$attribute);
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_meta">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Meta Description:</label>
										<div class="col-md-9">
											<textarea class="form-control maxlength-handler" rows="8" name="meta_description"  maxlength="255"><?=$meta_description;?></textarea>
											<span class="help-block">
											max 255 chars </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Meta Keywords:</label>
										<div class="col-md-9">
											<textarea class="form-control maxlength-handler" rows="8" name="meta_keywords" maxlength="1000"><?=$meta_keywords;?></textarea>
											<span class="help-block">
											max 1000 chars </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Tag</label>
										<div class="col-md-9">
											<?php 
												$attribute='multiple="multiple" class="form-control select2me" ';
												$tags_selected= $this->input->post('tags[]')?$this->input->post('tags[]'):$tags;
												echo form_dropdown('tags[]',$tag,$tags_selected,$attribute);
											?>
											<span class="help-block">
											select one or more tag </span>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_images">
								<?php if(isset($img)){?>
								<div class="form-group">
									<label class="col-md-3 control-label">Image<span class="text-danger"></span></label>
									<div class="col-md-9">
										<img src="<?=base_url();?>/files/images/no-image.jpg" id="previewimage" style="border:8px double #CCC;height:150px;width:200px;position: relative;z-index: 10;"/>
										<div class="clearfix">&nbsp;</div>
										<a href="<?php echo base_url('assets/filemanager/dialog.php?type=1&field_id=none_img');?>" class="btn btn-info fancy">Upload</a>
										<button type="button" id="hapus" onclick="clear_img();"class="btn btn-danger">Delete</button>
										<span class="help-block">
											Ukuran Max upload 2mb (,) </span>
									</div>
									<input type="hidden" class="form-control" readonly="true" value="<?=$img;?>" name="image"  id="none_img"/>
								</div>
								<?php }else{ ?>
								<div class="form-group">
									<label class="col-md-3 control-label">Image<span class="text-danger"></span></label>
									<div class="col-md-9">
										<img src="<?=$image;?>" id="previewimage" style="border:8px double #CCC;height:150px;width:200px;position: relative;z-index: 10;"/>
										<div class="clearfix">&nbsp;</div>
										<a href="<?php echo base_url('assets/filemanager/dialog.php?type=1&field_id=none_img');?>" class="btn btn-info fancy">Upload</a>
										<button type="button" id="hapus" onclick="clear_editimg();"class="btn btn-danger">Delete</button>
										<span class="help-block">
											Ukuran Max upload 2mb (,) </span>
									</div>
									<input type="hidden" class="form-control" value="<?=$image;?>" name="image"  id="none_img"/>
								</div>
								<?php } ?>
							</div>
							<div class="tab-pane" id="tab_atribut">
								<div class="form-group">
									<label class="col-md-3 control-label">Dimensi: <span class="required"> </span></label>
										<div class="col-md-3">
										<input type="text" class="form-control" id="panjang" name="panjang" value="<?=$panjang?>">
									</div>
									<div class="col-md-3">
										<input type="text" class="form-control" id="lebar" name="lebar" value="<?=$lebar?>">
									</div>
									<div class="col-md-3">
										<input type="text" class="form-control" id="tinggi" name="tinggi" value="<?=$tinggi?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Berat: <span class="required"> </span></label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="berat"  name="berat" value="<?=$berat?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Atribut: <span class="required"></span></label>
									<div class="col-md-9">
										<?php 
										$attribute='class="table-group-action-input form-control select2me" id="subatributview"';
										$att_selected= $this->input->post('atribut')?$this->input->post('atribut'):$atribut;
										echo form_dropdown('atribut',$atribute,$att_selected,$attribute);
										?>
									</div>
								</div>
								<div id="subattr">
									<?php if (!empty($subatribut)){ ?>
									<div class="form-group">
										<label class="col-md-3 control-label">Sub Atribut: <span class="required"></span></label>
										<div class="col-md-9">
											<?php 
											$attribute='multiple="multiple" class="form-control"';
											$subattr_selected= $this->input->post('subatribut[]')? $this->input->post('subatribut[]'):$subatribut;
											echo form_dropdown('subatribut[]',$subattr,$subattr_selected,$attribute);
											?>
										</div>
									</div>
									<?php } ?>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-9">
										<div class="actions">
											<a href="<?php echo site_url('appweb/atributs/add');?>" class="btn green-haze btn-circle"><i class="fa fa-plus"></i> Add Atribut</a>
										</div>
										<span class="help-block"> buat atribut disini </span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-9 col-md-3">
								<a href="<?=site_url('appweb/products')?>" class="btn btn-sm btn-danger btn-circle">
									<i class="fa fa-angle-left"></i><span class="hidden-480"> Back</span>
								</a>
								<button class="btn btn-sm green-haze btn-circle" name="submit"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
