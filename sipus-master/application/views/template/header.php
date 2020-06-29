	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="hider">
						<img src="<?=base_url('asset/image/header.png');?>"  style="width:1024px;height:100px;" alt="Logo"/>
					</div>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<?php if ($this->session->userdata('logged_in')==TRUE){ ?>
							<?php if ($this->session->userdata('usergroup')=='Admin'){ ?>
								<?php
								$t = "SELECT count(*) as jml FROM inbox WHERE status=0 AND username !='admin'";
								$d = $this->db->query($t);
								$r = $d->num_rows();
								if($r > 0){
									foreach($d->result() as $h){
										$pesanbelumterbuka = $h->jml;
									}
								}else{
									$pesanbelumterbuka = 0;
								}
							?>
							<li>
								
								<a href="<?=site_url('admin/inbox');?>" title="Inbox"> Inbox
								<?php if (!empty($pesanbelumterbuka)){
									echo "<i class='fa fa-1x fa fa-inbox'></i>";
								}else{
									echo "<i class='fa fa-envelope'></i>";
								}
								?>
								<?php if(!empty($pesanbelumterbuka)){
								echo "<span class='badge badge-danger'>".$pesanbelumterbuka."</span>"; 
								}?>
							</a>
							</li>
							<?php } ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw">
									</i> <?php echo $this->session->userdata('nama_pengguna'); ?> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?= site_url('change_password'); ?>" id="GantiPass"><i class="fa fa-lock fa-fw"></i>Ubah Password</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Log Out</a></li>
								</ul>
							</li>
							<?php } ?>
						</ul>
					</div>
				</nav>
			</header>
			<script>
				$(document).on('click','#GantiPass', function(e){
					e.preventDefault();

					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html('Ubah Password');
					$('#ModalContent').load($(this).attr('href'));
					$('#ModalGue').modal('show');
				});
			</script>