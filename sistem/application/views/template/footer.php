			<div class="modal" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
							<h4 class="modal-title" id="ModalHeader"></h4>
						</div>
						<div class="modal-body" id="ModalContent"></div>
						<div class="modal-footer" id="ModalFooter">
							<button type="button" class="btn btn-primary" id="SimpanPass">Ubah Password</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal" id="buatPesanInbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
							<h4 class="modal-title" id="ModalHeaderInbox"></h4>
						</div>
						<div class="modal-body" id="ModalContentInbox"></div>
						<div class="modal-footer" id="ModalFooterInbox">
							<button type="button" class="btn btn-primary" id="Simpans">Kirim Pesan</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			
			
			<footer class="main-footer">
				<strong>Copyright &copy; <?php date_default_timezone_set('Asia/Jakarta'); echo date('Y')?>	<a href="#"> HALOKERJA</a>.</strong> All rights reserved.
			</footer>
			<?php
			$this->load->library('user_agent');
			if ($this->agent->is_mobile('iphone')||($this->agent->is_mobile())){
				$wa1 = 'https://api.whatsapp.com/send?phone=6285643104015&text=Hai - Admin saya ingin bertanya ?';
			} else {
				$wa1 = 'https://api.whatsapp.com/send?phone=6285643104015&text= Hai - Admin saya ingin bertanya ?';
			}
			?>
			<?php $nis= $this->session->userdata('nis');
				if ($this->session->userdata('nis')==TRUE){ ?>
					<?php
					$t = "SELECT count(*) as jml FROM inbox WHERE status=0 AND username='admin' AND inboxid='$nis'";
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
					
			<?php if ($this->session->userdata('id_anggota')):?>
			<section id="fixed-form-container">
				<div class="button">
					Chat Admin <i class="ion-social-whatsapp-outline" aria-hidden="true"></i>
						<?php if(!empty($pesanbelumterbuka)){
					echo "<span class='badge badge-danger'>".$pesanbelumterbuka."</span>"; 
					}?> 
				</div>
				<div class="body">
					<ul class="list-group text-left">
						<a href="<?= site_url('anggota/buatpesan'); ?>" id="chatadmin">
							<li class="list-group-item" style="display:flex">
								<div style="width:15%;padding-right:10px">
									<img src="<?php echo base_url('asset/img/avatar.jpg') ?>" style="border-radius: 50%;width:100%;" alt="whatsapp"/>
								</div>
								<div>
									<span style="color:red;display:block">Kirim Pesan ke Admin <?php if(!empty($pesanbelumterbuka)){
										echo "<span class='badge badge-danger'>".$pesanbelumterbuka."</span>"; 
										}?></span>

								</div>
							</li>
						</a>
						<a href="<?= $wa1;?>">
							<li class="list-group-item" style="display:flex">
								<div style="width:15%;padding-right:10px">
									<img src="<?php echo base_url('asset/img/avatar.jpg') ?>" style="border-radius: 50%;width:100%;" alt="whatsapp"/>
								</div>
								<div>
									<span style="color:red;display:block">WhatsApp Admin</span>
								</div>
							</li>
						</a>
					</ul>
				</div>
			</section>
			<?php endif; ?>

			<?php } ?>
			<script>
		
				$(document).on('click','#chatadmin', function(e){
					e.preventDefault();

					$('.modal-dialog').removeClass('modal-sm');
					$('.modal-dialog').addClass('modal-md');
					$('#ModalHeaderInbox').html('Kirim Pesan');
					$('#ModalContentInbox').load($(this).attr('href'));
					$('#buatPesanInbox').modal('show');
				});
			$('#ModalGue').on('hide.bs.modal', function () {
			   setTimeout(function(){ 
					$('#ModalHeader, #ModalContent, #ModalFooter').html('');
			   }, 1000);
			});
			$('#chatadmin').on('hide.bs.modal', function () {
			   setTimeout(function(){ 
					$('#ModalHeaderInbox, #ModalContentInbox, #ModalFooterInbox').html('');
			   }, 5000);
			});
			
			</script>
			<script>
				$(document).ready(function(){
					echo.init({
						offset: 100,
						throttle: 250,
						unload: false
					});
				});
				$("#fixed-form-container .body").hide();
				$("#fixed-form-container .button").click(function () {
					$(this).next("#fixed-form-container div").slideToggle(400);
					$(this).toggleClass("expanded");
				});
			</script>
		</div>
	</body>