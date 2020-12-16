			<div id="top-banner-and-menu">
                <div class="container">
                    <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
                        <!-- ================================== TOP NAVIGATION ================================== -->
                        <div class="side-menu animate-dropdown">
                            <div class="head"><i class="fa fa-list"></i> all departments</div>
                            <nav class="yamm megamenu-horizontal" role="navigation">
                                <ul class="nav">
                                    <?php 
									$menulib= new menu_lib();
									$query= $menulib->getSidebarMenu();
									foreach ($query->result_array() as $menu) : 
									$menu_id=$menu['id_menu'];
									$child_satu = $menulib->getMenuChild($menu_id);
									if($child_satu->num_rows() == 0){ ?>
									<li>
										<a href="<?=$menu['opsi'].''.$menu['url'];?>"><?=ucwords($menu['nama_menu']);?></a>
									</li>
									<?php }else{ ?>
                                    <li class="dropdown menu-item">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?=ucwords($menu['nama_menu']);?></a>
                                        <?php if($menulib->getMenuChild($menu_id)) : ?>
										<ul class="dropdown-menu mega-menu">
                                            <?php 
											$child_dua = $menulib->getMenuChild($menu_id);
											?> 
											<li class="yamm-content">
                                                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                                <div class="row">
													<?php foreach ($child_satu->result_array() as $child1) :
														$menu_id2=$child1['id_menu'];
														$child_dua = $menulib->getMenuChild($menu_id2);
													?>
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                        <h2><a href="<?=$child1['opsi'].''.$child1['url'];?>"><?=ucwords($child1['nama_menu']);?></a></h2>
														<ul>
															<?php 
																$child_dua = $menulib->getMenuChild($menu_id2);
																foreach ($child_dua->result_array() as $child2) :
															?>
                                                            <li>
																<a href="<?=$child2['opsi'].''.$child2['url'];?>"><?=ucwords($child2['nama_menu']);?></a>
															</li>
															<?php endforeach;?>
                                                        </ul>
												    </div>
													<?php endforeach;?>
                                                    <div class="dropdown-banner-holder">
                                                    </div>
                                                </div>
                                                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                            </li>
										</ul>
										<?php endif;?>
                                    </li><!-- /.menu-item -->
									<?php } endforeach;?>
                                </ul><!-- /.nav -->
                            </nav><!-- /.megamenu-horizontal -->
                        </div><!-- /.side-menu -->
                        <!-- ================================== TOP NAVIGATION : END ================================== -->
                    </div><!-- /.sidemenu-holder -->
                   <?php if (isset($slider_top))
						{
							include_once(APPPATH.'views/page-slider.php');
						}
					?>
                </div><!-- /.container -->
            </div><!-- /#top-banner-and-menu -->