<!-- ============================================================= TOP NAVIGATION ============================================================= -->
            <nav class="top-bar animate-dropdown">
                <div class="container">
                    <div class="col-xs-12 col-sm-12 no-margin">
                        <ul>
                            <li>
								<a href="<?=site_url();?>"><i class="fa fa-home"></i> <span class="title">Home</span></a>
							</li>
							<?php 
							$menulib= new menu_lib();
							$query= $menulib->getPrimaryMenu();
							foreach ($query->result_array() as $menu) : 
							$menu_id=$menu['id_menu'];
							$child_satu = $menulib->getMenuChild($menu_id);
							if($child_satu->num_rows() == 0){ ?>
							<li>
								<a href="<?=$menu['opsi'].''.$menu['url'];?>"> <?=$menu['nama_menu'];?></a>
							</li>
							<?php }else{ ?>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown"  data-target="#" href="javascript:;"><?=ucwords($menu['nama_menu']);?></a>
								<?php if($menulib->getMenuChild($menu_id)) : ?>
								<ul class="dropdown-menu">
									<?php 
									$child_satu = $menulib->getMenuChild($menu_id);
									foreach ($child_satu->result_array() as $child1) :
									$menu_id2=$child1['id_menu'];
									$child_dua = $menulib->getMenuChild($menu_id2);
									if($child_dua->num_rows() == 0){
									?>
									<li>
										 <a href="<?=$child1['opsi'].''.$child1['url'];?>"><?=ucwords($child1['nama_menu']);?></a> 
									</li>
									<?php }else{ ?>
									<li class="dropdown-submenu">
										<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;"><i class="fa fa-angle-right"></i><?=ucwords($child1['nama_menu']);?></a> 
										<?php if($menulib->getMenuChild($menu_id2)) : ?>
										<ul class="dropdown-menu" >
											<?php 
											$child_dua = $menulib->getMenuChild($menu_id2);
											foreach ($child_dua->result_array() as $child2) : ?>
											<li class="dropdown-submenu">
												 <a href="<?=$child2['opsi'].''.$child2['url'];?>"><?=ucwords($child2['nama_menu']);?></a> 
											</li>
											<?php endforeach;?>
										</ul>
										<?php endif;?>
									</li>
									<?php } endforeach;?>
								</ul>
								<?php endif;?>
							</li>
							<?php } endforeach;?>
							<?php if($this->session->userdata('customer_id')) { ?>
							<li class="dropdown dropdown-user dropdown-dark">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<span class="username username-hide-on-mobile">
									<?php echo $this->session->userdata('nama_lengkap');?> </span>
									<?php if(!empty($this->session->userdata('fotomember'))) { ?>
										<img alt="" class="img-circle" src="<?=base_url('files/customer/'.$this->session->userdata('fotomember').'');?>" style="width:20px;height:20px;" />
									<?php }else{?>
										<img alt="" class="img-circle" src="<?php echo base_url('files/images/no-image.jpg');?>" style="width:20px;height:20px;" />
									<?php } ?>
								</a>
								<ul class="dropdown-menu ">
									<li>
										<a href="<?=site_url('member/account/profile/'.$this->session->userdata('username').'');?>">
										<i class="fa fa-user"></i> My Account </a>
									</li>
									<li>
										<a href="<?=site_url('member/logout');?>">
										<i class="fa fa-sign-out"></i> Log Out </a>
									</li>
								</ul>
							</li>
							<?php }else { ?>
							<li><a href="<?=site_url('member/login');?>">Login</a></li>
							<?php } ?>
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.container -->
            </nav><!-- /.top-bar -->
            <!-- ============================================================= TOP NAVIGATION : END ============================================================= -->
