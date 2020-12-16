
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject uppercase">Berita</span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?php echo form_open_multipart('news/news/simpan',array('id'=>'formnews','class'=>'form-horizontal form-row-stripped form-bordered'));?>
						<div class="form-group">
							<label class="col-md-2 control-label">Judul Berita:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id; ?>">
								<input class="form-control" type="text" name="judul_berita" id="judul_berita" value="<?php echo $judul_berita; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Kategori: <span class="required">
							</span>
							</label>
							<div class="col-md-10">
								<?php 
								$attribute='class="form-control select2me" id="kategori"';
								$kategori_selected= $this->input->post('kategori')? $this->input->post('kategori'):$kategori;
								echo form_dropdown('kategori',$dd_kategori,$kategori_selected,$attribute);
								?>
								<div id="kategori_error"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Konten:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<textarea class="form-control editor1" type="text" name="isi_berita" data-error-container="#isi_berita"><?php echo $isi_berita; ?></textarea>
								<div id="isi_berita"></div>
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
						<?php if(isset($img)){?>
						<div class="form-group ">
							<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<?php if(empty($img)){ ?>
											<img src="<?php echo base_url('assets/admin/img/no-image.jpg');?>" style="width:200px;height:150px;" alt=""/>
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
						<?php }else{?>
						<div class="form-group ">
							<label class="col-md-2 control-label">Image:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<?php if(empty($image)){ ?>
											<img src="<?php echo base_url('assets/admin/img/no-image.jpg');?>" style="width:200px;height:150px;" alt=""/>
										<?php }else{ ?>
											<img src="<?php echo base_url('files/media/'.$image);?>" style="width:200px;height:150px;"  alt=""/>
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
						<div class="form-group">
							<label class="col-md-2 control-label">Tag: <span class="required"></span></label>
							<div class="col-md-10">
								<?php 
								$attribute='class="form-control select2me" multiple="multiple" id="tag"';
								$tag_selected= $this->input->post('tags[]')?$this->input->post('tags[]'):$tags;
								echo form_dropdown('tags[]',$dd_tag,$tag_selected,$attribute);
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Meta Description:</label>
							<div class="col-md-10">
								<textarea class="form-control maxlength-handler" name="meta_deskripsi" maxlength="255" id="meta_deskripsi"><?=$meta_deskripsi;?></textarea>
								<span class="help-block">
								max 255 chars </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Meta Keywords:</label>
							<div class="col-md-10">
								<textarea class="form-control maxlength-handler" name="meta_keyword" maxlength="1000" ><?=$meta_keyword;?></textarea>
								<span class="help-block">
								max 1000 chars </span>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-8 col-md-4">
									<a href="<?=site_url('appweb/news');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
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
