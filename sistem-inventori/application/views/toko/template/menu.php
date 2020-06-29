<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				<li class="active">
					<a href="<?=base_url('toko_ringroad/home')?>">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-dashboard'"></i> <span>Dashboard</span>
					</a>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-master'"></i>
						<span>Master</span>
						<span class="pull-right-container">
						<i class="fa fa-caret-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url('toko_ringroad/stok_toko')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-produk'"></i> Info Barang</a></li>
						<li><a href="<?=base_url('toko_ringroad/pelanggan')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-user'"></i> Pelanggan</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-cart'"></i>
						<span>Transaksi</span>
						<span class="pull-right-container">
						<i class="fa fa-caret-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url('toko_ringroad/pembelian')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-pembelian'"></i> Pembelian</a></li>
						<li><a href="<?=base_url('toko_ringroad/penjualan')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-penjualan'"></i> Penjualan</a></li>
						<li><a href="<?=base_url('toko_ringroad/retur_pembelian')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-pembelian'"></i> Retur Pembelian</a></li>
						<li><a href="<?=base_url('toko_ringroad/retur_penjualan')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-penjualan'"></i> Retur Penjualan</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="easyui-linkbutton" data-options="iconCls:'icon-laporan'"></i>
						<span>Laporan</span>
						<span class="pull-right-container">
						<i class="fa fa-caret-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url('toko_ringroad/lap_stock')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-stok'"></i> Info Stok</a></li>
						<li><a href="<?=base_url('toko_ringroad/lap_pembelian')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Pembelian</a></li>
						<li><a href="<?=base_url('toko_ringroad/lap_penjualan')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Penjualan</a></li>
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
