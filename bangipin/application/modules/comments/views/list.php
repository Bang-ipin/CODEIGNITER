<div class="row komentar">
	<div class="col-md-12">
		<ul class="nav nav-tabs komentar-nav margin-bottom-10">
			<?php
				$t = "SELECT count(*) as jml FROM komentar WHERE dibaca=0 AND status=0 order by tanggal DESC";
				$d = $this->db->query($t);
				$r = $d->num_rows();
				if($r > 0){
					foreach($d->result() as $h){
						$pesanbelumterbaca = $h->jml;
					}
				}else{
					$pesanbelumterbaca = 0;
				}
				
			?>
			<li class="komentar active">
				<a href="javascript:;" class="btn" data-title="Komentar">
				Komentar
				<?php
					if(!empty($pesanbelumterbaca)){
						echo "<span class='badge badge-danger'>".$pesanbelumterbaca."</span>";
					}
				?>
				</a>
				<b></b>
			</li>
			<li class="sent">
				<a class="btn" href="javascript:;" data-title="Sent">
				Sent </a>
				<b></b>
			</li>
			<li class="trash">
				<a class="btn" href="javascript:;" data-title="Trash">
				Trash </a>
				<b></b>
			</li>
		</ul>
		
	</div>
	<div class="col-md-12">
		<div class="komentar-body">
			
			<div class="komentar-header">
				<h1 class="pull-left">Komentar</h1>
			</div>
			<div class="komentar-loading">
				 Loading...
			</div>
			<div class="komentar-content"></div>
		</div>
	</div>
</div>