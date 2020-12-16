<?php foreach($viewkomentar as $kmntr){ ?>
<?=form_open('comments/comments/sendkomentar',array('class'=>"komentar-compose form-horizontal",'id'=>"fileupload"));?>
	<div class="komentar-form-group">
		<?=$kmntr['username'];?> :&nbsp; <?=$kmntr['review'];?>
	</div>
	<div class="komentar-form-group">
		<div class="controls-row">
			<input type="hidden" name="blogid" value="<?=$kmntr['blogid'];?>" required />
			<input type="hidden" name="commentid" value="<?=$kmntr['komentar_id'];?>" required />
			<input type="hidden" name="indukid" value="<?=$kmntr['id'];?>" required />
			<textarea class="komentar-editor komentar-wysihtml5 form-control" name="review" rows="12"></textarea>
		</div>
	</div>
	<div class="komentar-compose-btn">
		<button class="btn blue"><i class="fa fa-check"></i>Send</button>
	</div>
<?=form_close();?>
<?php } ?>