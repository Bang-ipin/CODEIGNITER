<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				<li class="active">
					<a href="<?=base_url('admin/home')?>">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-dashboard'"></i> <span> Dashboard</span>
					</a>
				</li>
				<li>
					<a href="<?=base_url('admin/user/')?>">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-user'"></i> <span> Pengguna</span>
					</a>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-master'"></i>  <span> Master</span>
						<span class="pull-right-container">
							<i class="fa fa-caret-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url('admin/produk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-produk'"></i> Barang</a></li>
						<li><a href="<?=base_url('admin/kategori')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-kategori'"></i> Jenis Barang</a></li>
						<li><a href="<?=base_url('admin/supplier')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-supplier'"></i> Supplier</a></li>
					</ul>
				</li>
				<li>
					<a href="<?=base_url('login/logout')?>">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-exit'"></i> <span>Log Out</span>
					</a>
				</li>
			</ul>
		</section>
	</aside>
