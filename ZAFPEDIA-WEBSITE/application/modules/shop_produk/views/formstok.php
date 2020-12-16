<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift "></i>
					<span class="caption-subject bold uppercase">Kategori Produk</span>
				</div>
			</div>
			<div class="portlet-body form">
				<?php echo form_open('shop_produk/products/simpanstok',array('class'=>'form-horizontal form-bordered form-row-stripped'));?>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-2 control-label">Id:<span class="required">*</span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="id" name="id" readonly value="<?php echo $id; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jumlah Stok:<span class="required"></span></label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="jumlah" name="jumlah" maxlength="4">
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<a href="<?=site_url('appweb/products');?>" class="btn btn-danger btn-sm btn-circle" name="back"><i class="fa fa-angle-left"></i> Back</a>
								<button class="btn green-haze btn-sm btn-circle"  name="submit" ><i class="fa fa-check"></i> Save</button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>