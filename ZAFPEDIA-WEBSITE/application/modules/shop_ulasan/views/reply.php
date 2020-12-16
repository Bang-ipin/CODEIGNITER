<?php foreach($viewulasan as $ulas){ ?>
<?=form_open('shop_ulasan/ulasan_produk/sendulasan',array('class'=>"ulasan-compose form-horizontal",'id'=>"fileupload"));?>
	<div class="ulasan-form-group">
		<?=$ulas['username'];?> :&nbsp; <?=$ulas['review'];?>
	</div>
	<div class="ulasan-form-group">
		<div class="controls-row">
			<input type="hidden" name="produkid" value="<?=$ulas['produkid'];?>" required />
			<input type="hidden" name="commentid" value="<?=$ulas['komentar_id'];?>" required />
			<input type="hidden" name="indukid" value="<?=$ulas['id'];?>" required />
			<textarea class="ulasan-editor ulasan-wysihtml5 form-control" name="review" rows="12"></textarea>
		</div>
	</div>
	<div class="ulasan-compose-btn">
		<button class="btn blue"><i class="fa fa-check"></i>Send</button>
	</div>
<?=form_close();?>
<?php } ?>