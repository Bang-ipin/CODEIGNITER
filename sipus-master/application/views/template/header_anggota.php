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
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-user fa-fw'>
									</i> <?php echo $this->session->userdata('nama_pengguna'); ?> <span class="caret"></span></a>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?= site_url('change_password/ganti_pass'); ?>" id="GantiPass"><i class="fa fa-lock fa-fw"></i>Ubah Password</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Log Out</a></li>
								</ul>
							</li>
							<?php } else{ ?>
								<li><a href="<?= site_url('masuk'); ?>"><i class="fa fa-sign-out fa-fw"></i> Masuk</a></li>
							<?php }?>
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