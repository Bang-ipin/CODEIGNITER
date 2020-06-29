<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="<?php base_url()?>" class="logo">
				<span class="logo-mini"><b>G</b>F</span>
				<span class="logo-lg"><b>Go-</b>freshener</span>
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
								<li><a href="<?php echo site_url('change_password/ubah_password'); ?>" id="GantiPass"><i class="fa fa-lock fa-fw"></i>Ubah Password</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="<?= base_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Log Out</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="modal" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
						<h4 class="modal-title" id="ModalHeader"></h4>
					</div>
					<div class="modal-body" id="ModalContent"></div>
					<div class="modal-footer" id="ModalFooter"></div>
				</div>
			</div>
		</div>
		<script>
			$(document).on('click', '#GantiPass', function(e){
				e.preventDefault();

				$('.modal-dialog').removeClass('modal-lg');
				$('.modal-dialog').addClass('modal-sm');
				$('#ModalHeader').html('Ubah Password');
				$('#ModalContent').load($(this).attr('href'));
				$('#PasswordModal').modal('show');
			});
			$('#PasswordModal').on('hide.bs.modal', function () {
			   setTimeout(function(){ 
					$('#ModalHeader, #ModalContent, #ModalFooter').html('');
			   }, 500);
			});
		</script>