		<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">
						<?php if ($this->session->userdata('usergroup')=='Administrator') { ?>
						<li class="active">
							<a href="<?=site_url('administrator')?>">
								<i  data-options="iconCls:'icon-dashboard'"></i> <span> Home</span>
							</a>
						</li>
						<li>
							<a href="<?=site_url('administrator/admin')?>"><i data-options="iconCls:'icon-user'"></i> <span> Admin</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/anggota')?>"><i data-options="iconCls:'icon-users'"></i> <span> Anggota</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/kategori')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Kategori Buku</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/rak')?>"><i data-options="iconCls:'icon-book'"></i> <span> Lokasi Buku</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/buku')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Koleksi Buku</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/ebook')?>"><i  data-options="iconCls:'icon-book'"></i> <span> E-book</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/materi')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pembelajaran</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/pengunjung')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pengunjung</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/peminjaman')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Peminjaman</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/booking')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pesan Buku</span></a>
						</li>
						<?php }else if ($this->session->userdata('usergroup')=='Admin'){ ?>
						<li class="active">
							<a href="<?=site_url('admin')?>">
								<i  data-options="iconCls:'icon-dashboard'"></i> <span> Home</span>
							</a>
						</li>
						<li>
							<a href="<?=site_url('admin/anggota')?>"><i data-options="iconCls:'icon-user'"></i> <span> Anggota</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/kategori')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Kategori Buku</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/rak')?>"><i data-options="iconCls:'icon-book'"></i> <span> Lokasi Buku</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/buku')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Koleksi Buku</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/ebook')?>"><i  data-options="iconCls:'icon-book'"></i> <span> E-book</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/materi')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pembelajaran</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/pengunjung')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pengunjung</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/peminjaman')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Peminjaman</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/pengembalian')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pengembalian</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/lihatpesanan')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pesan Buku</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/denda')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Denda</span></a>
						</li>
						<?php }else if ($this->session->userdata('usergroup')=='Anggota'){ ?>
						<li class="active">
							<a href="<?=site_url('anggota')?>">
								<span> Home</span>
							</a>
						</li>
						<li>
							<a href="<?=site_url('anggota/buku')?>"><span> Koleksi Buku</span></a>
						</li>
						<li>
							<a href="<?=site_url('anggota/ebook')?>"><i  data-options="iconCls:'icon-book'"></i> <span> E-book</span></a>
						</li>
						<li>
							<a href="<?=site_url('anggota/materi')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pembelajaran</span></a>
						</li>
						<li class="treeview">
							<a href="#">
								<span> Pesan Buku</span>
								<span class="pull-right-container">
								<i class="fa fa-caret-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?=site_url('anggota/booking')?>">Buat Pesanan</a></li>
								<li><a href="<?=site_url('anggota/lihatpesanan')?>">Lihat Pesanan</a></li>
							</ul>
						</li>
						<?php }else{ ?>
						<li class="active">
							<a href="<?=site_url()?>">
								<span> Home</span>
							</a>
						</li>
						<li>
							<a href="<?=site_url('buku')?>"><span> Koleksi Buku</span></a>
						</li>
						<?php } ?>
					</ul>
				</section>
			</aside>