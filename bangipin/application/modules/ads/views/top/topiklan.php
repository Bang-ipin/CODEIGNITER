<div class="row">
	<div class="col-md-4">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list "></i>
					<span class="caption-subject uppercase">Custom Iklan</span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?=form_open('ads/advertising/addadscustom',array('id'=>'formadscustom','class'=>'form-horizontal form-row-stripped'));?>
	                    <div class="form-group">
							<div class="col-md-10">
								<label class="control-label">Nama :<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="nama-ads-custom" id="nama-ads-custom" required>
								<input class="form-control" type="hidden" name="type-ads-custom" id="type-ads-custom" value="1">
								<span class="help-block">Example:Home,Beranda</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10">
								<label class="control-label">Image:<span class="text-danger"></span></label><br/>
								<img src="<?=base_url();?>/assets/admin/img/no-image.jpg" id="previewimage" style="height:100px;width:100px;"/><br/><br/>
								<a href="<?php echo base_url('assets/filemanager/dialog.php?type=1&field_id=image-ads-custom');?>" class="btn btn-sm btn-info fancy">Upload</a>
								<button type="button" id="hapus" onclick="clear_img();"class="btn btn-sm btn-danger">Delete</button>
								<input type="hidden" class="form-control" readonly="true" name="image-ads-custom"  id="image-ads-custom"/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10">
								<label class="control-label">Url:<span class="text-danger"></span></label>
								<input class="form-control" type="text" name="url-ads-custom" id="url-ads-custom">
								<span class="help-block">Gunakan http:// atau https://, atau Kosongkan atau isi dengan '#' bila tidak terdapat url</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10">
								<label class="control-label">Status: <span class="required"></span></label>
								<?php 
								$attribute='class="table-group-action-input form-control select2me" id="status-ads-custom"';
								$status_selected= $this->input->post('status-ads-custom')?$this->input->post('status-ads-custom'):'';
								echo form_dropdown('status-ads-custom',$dd_status,$status_selected,$attribute);
								?>
							</div>
						</div>
						&nbsp;<br/>
						<button type="submit" class="tambahkan-ke-menu2 btn btn-sm btn-primary" title="tambahkan ke menu"><i class="fa fa-sign-out"></i><span class="title">Tambahkan</span></button>
                	<?=form_close();?>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list"></i>Top Iklan
				</div>
			</div>
			<div class="portlet-body">
				<div id="ads_nestable">
					<?php if(isset($tampiliklan)){
						echo $tampiliklan;
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>