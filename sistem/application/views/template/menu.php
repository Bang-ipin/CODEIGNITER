		<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">
						<?php if ($this->session->userdata('usergroup')==1) { ?>
						<li class="active">
							<a href="<?=site_url('administrator')?>">
								<i  data-options="iconCls:'icon-dashboard'"></i> <span> Home</span>
							</a>
						</li>
						<li>
							<a href="<?=site_url('administrator/admin')?>"><i data-options="iconCls:'icon-user'"></i> <span> Admin</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/invoice')?>"><i data-options="iconCls:'icon-user'"></i> <span> List Invoice</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/pelanggan')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pelanggan Halokerja</span></a>
						</li>
						<li>
							<a href="<?=site_url('administrator/sales')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pelanggan HSA</span></a>
						</li>
						<?php }else if ($this->session->userdata('usergroup')==2){ ?>
						<li class="active">
							<a href="<?=site_url('admin')?>">
								<i  data-options="iconCls:'icon-dashboard'"></i> <span> Home</span>
							</a>
						</li>
						<li>
							<a href="<?=site_url('admin/invoice')?>"><i data-options="iconCls:'icon-user'"></i> <span> List Invoice</span></a>
						</li>
						<li>
							<a href="<?=site_url('admin/pelanggan')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Pelanggan</span></a>
						</li>
						<?php } else if ($this->session->userdata('usergroup')==3){ ?>
						<li class="active">
							<a href="<?=site_url('sales')?>">
								<i  data-options="iconCls:'icon-dashboard'"></i> <span> Home</span>
							</a>
						</li>
						<li>
							<a href="<?=site_url('sales/kunjungan')?>"><i data-options="iconCls:'icon-user'"></i> <span> List Kunjungan</span></a>
						</li>
						<li>
							<a href="<?=site_url('sales/konsumen')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Konsumen</span></a>
						</li>
						<li>
							<a href="<?=site_url('sales/invoicedaging')?>"><i  data-options="iconCls:'icon-book'"></i> <span> Invoice</span></a>
						</li>
						<?php } ?>
					</ul>
				</section>
			</aside>