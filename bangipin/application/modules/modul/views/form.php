<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift "></i>
					<span class="caption-subject bold uppercase">Modul</span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open('modul/modul/simpan',array('id'=>"formmodul",'class'=>'form-horizontal form-bordered form-row-stripped'));?>
					<div class="form-body">
						<div class="form-group">
							<input class="form-control" type="hidden" id="id" name="id"  value="<?php echo $id; ?>">
							<label class="col-md-2 control-label">Nama Modul:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="nama" name="nama"  value="<?php echo $nama; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">URL Modul:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="url_modul" name="url_modul"  value="<?php echo $url_modul; ?>">
							</div>
						</div>
						
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('appweb/modul');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn green-haze btn-sm btn-circle"  name="submit" ><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>