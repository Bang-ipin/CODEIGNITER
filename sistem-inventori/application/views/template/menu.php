<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">
						<?php if($this->session->userdata('usergroup')=="Administrator"){ ?>
						<li class="active">
							<a href="<?=base_url('admin/home')?>">
								<i class="easyui-linkbutton" data-options="iconCls:'icon-dashboard'"></i> <span> Dashboard</span>
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
								<li><a href="<?=base_url('admin/user')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-user'"></i> <span> Pengguna</span></a></li>
								<li><a href="<?=base_url('admin/produk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-produk'"></i><span> Barang</span></a></li>
								<li><a href="<?=base_url('admin/kategori')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-kategori'"></i><span> Jenis Barang</span></a></li>
								<li><a href="<?=base_url('admin/supplier')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-supplier'"></i><span> Supplier</span></a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="easyui-linkbutton" data-options="iconCls:'icon-settings'"></i>  <span> Setting </span>
								<span class="pull-right-container">
									<i class="fa fa-caret-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?=base_url('admin/config')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-konfig'"></i> <span> Konfigurasi</span></a></li>
								<li><a href="<?=base_url('admin/config/backup_db')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-dbase'"></i><span> Backup Database </span></a></li>
							</ul>
						</li>
						<?php } ?>
						<?php if($this->session->userdata('usergroup')=="Gudang"){?>
						<li class="active">
							<a href="<?=base_url('gudang/home')?>">
								<i class="easyui-linkbutton" data-options="iconCls:'icon-dashboard'"></i> <span> Dashboard</span>
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
								<li><a href="<?=base_url('gudang/produk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-produk'"></i>Barang</a></li>
								<li><a href="<?=base_url('gudang/kategori')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-kategori'"></i>Jenis Barang</a></li>
								<li><a href="<?=base_url('gudang/supplier')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-supplier'"></i>Supplier</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="easyui-linkbutton" data-options="iconCls:'icon-cart'"></i>
								<span> Transaksi</span>
								<span class="pull-right-container">
								<i class="fa fa-caret-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?=base_url('gudang/tbm')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-pembelian'"></i> Barang Masuk</a></li>
								<li><a href="<?=base_url('gudang/tbk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-penjualan'"></i> Barang Keluar</a></li>
								<li><a href="<?=base_url('gudang/retur_beli')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-pembelian'"></i> Retur Barang Masuk</a></li>
								<li><a href="<?=base_url('gudang/retur_jual')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-penjualan'"></i> Retur Barang Keluar</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="easyui-linkbutton" data-options="iconCls:'icon-laporan'"></i>
								<span> Laporan</span>
								<span class="pull-right-container">
								<i class="fa fa-caret-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?=base_url('gudang/lap_stock')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-stok'"></i> Info Stok</a></li>
								<li><a href="<?=base_url('gudang/lap_bm')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Barang Masuk</a></li>
								<li><a href="<?=base_url('gudang/lap_bk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Barang Keluar</a></li>
								<li><a href="<?=base_url('gudang/returmasuk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Retur Barang Masuk</a></li>
								<li><a href="<?=base_url('gudang/returkeluar')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Retur Barang Keluar</a></li>
								<li><a href="<?=base_url('gudang/grafik')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Grafik</a></li>
							</ul>
						</li>
						<?php }?>
						<?php if($this->session->userdata('usergroup')=="Pimpinan"){?>
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
								<li><a href="<?=base_url('pimpinan/returmasuk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Retur Barang Masuk</a></li>
								<li><a href="<?=base_url('pimpinan/returkeluar')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Retur Barang Keluar</a></li>
								<li><a href="<?=base_url('pimpinan/grafikgudang')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Grafik</a></li>
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
								<li><a href="<?=base_url('pimpinan/returbeli1')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Retur Pembelian</a></li>
								<li><a href="<?=base_url('pimpinan/returjual1')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Retur Penjualan</a></li>
								<li><a href="<?=base_url('pimpinan/grafikmundu')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Grafik</a></li>
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
								<li><a href="<?=base_url('pimpinan/returbeli2')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Retur Pembelian</a></li>
								<li><a href="<?=base_url('pimpinan/returjual2')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Retur Penjualan</a></li>
								<li><a href="<?=base_url('pimpinan/grafikringroad')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Grafik</a></li>
							</ul>
						</li>
						<?php }?>
						<?php if($this->session->userdata('usergroup')=="TokoMundu"){ ?>
						<li class="active">
							<a href="<?=base_url('toko_mundu/home')?>">
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
								<li><a href="<?=base_url('toko_mundu/stok_toko')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-produk'"></i> Info Barang</a></li>
								<li><a href="<?=base_url('toko_mundu/pelanggan')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-user'"></i> Pelanggan</a></li>
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
								<li><a href="<?=base_url('toko_mundu/pembelian')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-pembelian'"></i> Pembelian</a></li>
								<li><a href="<?=base_url('toko_mundu/penjualan')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-penjualan'"></i> Penjualan</a></li>
								<li><a href="<?=base_url('toko_mundu/retur_beli')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-pembelian'"></i> Retur Pembelian</a></li>
								<li><a href="<?=base_url('toko_mundu/retur_jual')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-penjualan'"></i> Retur Penjualan</a></li>
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
								<li><a href="<?=base_url('toko_mundu/lap_stock')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-stok'"></i> Info Stok</a></li>
								<li><a href="<?=base_url('toko_mundu/lap_pembelian')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Pembelian</a></li>
								<li><a href="<?=base_url('toko_mundu/lap_penjualan')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Penjualan</a></li>
								<li><a href="<?=base_url('toko_mundu/returmasuk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Retur Pembelian</a></li>
								<li><a href="<?=base_url('toko_mundu/returkeluar')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Retur Penjualan</a></li>
								<li><a href="<?=base_url('toko_mundu/grafikmundu')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Grafik</a></li>
							</ul>
						</li>
						<?php } ?>
						<?php  if($this->session->userdata('usergroup')=="TokoRingroad"){ ?>
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
								<li><a href="<?=base_url('toko_ringroad/retur_beli')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-pembelian'"></i> Retur Pembelian</a></li>
								<li><a href="<?=base_url('toko_ringroad/retur_jual')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-penjualan'"></i> Retur Penjualan</a></li>
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
								<li><a href="<?=base_url('toko_ringroad/returmasuk')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-pembelian'"></i> Retur Pembelian</a></li>
								<li><a href="<?=base_url('toko_ringroad/returkeluar')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Retur Penjualan</a></li>
								<li><a href="<?=base_url('toko_ringroad/grafikringroad')?>"><i class="easyui-linkbutton" data-options="iconCls:'icon-r-penjualan'"></i> Grafik</a></li>
							</ul>
						</li>
					<?php } ?>
					</ul>
				</section>
			</aside>