<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift "></i>
					<span class="caption-subject bold uppercase">Galeri</span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open_multipart('gallery/gallery/simpan',array('id'=>"formgaleri",'class'=>'form-horizontal form-bordered form-row-stripped'));?>
					<div class="form-body">
						<div class="form-group">
							<input class="form-control" type="hidden" id="id" name="id"  value="<?php echo $id; ?>">
							<label class="col-md-2 control-label">Judul:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="judul" name="judul"  value="<?php echo $judul; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Galeri: <span class="required"></span></label>
							<div class="col-md-10">
								<?php 
								$attribute='class="table-group-action-input form-control select2me" id="galeri"';
								$galeri_selected= $this->input->post('galeri')?$this->input->post('galeri'):$galeri;
								echo form_dropdown('galeri',$dd_galeri,$galeri_selected,$attribute);
								?>
							</div>
						</div>
						<div class="form-group" id="galfoto">
							<label class="col-md-2 control-label">Foto:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 300px; height: 300px;">
										<?php if(empty($image)){ ?>
											<img src="<?php echo base_url('assets/admin/img/no-image.jpg');?>" style="width:300px;height:300px;" alt="gallery"/>
										<?php }else{ ?>
											<img src="<?php echo base_url('files/media/'.$image);?>" style="width:300px;height:300px;"  alt="gallery"/>
										<?php } ?>
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="width: 300px; height: 300px;"></div>
									<div>
										<span class="btn btn-primary btn-file">
											<span class="fileinput-new">Select image </span>
											<span class="fileinput-exists">Change </span>
											<input type="file" name="image">
										</span>
										<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
										<input type="hidden"  class="form-control" name="imagelama" value="<?=$image;?>">
									</div>
									<span class="help-block">Dimension image 1024px x 1024px </span>
									<span class="help-block">Max 1 Mb </span>
								</div>
							</div>
						</div>
						<div class="form-group" id="galvideo" >
							<label class="col-md-2 control-label">Video:<span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="video" name="video"  value="<?php echo $video; ?>">
								Contoh link: <span class="help-block" style="color:#EA1C1C;">http://www.youtube.com/embed/xbuEmoRWQHU</span>
								<iframe width="250" height="170" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('appweb/gallery');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn green-haze btn-sm btn-circle"  name="submit" ><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>