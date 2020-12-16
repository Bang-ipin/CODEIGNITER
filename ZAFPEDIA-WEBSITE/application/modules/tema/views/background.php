<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket"></i>
					<span class="caption-subject bold uppercase">
					Background Tema </span>
					<span class="caption-helper"></span>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<?php echo form_open('tema/themes/save',array('class'=>"form-horizontal form-row-seperated form-bordered form-label-stripped"))?>
						<input type="hidden" name="id" value="<?=$id;?>" />
						<div class="form-group">
							<label class="control-label col-md-2">Background Tema <span class="required">* </span></label>
							<div class="col-md-10">
								<div class="form-vertical">
									<?php
									$no=1;
									foreach($pilihtema as $post){ ?>
										<label>
											<input type="radio" name="tema" value="<?=$post['tema'];?>" <?php if($tematerpilih==$post['tema']){ echo 'checked';}?> />
											<span><img src="<?=base_url('files/media/'.$post['image'].'');?>" style="margin-right:20px; margin-bottom:20px;width:300px;height:120px;"/></span><br/>
											<span style="font-size:12px;margin-bottom:20px;margin-left:27px" class="label label-danger"><?=$post['tema'];?></span>&nbsp;&nbsp;
										</label>
									<?php $no++; } ?>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-10 col-md-2">
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