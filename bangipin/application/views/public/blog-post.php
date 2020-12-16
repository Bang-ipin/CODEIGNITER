			<?php
				$baca=$detail['hits']; 
				$this->db->query("UPDATE blog SET hits=$baca+1 WHERE judul_seo='$detail[judul_seo]'");
			?>
			 
			<div class="fables-light-background-color">
				<div class="container"> 
					<nav aria-label="breadcrumb">
						<ol class="fables-breadcrumb breadcrumb px-0 py-3">
							<li class="breadcrumb-item"><a href="<?=site_url();?>" class="fables-second-text-color">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?=$titleblog;?></li>
						</ol>
					</nav> 
				</div>
			</div>
			<div class="container">
				<div class="row my-4 my-lg-5">
					<div class="col-12 col-lg-8">   
						<div class="image">
						    <img class="lazy" data-src="<?=base_url('files/media/'.$detail['gambar'].'')?>" alt="<?=strip_tags($detail['judul_blog']);?>" class="img-fluid" layout="responsive"></img> 
						</div>
						<h2 class="font-23 semi-font my-3"><a href="#" class="fables-main-text-color fables-second-hover-color"><?=$detail['judul_blog'];?></a></h2>
						<div class="fables-forth-text-color fables-blog-date">                                  
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
							<div class="row">
								<div class="col-12 col-sm-10 pt-2">
									<span class="fa fa-calendar fables-second-text-color mr-1"></span> 
									<span class="mr-3"> <?php date_default_timezone_set('Asia/Jakarta'); echo converttgl($detail['tgl_posting']);?></span>
									<span class="fa fa-comment fables-second-text-color mr-1"></span> 
									<a href="" class="fables-forth-text-color fables-second-hover-color position-relative z-index"><?=$komentarid;?> Komentar</a> 
									<span class="fables-forth-text-color fables-single-tags ml-4">
										<span class="fa fa-tag fables-second-text-color"></span> 
										<a href="#"><?=$detail['kategori'];?></a> 
									</span> 
								</div> 
							</div>
						</div>
						<div class="postingan">
						    <p class="fables-forth-text-color fables-single-blog font-14 my-3">
						        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                     style="display:block; text-align:center;"
                                     data-ad-layout="in-article"
                                     data-ad-format="fluid"
                                     data-ad-client="ca-pub-2393340186290964"
                                     data-ad-slot="6822430397"></ins>
                                <script>
                                     (adsbygoogle = window.adsbygoogle || []).push({});
                                </script><?=$detail['isi'];?>
                                
                            </p>
						</div>
						
						<div class="fabales-single-share">
							<div class="row mt-3 mb-4">
								<div class="col-12 col-sm-2">
									<span class="fables-forth-text-color underline  mt-2 font-18 d-inline-block">Share</span>
								</div>
								<div class="col-12 px-3 px-sm-3">                                          
									<div id="sharePopup" class="share"></div>
								</div>
								<div class="col-12 col-sm-12 mt-3 mt-sm-0 text-center">
									<button class="btn btn-link fables-forth-border-color fables-forth-hover-backround-color fables-forth-text-color text-center font-14 float-none float-sm-right py-2 px-4" onclick="window.print();"><span class="fa fa-print"></span> Print Article</button>
								</div>
							</div>						   
						</div>  
						<hr>
						<div class="fables-single-blog-pag">
							<a href="" class="fables-forth-text-color fables-second-hover-color">
								<span class="fa fa-arrow-left"></span> 
								<span class="underline">Back</span>
							</a>
							<a href="" class="fables-forth-text-color fables-second-hover-color float-right">   
								<span class="underline">Next</span>
								<span class="fa fa-arrow-right"></span>
							</a>
						</div>
						<hr>
						<div class="row">
							<div class="col-2">
								<img data-src="<?=base_url('assets/public/img/avatar.jpg');?>" alt="" class="img-fluid lazy" layout="responsive"></img>
							</div>
							<div class="col-10">
								<p>
									<span class="fables-fifth-text-color font-14">Posted By</span>
									<a href="" class="fables-second-text-color fables-second-hover-color font-15 bold-font ml-1"><?=$detail['posting'];?></a>
								</p>
								<p class="font-14 my-2 fables-main-text-color">
									<?=$deskripsi_web;?>  
								</p>
							</div>
						</div>

						<div class="fables-comments">
							<h2 class="fables-main-text-color fables-light-background-color my-3 my-lg-4 font-15 bold-font py-3 px-4"><?php echo $jumlahkomentar;?>  Comments</h2>
							<?php foreach ($komentar as $data){ ?>
							<div class="comment-item">
								<div class="row no-margin">
									<div class="media">                    
										<div class="col-xs-12 col-lg-11 col-sm-10 no-margin-right">
											<div class="media-body">
												<div class="comment-body">
													<div class="meta-info">
														<header class="row no-margin">
															<div class="pull-left">
																<h5 class="author"><a href="#"><?=$data['username'];?></a></h5>
																<span class="date"><?php 
																	date_default_timezone_set('Asia/Jakarta');
																	echo date('d F Y',strtotime($data['tanggal']));?> WIB
																</span>
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
															<div class="col-xs-12 col-lg-11 col-sm-10 m-t-10">
																<div class="media-body">
																	<div class="comment-body">
																		<div class="meta-info">
																			<header class="row no-margin">
																				<div class="pull-left">
																					<h5 class="author">
																						<a href="#"><?=$row['username'];?></a>
																					</h5>
																					 <span class="date"><?php 
																						date_default_timezone_set('Asia/Jakarta');
																						echo date('d F Y',strtotime($row['tanggal']));?> WIB
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
						</div>
						
						<div class="fables-blog-form">
							<h2 class="fables-main-text-color fables-light-background-color my-3 my-lg-4 font-15 bold-font py-3 px-4">Leave a comment ...</h2>
							<?=form_open('',array('role'=>"form",'class'=>'fables-contact-form mb-0','id'=>"formkomentarblog"));?>
								<div class="form-row">
									<div class="form-group col-md-6">
										 <input type="hidden" class="form-control le-input" name="blogid" id="blogid" value="<?=$detail['id'];?>" readonly required>
										 <input type="text" name="nama" id="nama" class="form-control form-control rounded-0 p-3"  placeholder="Name" required>   
									</div>
									<div class="form-group col-md-6">
										<input type="email" name="email" id="email" class="form-control form-control rounded-0 p-3" placeholder="Email" required> 
									</div>
								</div>                            
								<div class="form-row"> 
									<div class="form-group col-md-12">
										<textarea class="form-control form-control rounded-0 p-3" id="message" name="message" data-error-container="#error-message" required  placeholder="Comment" rows="4"></textarea>
										<div id="error-message"></div>
									</div> 
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<button type="submit" id="simpankomentarblog" class="btn fables-second-background-color rounded-0 text-white font-15 px-4 py-2">Post Comment</button>
									</div>
								</div>
							<?=form_close();?>
						</div>
					</div>
					<div class="col-12 col-lg-4">
						
						<div class="mt-4">
							<h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Kategori</h2>
							<?php 
							$kat=$this->db->query("SELECT * FROM kategori ORDER BY id ASC");
							if($kat->num_rows() > 0){ ?>
							<ul class="nav fables-blog-cat-list fables-forth-text-color fables-second-hover-color-link">
								<?php 
								foreach ($kat->result_array() as $rows):
								echo "<li><a href=".site_url('blog/'.$rows['kategori_seo']).">".$rows['kategori']."</a></li>";
								endforeach;
								?>
							</ul>
							<?php } ?>
							<hr>
						</div>
						<div class="mt-4">
							<h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Artikel Terbaru</h2> 
							<div class="row">
								<?php 
								$new=$this->db->query("SELECT * FROM blog WHERE status='1' ORDER BY id DESC limit 5");
								if($new->num_rows() > 0){ ?>
								 <?php foreach ($new->result_array() as $data): ?>
								<div class="col-12 col-md-6 col-lg-12">
									<div class="row mb-4">
										<div class="col-4">
											<a href="<?=site_url('blog/'.$data['kategori'].'/'.$data['judul_seo'].'')?>"><img data-src="<?=base_url('files/thumbnail/'.$data['gambar'].'');?>" alt="<?=$data['judul_blog'];?>" class="img-fluid w-100 lazy" layout="responsive"></img></a>
										</div>
										<div class="col-8 pl-0">
											<a href="<?=site_url('blog/'.$data['kategori'].'/'.$data['judul_seo'].'')?>" class="fables-main-text-color bold-font fables-second-hover-color"><?=$data['judul_blog'];?></a>
											<p class="fables-forth-text-color fables-blog-date-cat font-14 mt-1"><span class="fa fa-calendar fables-second-text-color mr-1"></span> <?=converttgl($data['tgl_posting']);?></p>
										</div>
									</div>
								</div>  
							   <?php endforeach;?>
							   <?php } ?>
						   </div>
						   <div class="text-right">
							   <a href="<?=site_url('semua-artikel');?>" class="btn fables-second-text-color underline fables-main-text-color font-14"> More</a>
						   </div>
						   <hr>
						</div>
						<div class="mt-4">
							<h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Topik</h2>
							<ul class="nav fables-blog-cat-list fables-forth-text-color fables-second-hover-color-link fables-blog-cat-tags">
								<?php 
									$tag=$this->db->query("SELECT * FROM tags ORDER BY id DESC");
									if($tag->num_rows() > 0){ 
										foreach ($tag->result_array() as $data):
											echo "<li><a href='".site_url('tag/'.$data['tag_seo'])."'>".$data['tag']."</a></li>";
										endforeach;
									}
								?>
							</ul> 
						</div>
					</div>
				</div>           
			</div> 