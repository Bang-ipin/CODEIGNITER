			<!-- ========================================= MAIN ========================================= -->
            <main id="about-us">
				<?php foreach($dataabout as $data){?>
                <div class="container inner-top-xs inner-bottom-sm">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-lg-8 col-sm-6">
                            <section id="who-we-are" class="section m-t-0">
								<p><?=$data['deskripsi1'];?></p>
							</section><!-- /#who-we-are -->
                        </div><!-- /.col -->
                        <div class="col-xs-12 col-md-4 col-lg-4 col-sm-6">
                            <section id="our-team">
                                <h2 class="sr-only">Our team</h2>
                                <ul class="team-members list-unstyled">

                                    <li class="team-member">
                                        <img src="<?=base_url('files/medium/'.$data['gambar'].'');?>" alt="" class="profile-pic img-responsive">
                                        <div class="profile">
                                            <h3><small class="designation"></small></h3>
                                            <ul class="social list-unstyled">
                                                <li>
                                                    <a href="http://facebook.com/">
                                                        <span class="fa-stack fa-lg">
                                                          <i class="fa fa-circle fa-stack-2x"></i>
                                                          <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://twitter.com/">
                                                        <span class="fa-stack fa-lg">
                                                          <i class="fa fa-circle fa-stack-2x"></i>
                                                          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://linkedin.com/">
                                                        <span class="fa-stack fa-lg">
                                                          <i class="fa fa-circle fa-stack-2x"></i>
                                                          <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.profile -->
                                    </li><!-- /.team-member -->
                                 
                                </ul><!-- /.team-members -->
                            </section><!-- #our-team -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container -->

                <section id="what-can-we-do-for-you" class="row light-bg inner-sm">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 section m-t-0">
                                <p><?=$data['deskripsi2'];?></p>
                            </div><!-- /.section -->

                            <div class="col-md-9">
                                <ul class="services list-unstyled row m-t-35">
                                    <li class="col-md-4">
                                        <div class="service">
                                            <div class="service-icon primary-bg"><i class="fa fa-truck"></i></div>
                                            <h3><?=$data['judul1'];?></h3>
                                            <p><?=$data['text1'];?></p>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="service">
                                            <div class="service-icon primary-bg"><i class="fa fa-life-saver"></i></div>
                                            <h3><?=$data['judul2'];?></h3>
                                            <p><?=$data['text2'];?></p>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="service">
                                            <div class="service-icon primary-bg"><i class="fa fa-star"></i></div>
                                            <h3><?=$data['judul3'];?></h3>
                                            <p><?=$data['text3'];?></p>
                                        </div>
                                    </li>
                                </ul><!-- /.services -->
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </section><!-- /#what-can-we-do-for-you -->
				<?php } ?>
                <section id="our-clients" class="row inner-sm">
                    <div class="container">
                        <h2 class="sr-only">Our Clients</h2>
                        <ul class="list-unstyled row list-clients">
                           
                        </ul>
                    </div>
                </section><!-- /#our-clients .row -->
            </main><!-- /#about-us -->
            <!-- ========================================= MAIN : END ========================================= -->