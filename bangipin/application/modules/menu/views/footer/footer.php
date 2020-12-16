<?php 
$menulib = new menu_lib();
?>
<div class="well">
	<span class="label label-danger">
	NOTE! </span>
	<span>
	<span class="bold">
	Nestable List Plugin </span>
	supported in Firefox, Chrome, Opera, Safari, Internet Explorer 10 and Internet Explorer 9 only. Internet Explorer 8 not supported. </span>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="margin-bottom-10" id="nestable_list_menu">
			<button type="button" class="btn" data-action="expand-all">Expand All</button>
			<button type="button" class="btn" data-action="collapse-all">Collapse All</button>
			<a href="<?=site_url('appweb/menu');?>" class="btn btn-danger" name="back"><i class="fa fa-angle-left"></i> Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<input type="hidden" id="menu_nestable_output" class="form-control col-md-12 margin-bottom-10"/>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list "></i>
					<span class="caption-subject uppercase">Custom Menu</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="expand"></a>
				</div>
			</div>
			<div class="portlet-body display-hide">
				<div class="form-body">
					<?=form_open('menu/menu/addmenucustom',array('id'=>'menufooter','class'=>'form-horizontal form-row-stripped'));?>
	                    <div class="form-group">
							<div class="col-md-10">
								<label class="control-label">Nama Menu:<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="nama-menu-custom" id="nama-menu-custom" required>
								<input class="form-control" type="hidden" name="type-menu-custom" id="type-menu-custom" value="3">
								<span class="help-block">Example:Home,Beranda</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10">
								<label class="control-label">Link:<span class="text-danger"></span></label>
								<input class="form-control" type="text" name="url-menu-custom" id="url-menu-custom">
								<span class="help-block">Gunakan http:// atau https://, atau Kosongkan atau isi dengan '#' bila tidak terdapat url</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10">
								<label class="control-label">Type:<span class="text-danger"></span></label>
								<select name="option-menu-custom" id="option-menu-custom" class="form-control">
									<option value="1">URL Homepage</option>
									<option value="0">LINK </option>
								</select>
								<span class="help-block">Contoh Link : http://facebook.com, http://twitter.com,</span>
							</div>
						</div>
						&nbsp;<br/>
						<button type="submit" class="btn btn-sm btn-primary" title="tambahkan ke menu"><i class="fa fa-sign-out"></i><span class="title">Tambahkan</span></button>
                	<?=form_close();?>
                </div>
			</div>
		</div>
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list "></i>
					<span class="caption-subject uppercase">Laman</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="expand"></a>
				</div>
			</div>
			<div class="portlet-body display-hide">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover" >
						<thead>
							<tr role="row" class="heading">
								<th width="20%">
									Nama
								</th>
								<th width="15%">
									 Aksi
								</th>
							</tr>
						</thead>
						<?php
						$no=1;
						foreach ($querypages as $pages) { ?>
						<tbody>
							<td>
								<?=$pages['nama_laman'];?>
							</td>
							<td align="center">
								<a href="javascript:;" data-url="<?=$pages['laman_seo'];?>" data-type="3" data-opsi="1" data-title="<?=$pages['nama_laman'];?>" class="tambahkan-ke-menu3 btn btn-sm btn-primary" title="Tambahkan ke Menu"><i class='fa fa-sign-out'></i> </a>
							</td>
						</tbody>
							<?php
							$no++;
							}
							?>
					</table>
				</div>
			</div>
		</div>
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list "></i>
					<span class="caption-subject uppercase">Kategori Blog</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="expand"></a>
				</div>
			</div>
			<div class="portlet-body display-hide">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover" >
						<thead>
							<tr role="row" class="heading">
								<th width="20%">
									Nama
								</th>
								<th width="15%">
									 Aksi
								</th>
							</tr>
						</thead>
						<?php 
						$no=1;
						foreach ($kategoriblog as $cat) { ?>
						<tbody>
							<td><?=$cat['kategori'];?></td>
							<td align="center">
								<a href="javascript:;" data-type="3" data-url="blog/<?=$cat['kategori_seo'];?>" data-opsi="1" data-title="<?=$cat['kategori'];?>" class="tambahkan-ke-menu3 btn btn-sm btn-primary" title="Tambahkan ke Menu"><i class="fa fa-sign-out"></i>
								</a>
							</td>
						</tbody>
						<?php
							$no++;
							}
						?>
					</table>
				</div>
			</div>
		</div>
		<!--div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list "></i>
					<span class="caption-subject uppercase">Kategori Berita</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="expand"></a>
				</div>
			</div>
			<div class="portlet-body display-hide">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover" >
						<thead>
							<tr role="row" class="heading">
								<th width="20%">
									Nama
								</th>
								<th width="15%">
									 Aksi
								</th>
							</tr>
						</thead>
						<?/* php 
						$no=1;
						foreach ($kategoriberita as $cat) { */ ?>
						<tbody>
							<td><?//=$cat['kategori'];?></td>
							<td align="center">
								<a href="javascript:;" data-type="3" data-url="berita/<?//=$cat['kategori_seo'];?>" data-opsi="1" data-title="<?//=$cat['kategori'];?>" class="tambahkan-ke-menu3 btn btn-sm btn-primary" title="Tambahkan ke Menu"><i class="fa fa-sign-out"></i>
								</a>
							</td>
						</tbody>
						<?/* php
							$no++;
							} */
						?>
					</table>
				</div>
			</div>
		</div-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list "></i>
					<span class="caption-subject uppercase">Modul</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="expand"></a>
				</div>
			</div>
			<div class="portlet-body display-hide">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover" >
						<thead>
							<tr role="row" class="heading">
								<th width="20%">
									Nama
								</th>
								<th width="15%">
									 Aksi
								</th>
							</tr>
						</thead>
						<?php 
						$no=1;
						foreach ($modul as $mod) { ?>
						<tbody>
							<td><?=$mod['nama'];?></td>
							<td align="center">
								<a href="javascript:;" data-type="3" data-url="<?=$mod['url_modul'];?>" data-opsi="1" data-title="<?=$mod['nama'];?>" class="tambahkan-ke-menu3 btn btn-sm btn-primary" title="Tambahkan ke Menu"><i class="fa fa-sign-out"></i>
								</a>
							</td>
						</tbody>
						<?php
							$no++;
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list"></i>Footer Menu
				</div>
				<div class="tools">
					<a href="javascript:;" class="expand"></a>
					<a href="javascript:;" class="reload"></a>
				</div>
			</div>
			<?php if(isset($tampilmenu)){
				echo $tampilmenu;
			}
			?>
		</div>
	</div>
</div>