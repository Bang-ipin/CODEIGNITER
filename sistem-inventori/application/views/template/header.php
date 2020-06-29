	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<a href="<?php base_url()?>" class="logo">
					<span class="logo-mini"><b><?= $this->session->userdata('first')?></b><?= $this->session->userdata('last')?></span>
					<span class="logo-lg"><b><?= $this->session->userdata('name') ?></b></span>
				</a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-user fa-fw'>
									</i> <?php echo $this->session->userdata('nama_pengguna'); ?> <span class="caret"></span></a>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?= base_url('change_password'); ?>"><i class="fa fa-lock fa-fw"></i>Ubah Password</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="<?= base_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Log Out</a></li>
								</ul>
							</li>
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