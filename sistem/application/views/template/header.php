	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw">
									</i> <?php echo $this->session->userdata('nama_pengguna'); ?> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<?php if ($this->session->userdata('usergroup') ==2 ){ ?>
										<li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Log Out</a></li>
									<?php }else{?>
										<li><a href="<?= site_url('change_password'); ?>" id="GantiPass"><i class="fa fa-lock fa-fw"></i>Ubah Password</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Log Out</a></li>
									<?php } ?>
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