            <section style="height:250px;overflow-y:scroll;">
                <div class="container-fluid">
                    <div class="comments">
                        <?php foreach ($komentar as $data): ?>
                            <?php if($data['username']=='admin'){ 
                                $style="style='border: 1px solid;border-radius:10px;margin-bottom:10px;background-color:#57ef7f;'";
                            }else{
                                $style="style='border: 1px solid;border-radius:10px;margin-bottom:10px;background-color:lightblue;'";
                            }?>
                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="media" <?=$style;?> >                   
                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="media-body">
                                            <div class="comment-body">
                                                <div class="meta-info">
                                                    <div class="author inline">
                                                        <a href="#" class="bold"><?=$data['username'];?></a>
                                                    </div>
                                                    <div class="date inline pull-right">
                                                        <?php date_default_timezone_set('Asia/Jakarta');
                                                        echo date('d F Y, H:i',strtotime($data['tanggal']));?>
                                                    </div>
                                                </div>
                                                <p class="comment-text">
                                                    <?=$data['pesan'];?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                   
                </div>
            </section>
    