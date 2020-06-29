<?php foreach($viewinbox as $inbox){
	$status=$inbox['status'];
	$sql=$this->db->query("UPDATE kontak SET status=1 WHERE id='$inbox[id]'");
	?>

	<div class="inbox-header inbox-view-header">
		<h1 class="pull-left"><?=$inbox['subjek'];?> <a href="<?=site_url('administrator/inbox');?>"><i class="fa fa-reply"></i>&nbsp;Inbox </a></h1>
		<!--
		<div class="pull-right">
			<i class="fa fa-print"></i>
		</div>
		-->
	</div>
	<div class="inbox-view-info">
		<div class="row">
			<div class="col-md-7">
				<img src="<?=base_url('asset/admin/layout/img/avatars.jpg');?>" class="img-circle" style="width:30px;height:30px;">
				<span class="bold"><?=$inbox['nama'];?></span>
				<span>&#60;<?=$inbox['email'];?>&#62; </span>
				on 
				<span class="bold"> 
				<?php date_default_timezone_set('Asia/Jakarta');
				echo date('d F Y, H:i:s',strtotime($inbox['tanggal']));?>
				WIB </span>
			</div>
			<div class="col-md-5 inbox-info-btn">
				<div class="btn-group">
					<button data-messageid="<?=$inbox['id'];?>" class="btn blue reply-btn">
						<i class="fa fa-reply"></i> Reply 
					</button>
					<button class="btn blue dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="javascript:;" data-messageid="<?=$inbox['id'];?>" class="reply-btn">
							<i class="fa fa-reply"></i> Reply </a>
						</li>
						<li>
							<a href="<?=site_url('administrator/inbox/hapus/'.$inbox['id']);?>">
							<i class="fa fa-trash-o"></i> Delete </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="inbox-view">
		<p>
		<?php 
		$text=$inbox['pesan'];
		echo strip_tags($text);
		?>
		</p>
	</div>
	<hr>
<?php } ?>