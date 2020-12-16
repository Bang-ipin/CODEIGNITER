<?php foreach($viewulasan as $ulsn){
	$status=$ulsn['dibaca'];
	$sql=$this->db->query("UPDATE ulasan SET dibaca=1 WHERE id='$ulsn[id]'");
	$judul=$this->Ulasan_model->getJudulProduk($ulsn['produkid']);
	?>

	<div class="ulasan-header ulasan-view-header">
		<h1 class="pull-left"><?=$judul;?> <a href="<?=site_url('appweb/review-product');?>"><i class="icon-action-undo"></i>&nbsp;Back </a></h1>
	</div>
	<div class="ulasan-view-info">
		<div class="row">
			<div class="col-md-7">
				<img src="<?=base_url('assets/admin/layout/img/avatars.jpg');?>" class="img-circle" style="width:30px;height:30px;">
				<span class="bold"><?=$ulsn['username'];?></span>
				<span>&#60;<?=$ulsn['email'];?>&#62; </span>
				on 
				<span class="bold"> 
				<?php date_default_timezone_set('Asia/Jakarta');
				echo date('d F Y, H:i',strtotime($ulsn['tanggal']));?>
				WIB </span>
			</div>
			<div class="col-md-5 ulasan-info-btn">
				<div class="btn-group">
					<button data-messageid="<?=$ulsn['id'];?>" class="btn blue reply-btn">
						<i class="fa fa-reply"></i> Reply 
					</button>
					<button class="btn blue dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="javascript:;" data-messageid="<?=$ulsn['id'];?>" class="reply-btn">
							<i class="fa fa-reply"></i> Reply </a>
						</li>
						<li>
							<a href="<?=site_url('appweb/ulasan-product/hapus/'.$ulsn['id']);?>">
							<i class="fa fa-trash-o"></i> Delete </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="ulasan-view">
		<p>
		<?php 
		$text=$ulsn['review'];
		echo strip_tags($text);
		?>
		</p>
	</div>
	<hr>
<?php } ?>