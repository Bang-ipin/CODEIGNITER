<!DOCTYPE html>
<!--Author     : @arboshiki-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Daftar Antrian</title>
        <link rel="shortcut icon" href="img/logo/lobiadmin-logo-16.ico" />

        <link rel="stylesheet" href="<?=base_url();?>asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>asset/css/datepicker.css">
        <link rel="stylesheet" href="<?=base_url();?>asset/css/font-awesome.min.css" >
        <link rel="stylesheet" href="<?=base_url();?>asset/css/login.css"/>
		<link rel="stylesheet" href="<?=base_url();?>asset/css/web_css.css">
		<style type="text/css">

		button {margin: 0; padding: 0;}

		button {margin: 2px; position: relative; padding: 4px 4px 4px 2px; 

		cursor: pointer; float: left;  list-style: none;}

		button span.ui-icon {float: left; margin: 0 4px;}

		</style>
    </head>
    <body>
			<div class="login-wrapper fadeInDown animated">
				<form action="<?=site_url('antrian/reg');?>" method="post" id="formantrian" class="lobi-form login-form visible">
					<div class="login-header">
					   ANTRIAN :: PASIEN 
					</div>
					<?php if($this->session->flashdata('SUCCESSMSG')) { ?>
						<div role="alert" class="alert alert-success">
							<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
							<?=$this->session->flashdata('SUCCESSMSG')?>
						</div>
					<?php } ?> 
					<div class="login-body no-padding">
						<fieldset>
							<div class="form-group">
								<label>Kode Barcode / Registrasi</label>
								<label class="input">
									<span class="input-icon input-icon-prepend fa fa-user"></span>
									<input type="text" name="kode_barcode" id="kode_barcode" placeholder="Kode Barcode" required>
									<span class="tooltip tooltip-top-left"><i class="fa fa-user text-cyan-dark"></i> Masukkan Kode Barcode</span>
								</label>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<button type="submit" class="btn btn-sm btn-info btn-block"><span class="glyphicon glyphicon-log-in"></span> SUBMIT</button>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="login-footer">
					   <a href="<?=site_url();?>"><button type="button" class="btn btn-sm btn-danger">KEMBALI</button></a>
					   <button type="button" class="btn btn-sm btn-info btn-sign-up pull-right">DAFTAR PASIEN BARU</button>
					</div>
				</form>
				<!--Sign up form-->
				<form action="<?=site_url('pasien/save');?>" method="post" class="lobi-form signup-form ">
					<div class="login-header">
						Formulir :: Pasien Baru
					</div>
					<div class="login-body no-padding">
						<fieldset>
							<div class="form-group">
								<label>No.Registrasi</label>
								<label class="input">
									<input type="text" name="registrasi" value="<?=$no_registrasi;?>" readonly="true" placeholder="registrasi" required>
									<span class="tooltip tooltip-top-left"><i class="fa fa-user text-cyan-dark"></i> HARAP CATAT NOMOR REGISTRASI INI SEBELUM DI SUBMIT</span>
									<span class="help-block">Pencetakan Kartu Pasien Dilakukan Oleh Petugas</span>
								 </label>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<label class="input">
									<input type="text" name="nama_pasien" placeholder="nama pasien" required>
								</label>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<label class="input">
									<textarea name="alamat" rows="4" placeholder="Alamat" required></textarea>
								</label>
							</div>
							<div class="row">
								<div class="col-xxs-12 col-xs-6">
									<label>Tempat Lahir</label>
									<label class="input">
										<input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
									</label>
								</div>
								<div class="col-xxs-12 col-xs-6">
									<label>Tanggal Lahir</label>
									<label class="input">
										<input type="text" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" required>
									</label>
								</div>
							</div>
							
						   <div class="row">
								<div class="col-xxs-12 col-xs-6">
									<label>Gender: </label>
									<select name="gender">
										<option value="1">Laki-laki</option>
										<option value="0">Perempuan</option>
									</select>
								</div>
								<div class="col-xxs-12 col-xs-6">
									<label>No.Telepon</label>
									<label class="input">
										<input type="text" name="telp" id="telp" placeholder="No. Telepon/HP" required>
									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 col-xs-offset-8">
									<button type="submit" class="btn btn-info btn-block">Daftar</button>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="login-footer">
						Sudah Terdaftar? <button type="submit" class="btn btn-sm btn-info btn-sign-in pull-right">Masuk</button>
					</div>
				</form>
			</div>
       

        <script src="<?=base_url();?>asset/js/jquery.min.js"></script>
        <script src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>asset/js/bootstrap-datepicker.js"></script>
		<script src="<?=base_url();?>asset/js/jquery.validate.min.js"></script>
		
        <script type="text/javascript">
            
            $('.btn-sign-in').click(function(){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.login-form').addClass('visible');
            });
            $('.btn-sign-up').click(function(){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.signup-form').addClass('visible');
            });
			$("#telp").keypress(function(data){
				if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
					return false;
				}
			});
			$("#kode_barcode").keyup(function(e){
				var isi = $(e.target).val();
				$(e.target).val(isi.toUpperCase());
			});
			$(document).ready(function(){
				$("#tanggal_lahir").datepicker({
						format:"dd-mm-yyyy"
				});
			});
			
			$(document).ready( function() {
				var form = $('#formantrian');
				var error = $('.alert-danger', form);
				var success = $('.alert-success', form);
				
				form.validate({
					doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
					errorElement: 'span', //default input error message container
					errorClass: 'help-block help-block-error', // default input error message class
					focusInvalid: false, // do not focus the last invalid input
					rules:{
						kode_barcode: {
							required: true,
							remote:{
								url:"<?=site_url('pasien/cek_kodebarcode');?>",
								type:"POST",
								dataType:"json",
								data:{
									username:function(){
										return $("#kode_barcode").val();
									}
								},
								response:function(data){
									 /* if(data.responseText =='false'){
										 messages:{
											username:{
												remote:jQuery.validator.format("{0} tidak tersedia")
											}
										} 
									}  */
								}
							}
						}
					},
					
					messages:{
						kode_barcode: {
							required: 'Kode Barcode harus diisi',
							remote:jQuery.validator.format("{0} tidak tersedia, Masukkan Kode Barcode Yang Benar")
						}
					},
						
					invalidHandler: function (event, validator) { //display error alert on form submit   
						success.hide();
						error.show();
					},

					highlight: function (element) { // hightlight error inputs
						$(element)
							.closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
					},

					unhighlight: function (element) { // revert the change done by hightlight
						$(element)
							.closest('.form-group').removeClass('has-error'); // set error class to the control group
					},
					
					success: function (label) {
						label
							.addClass('valid') // mark the current input as valid and display OK icon
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
    </body>
</html>
