<!-- ========================================= HOME BANNERS ========================================= -->
            <section id="banner-holder" class="wow fadeInUp">
                <div class="container">
                    <?php foreach($iklantop as $data): ?>
					<div class="col-xs-12 col-lg-6 no-margin banner ">
                        <a href="<?=$data['url'];?>">
                            <div class="banner-text theblue">
                                <h1><?=$data['nama_iklan'];?></h1>
                                <span class="tagline"></span>
                            </div>
                            <img class="banner-image" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=$data['image'];?>" style="width:500px;height:300px"/>
                        </a>
                    </div>
					<?php endforeach;?>
                     <?php foreach($iklanbottom as $data): ?>
					 <div class="col-xs-12 col-lg-6 no-margin text-right banner">
                        <a href="<?=$data['url'];?>">
                            <div class="banner-text right">
                                <h1><?=$data['nama_iklan'];?></h1>
                                <span class="tagline"></span>
                            </div>
                            <img class="banner-image" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=$data['image'];?>" style="width:500px;height:300px"/>
                        </a>
                    </div>
					<?php endforeach;?>
                </div><!-- /.container -->
            </section><!-- /#banner-holder -->
            <!-- ========================================= HOME BANNERS : END ========================================= -->