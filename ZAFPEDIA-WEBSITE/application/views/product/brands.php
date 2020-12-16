<!-- ========================================= TOP BRANDS ========================================= -->
            <?php if (!empty($produsen)): ?>
			<section id="top-brands" class="wow fadeInUp">
                <div class="container">
                    <div class="carousel-holder" >

                        <div class="title-nav">
                            <h1>Top Brands</h1>
                            <div class="nav-holder">
                                <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                                <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                            </div>
                        </div><!-- /.title-nav -->

                        <div id="owl-brands" class="owl-carousel brands-carousel">
							<?php
							$no=0;
							foreach($produsen as $data):  ?>
                            <div class="carousel-item">
                                <a href="<?=base_url('files/medium/'.$data['gambar'].'');?>" class="fancy-view">
                                    <img alt="<?=$data['nama'];?>" src="<?=base_url('files/media/'.$data['gambar'].'');?>" />
                                </a>
                            </div><!-- /.carousel-item -->
							<?php $no++; endforeach;  ?>
                        </div><!-- /.brands-caresoul -->

                    </div><!-- /.carousel-holder -->
                </div><!-- /.container -->
            </section><!-- /#top-brands -->
            <?php endif;?>
			<!-- ========================================= TOP BRANDS : END ========================================= -->