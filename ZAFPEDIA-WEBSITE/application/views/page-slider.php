				<?php if(!empty($slider_top)):?>
					<div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
						<!-- ========================================== SECTION – HERO ========================================= -->
						<div id="hero">
                            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
								<?php
								foreach ($slider_top as $key => $value) :
								?>
                                <div class="item" style="background-image: url(files/media/<?=$value['gambar'];?>);">
                                    <div class="container-fluid">
                                        <div class="caption vertical-center text-left right" style="padding-right:0;">
                                            <!--div class="big-text fadeInDown-1">
                                                <?=strip_tags($value['judul']);?><span class="big"><span class="sign"></span></span>
                                            </div-->

                                            <!--div class="excerpt fadeInDown-2">
                                                <?=strip_tags($value['deskripsi']);?><br/><br/>
											</div>
                                            <div class="small fadeInDown-2">
                                                
                                            </div>
                                            <div class="button-holder fadeInDown-3">
                                                <a href="#" class="big le-button ">shop now</a>
                                            </div-->
                                        </div><!-- /.caption -->
                                    </div><!-- /.container-fluid -->
                                </div><!-- /.item -->
								<?php endforeach; ?>
							</div><!-- /.owl-carousel -->
                        </div>
                        <!-- ========================================= SECTION – HERO : END ========================================= -->
                    </div><!-- /.homebanner-holder -->
				<?php endif;?>