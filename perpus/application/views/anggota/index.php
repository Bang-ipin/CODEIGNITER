		<link href="<?=config_item('asset');?>/loginanggota.css" rel="stylesheet" />
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					<?=$title;?>
				</h1>
			</section>
			<section class="content content-ang">
				<div class="login-wrapper fadeInDown animated">
					<?=form_open('welcome/simpanpengunjung',array('class'=>"lobi-form login-form visible",'id'=>"formanggota"))?>
						<div class="login-header">
							Selamat Datang Pengunjung Perpustakaan SMK Piri Sleman
						</div>
						<?php if($this->session->flashdata('message')) { ?>
							<div role="alert" class="alert alert-success">
								<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
								<?=$this->session->flashdata('message')?>
							</div>
						<?php } ?> 
						<div class="login-body no-padding">
							<fieldset>
								<div class="form-group m-b-65">
									<label>ID Anggota / NIS</label>
									<label class="input">
										<input type="text" name="nis" id="nis" placeholder="Scan Kartu Anggota" autofocus="true" required>
										<span class="tooltip tooltip-top-left"><i class="fa fa-user text-cyan-dark"></i> Silakan Masukkan Id Anggota</span>
									</label>
								</div>
							</fieldset>
						</div>
					<?php echo form_close()?>
				</div>
			</section>
		</div>
		<script type="text/javascript">
		$("#nis").keyup(function(e){
			var isi = $(e.target).val();
			$(e.target).val(isi.toUpperCase());
		});
		$(document).ready( function() {
			var form = $('#formanggota');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, 
				errorElement: 'span', 
				errorClass: 'help-block help-block-error', 
				focusInvalid: false, 
				rules:{
					nis: {
						required: true,
						remote:{
							url:"<?=site_url('welcome/cek_kodenis');?>",
							type:"POST",
							dataType:"json",
							data:{
								nis:function(){
									return $("#nis").val();
								}
							},
							response:function(data){
								 /* if(data.responseText =='false'){
									 messages:{
										nis:{
											remote:jQuery.validator.format("{0} tidak tersedia")
										}
									} 
								}  */
							}
						}
					}
				},
				
				messages:{
					nis: {
						required: 'Kode NIS harus diisi',
						remote:jQuery.validator.format("{0} tidak tersedia, Masukkan Kode NIS Yang Benar")
					}
				},
					
				invalidHandler: function (event, validator) {    
					success.hide();
					error.show();
				},

				highlight: function (element) { 
					$(element)
						.closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
				},

				unhighlight: function (element) { 
					$(element)
						.closest('.form-group').removeClass('has-error'); 
				},
				
				success: function (label) {
					label
						.addClass('valid') 
						.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
				},
				submitHandler: function (form) {
					success.show();
					error.hide();
					form.submit();
				}, 
			})
		});
	</script>