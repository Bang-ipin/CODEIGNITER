            <!-- ========================================= MAIN ========================================= -->
            <main id="contact-us" class="inner-bottom-md">
                <section class="google-map map-holder">
                    <div id="map" class="map center"></div>
				</section>

                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <section class="section leave-a-message">
                                <h2 class="bordered">Leave a Message</h2>
                                <p>
									<?php  if (isset($konten)){
										echo $konten;
									}  ?>
								</p>
								<div class="clearfix"></div>
								<?php if($this->session->flashdata('SUCCESSMSG')) { ?>
								<div role="alert" class="alert alert-success">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
									<strong>Sukses!</strong>
									<?=$this->session->flashdata('SUCCESSMSG')?>
								</div>
								<?php } ?>
								<?php if($this->session->flashdata('GAGALMSG')) { ?>
								<div role="alert" class="alert alert-danger">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
									<strong>Error!</strong>
									<?=$this->session->flashdata('GAGALMSG')?>
								</div>
								<?php } ?>
								<div class="clearfix"></div>
								<?=form_open('inbox/inbox/sendinbox', array('id'=>"contact-form",'class'=>"contact-form cf-style-1 inner-top-xs"));?>
								    <div class="row field-row">
                                        <div class="col-xs-12 col-sm-6">
                                            <label>Your Name*</label>
                                            <input type="text" class="le-input form-control" name="name" id="name" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label>Your Email*</label>
                                           <input type="text" class="le-input form-control" name="email" id="email" required>
                                        </div>
                                    </div><!-- /.field-row -->

                                    <div class="field-row">
                                        <label>Subject</label>
                                        <input type="text" class="le-input form-control" name="subjek" id="subjek">
                                    </div><!-- /.field-row -->

                                    <div class="field-row">
                                        <label>Your Message</label>
                                        <textarea class="le-input form-control" rows="8" name="pesan" id="pesan" required></textarea>
                                    </div><!-- /.field-row -->
                                    <?php echo $captcha;?>
                                    <?php echo $scriptcaptcha;?>
                                    <div class="buttons-holder">
                                        <button type="submit" class="le-button huge">Send Message</button>
                                    </div><!-- /.buttons-holder -->
                                <?=form_close();?><!-- /.contact-form -->
                            </section><!-- /.leave-a-message -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </main>
            <!-- ========================================= MAIN : END ========================================= -->

            
