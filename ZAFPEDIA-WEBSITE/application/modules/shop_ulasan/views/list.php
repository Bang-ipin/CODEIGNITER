<div class="row ulasan">
						<div class="col-md-12">
							<ul class="nav nav-tabs ulasan-nav margin-bottom-10">
								<?php
									$t = "SELECT count(*) as jml FROM ulasan WHERE dibaca=0 AND status=0 order by tanggal DESC";
									$d = $this->db->query($t);
									$r = $d->num_rows();
									if($r > 0){
										foreach($d->result() as $h){
											$ulasan = $h->jml;
										}
									}else{
										$ulasan = 0;
									}
									
								?>
<li class="ulasan active">
									<a href="javascript:;" class="btn" data-title="Ulasan">
									Ulasan 
									<?php
										if(!empty($ulasan)){
											echo "<span class='badge badge-danger'>".$ulasan."</span>";
										}
									?>
									</a>
								</li>
								<li class="sent">
									<a class="btn" href="javascript:;" data-title="Sent">
									Sent </a>
								</li>
								<li class="trash">
									<a class="btn" href="javascript:;" data-title="Trash">
									Trash </a>
								</li>
							</ul>
						</div>
						<div class="col-md-12">
							<div class="ulasan-body">
								
								<div class="ulasan-header">
									<h1 class="pull-left">Ulasan Produk</h1>
								</div>
								<div class="ulasan-loading">
									 Loading...
								</div>
								<div class="ulasan-content"></div>
							</div>
						</div>
					</div>