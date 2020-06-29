<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				<li class="active">
					<a href="<?=base_url('pimpinan/home')?>">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-dashboard'"></i> <span>Dashboard</span>
					</a>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-gudang'"></i>
						<span>Gudang </span>
				 		<span class="pull-right-container">
						<i class="fa fa-caret-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url('pimpinan/lap_stock')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-stok'"></i> Info Stok</a></li>
						<li><a href="<?=base_url('pimpinan/lap_bm')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Barang Masuk</a></li>
						<li><a href="<?=base_url('pimpinan/lap_bk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Barang Keluar</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-shop'"></i>
						<span>Toko Mundu</span>
				 		<span class="pull-right-container">
						<i class="fa fa-caret-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url('pimpinan/st_tokomundu')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-stok'"></i> Info Stok</a></li>
						<li><a href="<?=base_url('pimpinan/lap_belimundu')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Pembelian</a></li>
						<li><a href="<?=base_url('pimpinan/lap_jualmundu')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Penjualan</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-shop'"></i>
						<span>Toko Ringroad</span>
				 		<span class="pull-right-container">
						<i class="fa fa-caret-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url('pimpinan/st_tokoringroad')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-stok'"></i> Info Stok</a></li>
						<li><a href="<?=base_url('pimpinan/lap_beliringroad')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Pembelian</a></li>
						<li><a href="<?=base_url('pimpinan/lap_jualringroad')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Penjualan</a></li>
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
