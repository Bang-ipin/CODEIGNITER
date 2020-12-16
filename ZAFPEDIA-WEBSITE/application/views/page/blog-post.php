			<?php
				$baca=$detail['hits']; 
				$this->db->query("UPDATE blog SET hits=$baca+1 WHERE judul_seo='$detail[judul_seo]'");
			?>
            <section id="blog-single">
                <div class="container">
                    <!-- ========================================= CONTENT ========================================= -->
                    <div class="posts col-md-9">
                        <div class="post-entry">
                            <div class="clearfix">
                                <!-- ========================================== SECTION – HERO ========================================= -->
                                <div id="hero">
                                    <div id="owl-main" class="owl-carousel owl-carousel-blog owl-inner-nav owl-ui-sm">

                                        <div class="item">
                                            <img src="<?=base_url('files/media/'.$detail['gambar'].'')?>" alt="<?=strip_tags($detail['judul_blog']);?>">
                                        </div><!-- /.item -->

                                    </div><!-- /.owl-carousel -->
                                </div>
                                <!-- ========================================= SECTION – HERO : END ========================================= -->
                            </div><!-- /.clearfix -->

                            <div class="post-content">
                                <h2 class="post-title"><?=$detail['judul_blog'];?></h2>
                                <ul class="meta">
									<?php 
										$t = "SELECT count(*) as jml FROM komentar WHERE blogid='$detail[id]' AND disetujui=1";
										$d = $this->db->query($t);
										$r = $d->num_rows();
										if($r > 0){
											foreach($d->result() as $h){
												$komentarid = $h->jml;
											}
										}else{
												$komentarid = 0;
										}
										?>
                                    <li>Dibuat Oleh : <?=$detail['posting'];?></li>
                                    <li><?php date_default_timezone_set('Asia/Jakarta'); echo converttgl($detail['tgl_posting']);?></li>
                                    <li><a href="#">Kategori</a>, <a href="#"><?=$detail['kategori'];?></a></li>
                                    <li><a href="#"><?=$komentarid;?> Komentar</a></li>
                                </ul><!-- /.meta -->
                                <p><?=$detail['isi'];?></p>
								<div class="row">
									<h3>Share:</h3>
									<div id="sharePopup" class="share"></div>
								</div>
							</div>
                        </div>

                        <section id="comments" class="inner-bottom-xs">
                            <h3><?php echo $jumlahkomentar;?> Comments</h3>
							<?php foreach ($komentar as $data){ ?>
							<div class="comment-item">
								<div class="row no-margin">
									<div class="media">                    
										<div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
											<div class="avatar">
												<?php
													$gravatar = 'http://www.gravatar.com/avatar/'. md5($data['email']).'?s=32';
													echo "<img src='". $gravatar ."' alt='' class='img-circle media-object'/>";
												?>
											</div>
										</div>
										<div class="col-xs-12 col-lg-11 col-sm-10 no-margin-right">
											<div class="media-body">
												<div class="comment-body">
													<div class="meta-info">
														<header class="row no-margin">
															<div class="pull-left">
																<h4 class="author"><a href="#"><?=$data['username'];?></a></h4>
																<span class="date"><?php 
																	date_default_timezone_set('Asia/Jakarta');
																	echo date('d F Y, H:i',strtotime($data['tanggal']));?> WIB
																</span>
															</div>
															<div class="pull-right">
																<a class="comment-reply" href="javascript:;" data-target="#komenkomen" data-toggle="modal" onclick="return balaskomentar('<?=$data['id'];?>');">Reply</a>
															</div>
														</header>
													</div>
													<p class="comment-content"><?=$data['review'];?></p>
												</div>
												<?php
												$sql="SELECT * FROM komentar WHERE komentar_id='$data[id]' AND disetujui=1 ORDER BY id ASC";
												$query=$this->db->query($sql);
												if($query->num_rows() > 0)
												{ 
													foreach ($query->result_array() as $row){ ?>
														<div class="media">
															<div class="col-lg-1 col-xs-12 col-sm-2 m-t-10">
																<div class="avatar">
																	<?php 
																	$iduser = $row['email'];
																	$gravatar = 'http://www.gravatar.com/avatar/' . md5($iduser).'?s=32';
																	echo "<img src='". $gravatar ."' alt='' class='img-circle media-object'/>";
																	?>
																 </div><!-- /.avatar -->
															</div><!-- /.col -->
															<div class="col-xs-12 col-lg-11 col-sm-10 m-t-10">
																<div class="media-body">
																	<div class="comment-body">
																		<div class="meta-info">
																			<header class="row no-margin">
																				<div class="pull-left">
																					<h4 class="author">
																						<a href="#"><?=$row['username'];?></a>
																					</h4>
																					 <span class="date"><?php 
																						date_default_timezone_set('Asia/Jakarta');
																						echo date('d F Y, H:i',strtotime($row['tanggal']));?> WIB
																					</span>
																				</div>
																			</header>
																		</div>
																		<p class="comment-content"><?=$row['review'];?></p>
																	</div>
																</div>
															</div>
														</div>
													<?php } ?>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
                        </section>
						<?php if ($this->session->userdata('customer_id')){?>
							<div id="komenkomen" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display:none;">
								<?=form_open('',array('role'=>"form",'id'=>"replyformkomentarblog"));?>
									<div class="modal-body">
										<div class="komentar-form-group input-reply-komentar" >
											<div class="controls controls-cc">
												<input type="hidden" class="form-control" name="replyblogid" id="replyblogid" value="<?=$detail['id'];?>" readonly required>
												<input type="hidden" class="form-control" name="replycommentid" id="replycommentid"  readonly required>
												<textarea name="replykomentar" id="replykomentar" class="form-control" rows="4" required></textarea> 
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-outline dark">Batal</button>
										<button type="submit" class="btn green">Send</button>
									</div>
								<?=form_close();?>
							</div>
						<?php } ?>

                        <section id="reply-block" class="leave-reply">
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
                            <h3>Leave a Reply</h3>
                            <p>Your email address cannot be published. Required fields are marked <abbr class="required">*</abbr> </p>

                            <?=form_open('',array('role'=>"form",'class'=>'reply-form cf-style-1','id'=>"formkomentarblog"));?>
                                <?php if (empty($this->session->userdata('customer_id'))){ ?>
								<div class="row field-row">
                                    <div class="col-xs-12 col-sm-6">
                                        <label>full name*</label>
                                        <input type="hidden" class="form-control le-input" name="blogid" id="blogid" value="<?=$detail['id'];?>" readonly required>
										<input class="form-control le-input" name="nama" id="nama" type="text" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <label>email*</label>
                                        <input class="form-control le-input" name="email" id="email" type="text" required>
                                    </div>
                                </div>
                                <div class="row field-row">
                                    <div class="col-xs-12">
                                        <label>Message</label>
                                        <textarea rows="10" id="message" name="message" data-error-container="#error-message" required class="form-control le-input"></textarea>
										<div id="error-message"></div>
									</div>
                                </div>
								<?php }else{ ?>
								<div class="row field-row">
                                    <div class="col-xs-12">
                                        <label>company name</label>
                                        <input type="hidden" class="form-control le-input" name="blogid" id="blogid" value="<?=$detail['id'];?>" readonly required></td>
										<textarea rows="10" id="messageid" name="messageid" data-error-container="#error-message" class="form-control le-input" required></textarea>
										<div id="error-message"></div>
									</div>
                                </div>
								<?php } ?>
                                <button class="le-button big post-comment-button" type="button" id="simpankomentarblog">Post comment</button>
                           <?=form_close();?>

                        </section>
                    </div><!-- /.posts -->

                    <!-- ========================================= CONTENT :END ========================================= -->

                    <!-- ========================================= SIDEBAR ========================================= -->
                    <div class="col-md-3">
                            <aside class="sidebar blog-sidebar">
                                <div class="widget clearfix">
                                    <div class="body">
                                        <form action="<?=site_url('cari');?>" method="post" role="search" class="search-form">
                                            <div class="form-group">
                                                <label class="sr-only" for="page-search">Type your search here</label>
                                                <input id="page-search" class="search-input form-control" type="search" name="keyblog" placeholder="Enter Keywords...">
                                            </div>
                                            <button class="page-search-button">
                                                <span class="fa fa-search">
                                                    <span class="sr-only">Search</span>
                                                </span>
                                            </button><!-- /.page-search-button-->
                                        </form><!-- /.search-form -->
                                    </div>
                                </div><!-- /.widget -->

                                <div class="widget">
                                    <h4>Categories</h4>
                                    <div class="body">
										<?php 
										$kat=$this->db->query("SELECT * FROM kategori ORDER BY id ASC");
										if($kat->num_rows() > 0){ ?>
                                        <ul class="le-links">
										<?php 
											foreach ($kat->result_array() as $rows):
											$ktgr=$rows['kategori_seo'];
											$count= $this->db->query("SELECT * FROM blog WHERE kategori='$ktgr'")->num_rows();
                                            echo "<li><a href=".site_url('blog/'.$rows['kategori_seo']).">".$rows['kategori']." <span class='badge badge-info'>".$count."</span></a></li>";
											endforeach;
											?>
                                        </ul>
										<?php } ?>
                                    </div>
                                </div><!-- /.widget -->

                                <div class="widget">
                                    <div class="simple-banner">
                                        <a href="#"><img alt="" class="img-responsive" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/banners/banner-simple.jpg');?>" /></a>
                                    </div>
                                </div>

                                <!-- ========================================= RECENT POST ========================================= -->
                                <div class="widget">
                                    <h4>Recent Posts</h4>
                                    <div class="body">
									<?php 
									$new=$this->db->query("SELECT * FROM blog ORDER BY id DESC limit 5");
									if($new->num_rows() > 0){ ?>
										<ul class="recent-post-list">
                                            <?php foreach ($new->result_array() as $data): ?>
											<li class="sidebar-recent-post-item">
                                                <div class="media">
                                                    <a href="#" class="thumb-holder pull-left">
                                                        <img alt="<?=$data['judul_blog'];?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('files/thumbnail/'.$data['gambar'].'');?>" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h5><a href="<?=site_url('blog/'.$data['kategori'].'/'.$data['judul_seo'].'')?>"><?=$data['judul_blog'];?></a></h5>
                                                        <div class="posted-date"><?=converttgl($data['tgl_posting']);?></div>
                                                    </div>
                                                </div>
                                            </li><!-- /.sidebar-recent-post-item -->
											<?php endforeach;?>
                                        </ul><!-- /.recent-post-list -->
										<?php } ?>
                                    </div><!-- /.body -->
                                </div><!-- /.widget -->
                                <!-- ========================================= RECENT POST : END ========================================= -->

                                <div class="widget">
                                    <h4>Popular Tags</h4>
                                    <div class="body">
                                        <div class="tagcloud">
											<ul>
												<?php 
													$tag=$this->db->query("SELECT * FROM tags ORDER BY id DESC limit 15");
													if($tag->num_rows() > 0){ 
														foreach ($tag->result_array() as $data):
															echo "<li><a href='".site_url('tag/'.$data['tag_seo'])."'><i class='fa fa-tags'></i>".$data['tag']."</a></li>";
														endforeach;
													}
												?>
											</ul>
                                        </div><!-- /.tagcloud -->
                                    </div><!-- /.body -->
                                </div><!-- /.widget -->
                            </aside><!-- /.sidebar .blog-sidebar -->
                        </div>
                    <!-- ========================================= SIDEBAR : END ========================================= -->

                    <!-- ========================================= CONTENT ========================================= -->
                </div>
            </section>

         