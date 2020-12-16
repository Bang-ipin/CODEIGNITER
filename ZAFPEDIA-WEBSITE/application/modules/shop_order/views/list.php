<div class="row order">
	<div class="col-md-12">
		<ul class="nav nav-tabs  order-nav margin-bottom-10">
			<?php
				$t = "SELECT count(*) as jml FROM pesanan WHERE status_pembayaran=1 AND status_pesanan !=1 order by tgl_pesan DESC";
				$d = $this->db->query($t);
				$r = $d->num_rows();
				if($r > 0){
					foreach($d->result() as $h){
						$orderbelumterbaca = $h->jml;
					}
				}else{
					$orderbelumterbaca = 0;
				}
				
			?>
			<li class="order active">
				<a href="javascript:;" class="btn" data-title="Order">
				Order
				<?php
					if(!empty($orderbelumterbaca)){
						echo "<span class='badge badge-danger'>".$orderbelumterbaca."</span>";
					}
				?>
				</a>
			</li>
			<li class="complete">
				<a class="btn" href="javascript:;" data-title="Complete">
				Complete </a>
				<b></b>
			</li>
			<li class="pending">
				<a class="btn" href="javascript:;" data-title="Pending">
				Pending </a>
				<b></b>
			</li>
			<li class="cancel">
				<a class="btn" href="javascript:;" data-title="Cancel">
				Cancel </a>
				<b></b>
			</li>
		</ul>
	</div>
	<div class="col-md-12">
		<div class="order-body">
			<div class="order-header">
				<h1 class="pull-left">Order</h1>
			</div>
			<div class="order-loading">
				 Loading...
			</div>
			<div class="order-content"></div>
		</div>
	</div>
</div>