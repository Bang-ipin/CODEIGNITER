 <!-- ========================================= MAIN ========================================= -->
            <main id="faq" class="inner-bottom-md">
                <div class="container">

                    <section class="section">
                        <div class="page-header">
                            <h2 class="page-title">Frequently Asked Questions</h2>
                            
                        </div>
                        <div id="questions" class="panel-group panel-group-faq">
                            <?php foreach($datafaq as $data):?>
							<div class="panel panel-faq">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#questions" href="#<?=$data['collapse'];?>">
                                            <?=$data['pertanyaan'];?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?=$data['collapse'];?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?=$data['jawaban'];?>
                                    </div>
                                </div>
                            </div><!-- /.panel-faq -->
							<?php endforeach;?>
                        </div><!-- /.panel-group -->
                    </section><!-- /.section -->

                </div><!-- /.container -->
            </main><!-- /.inner-bottom-md -->
            <!-- ========================================= MAIN : END ========================================= -->