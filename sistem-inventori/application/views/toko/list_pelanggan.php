	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Dashboard
					<small>Sistem Informasi Inventori dan Penjualan</small>
			</h1>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header bg-aqua">
							<a class="btn btn-default" href="<?=base_url('toko_ringroad/pelanggan/tambah_pelanggan');?>">
								<span><img src="<?php echo base_url();?>asset/image/add.png" width="20"></img></span>Tambah pelanggan
							</a>
						</div>
						<div class="box-body">
						<div><?php echo $this->session->flashdata('message')?></div>
						<div><?php echo $this->session->flashdata('pesan')?></div>
							<div class="table-responsive" style="padding:5px;">
								<table id="table" class="table-bordered table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Id pelanggan</th>
											<th>Nama pelanggan</th>
											<th>Alamat</th>
											<th>Telepon</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=0;
										foreach($query as $rows){
										?>
										<tr>
											<td><?php echo ++$no;?></td>
											<td><?php echo $rows->id_pelanggan;?></td>
											<td><?php echo $rows->nama_pelanggan;?></td>
											<td><?php echo $rows->alamat;?></td>
											<td><?php echo $rows->telepon;?></td>
											<td>
											<a href="<?php echo base_url('toko_ringroad/pelanggan/edit')?>/<?php echo $rows->id_pelanggan?>" class="btn btn-link btn-xs"><img src="<?php echo base_url();?>asset/easyui/themes/icons/pencil.png"></img></a>
											<a href="<?php echo base_url('toko_ringroad/pelanggan/delete')?>/<?php echo $rows->id_pelanggan?>" class="btn btn-link btn-xs" onclick="return confirm('Anda Yakin menghapus data ini?')"><img src="<?php echo base_url()?>asset/easyui/themes/icons/no.png"></img></a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="clearfix" style="margin-bottom:65px;"/>
