<div class="row inbox">
	<div class="col-md-2">
		<ul class="inbox-nav margin-bottom-10">
			<?php
				$t = "SELECT count(*) as jml FROM kontak WHERE status=0 order by tanggal DESC";
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
			<li class="compose-btn">
				<a href="javascript:;" data-title="Compose" class="btn green compose-btn btn-block">
				<i class="fa fa-edit"></i> Compose </a>
			</li>
			<li class="inbox active">
				<a href="javascript:;" class="btn" data-title="Inbox">
				Inbox
				<?php
					if(!empty($pesanbelumterbaca)){
						echo "<span class='badge badge-danger'>".$pesanbelumterbaca."</span>";
					}
				?>
				</a>
				<b></b>
			</li>
		</ul>
		
	</div>
	<div class="col-md-10">
		<div class="inbox-body">
			
			<div class="inbox-header">
				<h1 class="pull-left">Inbox</h1>
			</div>
			<div class="inbox-loading">
				 Loading...
			</div>
			<div class="inbox-content"></div>
		</div>
	</div>
</div>