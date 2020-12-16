<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>
					<span class="caption-subject uppercase">Pekerjaan</span>
				</div>
				<div class="actions">
					<a href="<?=site_url('appweb/jobs/add')?>" class="btn btn-danger btn-circle">
						<i class="fa fa-plus"></i><span class="hidden-480"> Tambah Pekerjaan </span>
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover" id="listpekerjaan">
						<thead>
							<tr role="row" class="heading">
								<th width="5%" >
									 No
								</th>
								<th width="25%">
									 Judul
								</th>
								<th width="10%">
									 Kategori
								</th>
								<th width="15%">
									 Gaji
								</th>
								<th width="10%">
									 Tipe
								</th>
								<th width="10%">
									 Status
								</th>
								<th width="10%">
									 Gambar
								</th>
								<th width="15%">
									 Actions
								</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>