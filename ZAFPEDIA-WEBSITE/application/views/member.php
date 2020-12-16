<main id="authentication" class="inner-bottom-md">
	<div class="container">
		<div class="row">
			
			<div class="row">
					<div class="col-md-12">
						<!-- BEGIN PROFILE SIDEBAR -->
						<div class="profile-sidebar" style="width:250px;">
							<!-- PORTLET MAIN -->
							<?php foreach($customer as $data)  { ?>
							<div class="portlet light profile-sidebar-portlet">
								<!-- SIDEBAR USERPIC -->
								<div class="profile-userpic">
									<?php if(!empty($data['foto_member'])){?>
										<img alt="" class="img-responsive" src="<?php echo base_url('files/customer/'.$data['foto_member'].'');?>" style="width:80px;height:80px;"/>
									<?php }else{?>
										<img alt="" class="img-responsive" src="<?php echo base_url('files/images/no-image.jpg');?>" style="width:80px;height:80px;"/>
									<?php } ?>
								</div>
								<!-- END SIDEBAR USERPIC -->
								<!-- SIDEBAR USER TITLE -->
								<div class="profile-usertitle">
									<div class="profile-usertitle-name">
										 <?php echo $data['nama_lengkap'];?>
									</div>
									<div class="profile-usertitle-job">
										 <?php echo $data['pekerjaan'];?>
									</div>
								</div>
								<!-- END SIDEBAR USER TITLE -->
								
							</div>
							<!-- END PORTLET MAIN -->
							<!-- PORTLET MAIN -->
							<div class="portlet light">
								
								<div>
									<h4 class="profile-desc-title"> Tentang <?php echo $data['nama_lengkap'];?></h4>
									<span class="profile-desc-text"> <?php echo $data['bio'];?></span>
									<div class="margin-top-20 profile-desc-link">
										<i class="fa fa-globe"></i>
										<a href="http://<?php echo $data['website'];?>"><?php echo $data['website'];?></a>
									</div>
									<div class="margin-top-20 profile-desc-link">
										<i class="fa fa-twitter"></i>
										<a href="https://twitter.com/<?php echo $data['twitter'];?>"><?php echo $data['twitter'];?></a>
									</div>
									<div class="margin-top-20 profile-desc-link">
										<i class="fa fa-facebook"></i>
										<a href="https://facebook.com/<?php echo $data['facebook'];?>"><?php echo $data['facebook'];?></a>
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- END PORTLET MAIN -->
						</div>
						<!-- END BEGIN PROFILE SIDEBAR -->
						<!-- BEGIN PROFILE CONTENT -->
						<div class="profile-content">
							<div class="row">
								<div class="col-md-12">
									<div class="portlet light">
										<div class="portlet-title tabbable-line">
											<div class="caption caption-md">
												<i class="icon-globe theme-font hide"></i>
												<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
											</div>
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_1" data-toggle="tab">Biodata</a>
												</li>
												<li>
													<a href="#tab_1_2" data-toggle="tab">Alamat</a>
												</li>
												<li>
													<a href="#tab_1_3" data-toggle="tab">Avatar</a>
												</li>
												<li>
													<a href="#tab_1_4" data-toggle="tab">Kata Sandi</a>
												</li>
											</ul>
										</div>
										<?php foreach($customer as $data)  : ?>
										<div class="portlet-body">
											<div class="tab-content">
												<!-- PERSONAL INFO TAB -->
												<?php if($this->session->flashdata('SUCCESSMSG')) { ?>
												<div role="alert" class="alert alert-success">
														<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
														<strong>Sukses!</strong>
														<?=$this->session->flashdata('SUCCESSMSG')?>
												</div>
												<?php } ?>
												<div class="tab-pane active" id="tab_1_1">
													<?php echo form_open('account/personal');?>
														<div class="form-group">
															<label class="control-label">Nama pengguna</label>
															<input type="text" placeholder="" id="username" name="username" value="<?=$data['username'];?>" readonly class="form-control"/>
															<div style="margin-top: 0px; color: red;"><?= form_error('username'); ?></div>
															<span class="help-block"> Username Tidak Dapat Diganti </span>
														</div>
														<div class="form-group">
															<label class="control-label">Nama Lengkap</label>
															<input type="text" placeholder="" id="fullname" name="fullname" value="<?=$data['nama_lengkap'];?>" class="form-control"/>
															<div style="margin-top: 0px; color: red;"><?= form_error('nama_lengkap'); ?></div>
														</div>
														<div class="form-group">
															<label class="control-label">Nomor HP</label>
															<input type="text" id="telepon" maxlength="13" name="phone" value="<?=$data['telepon'];?>" class="form-control"/>
															<div style="margin-top: 0px; color: red;"><?= form_error('telepon'); ?></div>
														</div>
														<div class="form-group">
															<label class="control-label">Jenis Kelamin</label>
															<?php 
															$atributes="class='form-control'";
															$pilih_status=$this->input->post('gender')? $this->input->post('gender'):$data['jenis_kelamin'];
															echo form_dropdown('gender',$dd_gender,$pilih_status,$atributes);
															?>
															<span class="help-block">
															Select your gender. </span>
														</div>
														<div class="form-group">
															<label class="control-label">Hobi</label>
															<input type="text" placeholder="Design, Web etc." id="hobi" name="hobi" value="<?=$data['hobi'];?>" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Pekerjaan</label>
															<input type="text" placeholder="Web Developer" id="pekerjaan" name="pekerjaan" value="<?=$data['pekerjaan'];?>" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Nama Perusahaan</label>
															<input type="text" placeholder="Perusahaan" id="perusahaan" name="perusahaan" value="<?=$data['perusahaan'];?>" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Bio</label>
															<textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!" id="bio" name="bio"><?=$data['bio'];?></textarea>
														</div>
														<div class="form-group">
															<label class="control-label">Username Facebook</label>
															<input type="text" placeholder="example: BangIpin15" id="facebook" name="facebook"  value="<?=$data['facebook'];?>" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Username Twitter</label>
															<input type="text" placeholder="example: BangIpin15" id="twiiter" name="twitter"  value="<?=$data['twitter'];?>" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Website Url</label>
															<input type="text" placeholder="http://www.mywebsite.com" id="website" name="website"  value="<?=$data['website'];?>" class="form-control"/>
														</div>
														<div class="margiv-top-10">
															<input type="submit" name="submit" id="submit1" class="btn green-haze" value="Save Changes" />
															<a href="<?=site_url('member/account/profile/'.$this->session->userdata('username').'');?>" class="btn default"> Cancel </a>
														</div>
													<?php echo form_close();?>
												</div>
												<!-- END PERSONAL INFO TAB -->
												<!-- BEGIN ADDRESS INFO TAB -->
												<div class="tab-pane" id="tab_1_2">
													<?php echo form_open('account/alamat');?>
														<hr/>
														<input type="hidden" id="idalamat" name="idalamat" value="<?php echo $this->session->userdata('username');?>" class="form-control"/>
														<div class="form-group">
															<label class="control-label">Negara</label>
															<input type="text" class="form-control" id="negara"  name="negara" value="<?=$data['negara'];?>" />
															<span class="help-block">
															Input Negara Anda </span>
														</div>
														<div class="form-group">
															<label class="control-label">Provinsi</label>
															<?php 
																$attribute='class="table-group-action-input form-control" id="destination"';
																$selected= $this->input->post('province')?$this->input->post('province'):$data['provinsi'];
																echo form_dropdown('province',$dd_province,$selected,$attribute);
															?>
															<div style="margin-top: 0px; color: red;"><?= form_error('province'); ?></div>
														
														</div>
														<div class="form-group">
															<label>Kab/Kota</label>
															<?php 
																$attribute='class="table-group-action-input form-control " id="kabupatenkota"';
																$selected= $this->input->post('kotakab')?$this->input->post('kotakab'):$data['kota'];
																echo form_dropdown('kotakab',$dd_kotakab,$selected,$attribute);
																?>
															<div style="margin-top: 0px; color: red;"><?= form_error('kotakab'); ?></div>
														
														</div>
														<div class="form-group">
															<label class="control-label">Alamat 1</label>
															<textarea id="alamat1" name="alamat1" class="form-control" row="6"><?=$data['alamat1'];?></textarea>
															<div style="margin-top: 0px; color: red;"><?= form_error('alamat1'); ?></div>
														</div>
														<div class="form-group">
															<label class="control-label">Alamat 2</label>
															<textarea id="alamat2" name="alamat2" class="form-control" row="6"><?=$data['alamat2'];?></textarea>
														</div>
														
														<div class="form-group">
															<label class="control-label">Kode Pos</label>
															<input type="text" placeholder="55184,55183 etc" id="kodepos" name="kodepos"  value="<?=$data['kode_pos'];?>" class="form-control" />
															<span class="help-block">
															Masukkan Kode Pos. </span>
														</div>
														<div class="margiv-top-10">
															<input type="submit" name="submit" id="submit2" class="btn green-haze" value="Save Changes" />
															<a href="<?=site_url('member/account/profile/'.$this->session->userdata('username').'');?>" class="btn default"> Cancel </a>
														</div>
													<?php echo form_close();?>
												</div>
												<!-- END ADDRESS INFO TAB -->
												<!-- CHANGE AVATAR TAB -->
												<div class="tab-pane" id="tab_1_3">
													<?php echo form_open_multipart('account/avatar');?>
														<input type="hidden" id="idavatar" name="idavatar" value="<?php echo $this->session->userdata('username');?>" class="form-control"/>
														<div class="form-group">
															<div class="fileinput fileinput-new" data-provides="fileinput">
																<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																	<?php if(empty($data['foto_member'])){ ?>
																		<img src="<?php echo base_url('files/images/no-image.jpg');?>" alt=""/>
																	<?php }else{ ?>
																		<img src="<?php echo base_url('files/customer/'.$data['foto_member'].'');?>" alt=""/>
																	<?php } ?>
																</div>
																<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
																<div>
																	<span class="btn default btn-file">
																	<span class="fileinput-new"> Select image </span>
																	<span class="fileinput-exists"> Change </span>
																	<input type="file" name="avatar"/></span>
																	<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
																	<input type="hidden"  class="form-control" name="imglama" value="<?php echo $data['foto_member'];?>" >
																</div>
															</div>
															<div class="clearfix margin-top-10">
																<span class="label label-danger">NOTE! </span>
																<span class="help-block">Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
															</div>
														</div>
														<?php echo $this->session->flashdata('error'); ?>
														<div class="margin-top-10">
															<input type="submit" name="submit" class="btn green-haze" value="Submit" />
															<a href="<?=site_url('member/account/profile/'.$this->session->userdata('username').'');?>" class="btn default"> Cancel </a>
														</div>
													<?php echo form_close();?>
												</div>
												<!-- END CHANGE AVATAR TAB -->
												<!-- CHANGE PASSWORD TAB -->
												<div class="tab-pane" id="tab_1_4">
													<div class="inputpass">
													<?php echo form_open('account/password',array('id'=>"formpass"));?>
														<input type="hidden" id="idpassword" name="idpassword" value="<?php echo $this->session->userdata('username');?>" class="form-control"/>
														<div class="form-group">
															<label class="control-label">Current Password</label>
															<input type="password" name="berlaku" id="berlaku" class="form-control"/>
															<span id="msgberlaku"></span>  
														</div>
														<div class="form-group">
															<label class="control-label">New Password</label>
															<input type="password" name="baru" id="baru" class="form-control"/>
															<span class="label"></span>
														</div>
														<div class="form-group">
															<label class="control-label">Re-type New Password</label>
															<input type="password" name="ulang" id="ulang" class="form-control"/>
															<span class="label"></span>
														</div>
														<div class="margin-top-10">
															<input type="submit" id="simpan" name="submit" class="btn green-haze" value="Change Password" />
															<a href="<?=site_url('member/account/profile/'.$this->session->userdata('username').'');?>" class="btn default"> Cancel </a>
														</div>
													<?php echo form_close();?>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		
		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- /.authentication -->