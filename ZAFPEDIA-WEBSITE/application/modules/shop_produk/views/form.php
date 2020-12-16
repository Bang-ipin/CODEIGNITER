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
				<?php echo form_open_multipart('shop_produk/products/simpan',array('id'=>'formproduk','class'=>'form-horizontal'));?>
					<div class="form-actions btn-set">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('appweb/products')?>" class="btn btn-sm btn-danger btn-circle">
									<i class="fa fa-angle-left"></i><span class="hidden-480"> Back</span>
								</a>
								<button class="btn btn-sm green-haze btn-circle" name="submit"><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
			
					<div class="row margin-bottom-25 produk-block">
						<div class="form-body">
							<div class="alert alert-danger display-hide">
								<button class="close" data-close="alert"></button>
								You have some form errors. Please check below.
							</div>
							<h3 class="block">Detail Product</h3>
							<div class="form-group">
								<input type="hidden" class="form-control" name="id" value="<?=$id?>" readonly="true">
								<input type="hidden" class="form-control" name="kode" value="<?=$kode_barang?>" readonly="true">
								<label class="col-md-2 control-label">Produk: <span class="required">* </span></label>
								<div class="col-md-10">
									<input type="text" class="form-control maxlength-handler" maxlength="70"name="product_name" id="product_name" value="<?=$product_name?>" required>
									<div style="margin-top: 0px; color: red;"><?= form_error('product_name'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Description: <span class="required"></span></label>
								<div class="col-md-10">
									<textarea class="form-control editor1" id="deskripsi" name="deskripsi"  data-error-container ="#deskripsi_error" ><?=$deskripsi?></textarea>
									<div id="deskripsi_error"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Short Description: <span class="required">
								</span>
								</label>
								<div class="col-md-10">
									<textarea class="form-control" name="short_deskripsi" id="editorsummernote" rows="8"  data-error-container ="#short_deskripsi_error"><?=$short_deskripsi?></textarea>
									<span class="help-block">shown in product listing </span>
									<div id="short_deskripsi_error"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Kategori: <span class="required">*</span></label>
								<div class="col-md-10">
									<?php 
									$attribute='class="table-group-action-input form-control select2me" required';
									$kat_selected= $this->input->post('kategori')? $this->input->post('kategori'):$kategori;
									echo form_dropdown('kategori',$category,$kat_selected,$attribute);
									?>
									<div style="margin-top: 0px; color: red;"><?= form_error('kategori'); ?></div>
								</div>
							</div>
							<!--<div id="subcat">
								<?php if (!empty($subcat)){ ?>
								<div class="form-group">
									<label class="col-md-2 control-label">Sub Kategori: <span class="required"></span></label>
									<div class="col-md-10">
										<?php 
										$attribute='multiple="multiple" class="form-control"';
										$subkat_selected= $this->input->post('subkategori[]')? $this->input->post('subkategori[]'):$subcat;
										echo form_dropdown('subkategori[]',$subcategory,$subkat_selected,$attribute);
										?>
									</div>
								</div>
								<?php } ?>
							</div>
							-->
							<div class="form-group">
								<label class="col-md-2 control-label">Berat (Gram): <span class="required"> </span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="berat"  name="berat" value="<?=$berat?>">
									<span class="help-block">Dalam Satuan Gram</span>
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-md-2 control-label">QTY: <span class="required">*<span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="jumlah" id="jumlah" maxlength="4" value="<?=$jumlah?>" required>
									<div style="margin-top: 0px; color: red;"><?= form_error('jumlah'); ?></div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="row margin-bottom-25 produk-block">
						<div class="form-body">
						<h3 class="block">Detail Price & Label</h3>
							<div class="form-group">
								<label class="col-md-2 control-label">Price: <span class="required">* </span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="price" id="price" value="<?=$price?>" required>
									<div style="margin-top: 0px; color: red;"><?= form_error('price'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Diskon: <span class="required"></span></label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="diskon" id="diskon" value="<?=$diskon?>" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Favorit: <span class="required"></span></label>
								<div class="col-md-10">
									<?php 
									$atributes="id='favorit' class='table-group-action-input form-control select2me'";
									$pilih_status=$this->input->post('favorit')? $this->input->post('favorit'):$favorit;
									echo form_dropdown('favorit',$dd_favorit,$pilih_status,$atributes);
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Status: <span class="required">* </span>	</label>
								<div class="col-md-10">
									<?php 
									$atributes="id='status' class='table-group-action-input form-control select2me' required";
									$pilih_status=$this->input->post('status')? $this->input->post('status'):$status;
									echo form_dropdown('status',$dd_status_barang,$pilih_status,$atributes);
									?>
									<div style="margin-top: 0px; color: red;"><?= form_error('status'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Label: <span class="required"></span></label>
								<div class="col-md-10">
									<?php 
									$attribute='id="label" class="table-group-action-input form-control select2me"';
									$label_selected= $this->input->post('label')?$this->input->post('label'):$label;
									echo form_dropdown('label',$dd_label,$label_selected,$attribute);
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Produsen: <span class="required"></span></label>
								<div class="col-md-10">
									<?php 
									$attribute='class="table-group-action-input form-control select2me "';
									$produsen_selected= $this->input->post('produsen')?$this->input->post('produsen'):$produsen;
									echo form_dropdown('produsen',$dd_produsen,$produsen_selected,$attribute);
									?>
								</div>
							</div>
						</div>
					</div>
			
					<div class="row margin-bottom-25 produk-block">
						<div class="form-body">
							<h3 class="block">Detail Meta</h3>
							<div class="form-group">
								<label class="col-md-2 control-label">Meta Description:</label>
								<div class="col-md-10">
									<textarea class="form-control maxlength-handler" rows="8" name="meta_description"  maxlength="255"><?=$meta_description;?></textarea>
									<span class="help-block">
									max 255 chars </span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Meta Keywords:</label>
								<div class="col-md-10">
									<textarea class="form-control maxlength-handler" rows="8" name="meta_keywords" maxlength="1000"><?=$meta_keywords;?></textarea>
									<span class="help-block">
									max 1000 chars </span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tag</label>
								<div class="col-md-10">
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
				
					<div class="row margin-bottom-25 produk-block">
						<div class="form-body">
							<h3 class="block">Detail Image</h3>
							<?php if(isset($img)){?>
							<div class="form-group ">
								<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
								<div class="col-md-10">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
											<?php if(empty($img)){ ?>
												<img src="<?php echo base_url('assets/admin/layout/img/no-image.jpg');?>" style="width:200px;height:150px;" alt=""/>
											<?php }else{ ?>
												<img src="<?php echo base_url('files/media/'.$img);?>" style="width:200px;height:150px;"  alt=""/>
											<?php } ?>
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-primary btn-file">
												<span class="fileinput-new">Select image </span>
												<span class="fileinput-exists">Change </span>
												<input type="file" name="image">
											</span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
										</div>
									</div>
								</div>
							</div>
							<?php }else{ ?>
							<div class="form-group ">
								<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
								<div class="col-md-10">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
											<?php if(empty($image)){ ?>
												<img src="<?php echo base_url('assets/admin/layout/img/no-image.jpg');?>" style="width:200px;height:150px;" alt="image"/>
											<?php }else{ ?>
												<img src="<?php echo base_url('files/media/'.$image);?>" style="width:200px;height:150px;"  alt="image"/>
											<?php } ?>
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-primary btn-file">
												<span class="fileinput-new">Select image </span>
												<span class="fileinput-exists">Change </span>
												<input type="file" name="image">
											</span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
											<input type="hidden"  class="form-control" name="imagelama" value="<?=$image;?>">
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
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
