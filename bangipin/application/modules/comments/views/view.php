<?php foreach($viewkomentar as $komentar){
	$status=$komentar['dibaca'];
	$sql=$this->db->query("UPDATE komentar SET dibaca=1 WHERE id='$komentar[id]'");
	$judul=$this->Komentar_model->getJudulBlog($komentar['blogid']);
	?>

	<div class="komentar-header komentar-view-header">
		<h1 class="pull-left"><?=$judul;?> <a href="<?=site_url('appweb/comments');?>"><i class="icon-action-undo"></i>&nbsp;Back </a></h1>
	</div>
	<div class="komentar-view-info">
		<div class="row">
			<div class="col-md-7">
				<img src="<?=base_url('assets/admin/layout/img/avatars.jpg');?>" class="img-circle" style="width:30px;height:30px;">
				<span class="bold"><?=$komentar['username'];?></span>
				<span>&#60;<?=$komentar['email'];?>&#62; </span>
				on 
				<span class="bold"> 
				<?php date_default_timezone_set('Asia/Jakarta');
				echo date('d F Y, H:i',strtotime($komentar['tanggal']));?>
				WIB </span>
			</div>
			<div class="col-md-5 komentar-info-btn">
				<div class="btn-group">
					<button data-messageid="<?=$komentar['id'];?>" class="btn blue reply-btn">
						<i class="fa fa-reply"></i> Reply 
					</button>
					<button class="btn blue dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="javascript:;" data-messageid="<?=$komentar['id'];?>" class="reply-btn">
							<i class="fa fa-reply"></i> Reply </a>
						</li>
						<li>
							<a href="<?=site_url('appweb/comments/hapus/'.$komentar['id']);?>">
							<i class="fa fa-trash-o"></i> Delete </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="komentar-view">
		<p>
		<?php 
		$text=$komentar['review'];
		echo strip_tags($text);
		?>
		</p>
	</div>
	<hr>
<?php } ?>