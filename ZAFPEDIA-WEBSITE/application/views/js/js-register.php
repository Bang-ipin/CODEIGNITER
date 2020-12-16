<script>
    $(document).ready( function() {
		var form = $('#formregister');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);
		
		form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules:{
				username: {
					required: true,
					minlength:5,
					maxlength:16,
					remote:{
						url:"<?=site_url('member/cek_username');?>",
						type:"POST",
						dataType:"json",
						data:{
							username:function(){
								return $("#username").val();
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
				},
				fullname: {
					minlength: 3,
					required: true,
				},
				passwordregister: {
					minlength: 5,
					required: true
				},
				confirm_password: {
					minlength: 5,
					required: true,
					equalTo: "#passwordregister"
				},
				email1: {
					required: true,
					email: true,
					remote:{
						url:"<?=site_url('member/cek_email');?>",
						type:"POST",
						dataType:"json",
						data:{
							email:function(){
								return $("#email").val();
							}
						},
						response:function(data){
							 /* if(data.responseText =='false'){
								 messages:{
									email:{
										remote:jQuery.validator.format("{0} bisa digunakan")
									}
								} 
							}  */
						}
					}
				}
			},
			
			messages:{
				username: {
					required: 'Username harus diisi',
					minlength: 'Username minimal 3 karakter',
					maxlength: 'Username maksimal 16 Karakter',
					remote:jQuery.validator.format("{0} tidak tersedia, coba yang lain")
				},
				fullname: {
					required: 'Name Lengkap harus diisi',
					minlength: 'Nama Lengkap minimal 3 karakter'
				},
				passwordregister:{
					required: 'Password harus diisi',
					minlength: 'Password minimal 5 karakter'
				},
				confirm_password:{
					required: 'Password Konfirmasi harus diisi',
					equalTo: 'Isi harus sama dengan Password'
				},
				email1: {
					required: 'Email harus diisi',
					remote:jQuery.validator.format("{0} sudah digunakan")
				}
			},
				
			invalidHandler: function (event, validator) { //display error alert on form submit   
				success.hide();
				error.show();
				Metronic.scrollTo(error, -200);
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
				form.submit(); // submit the form
			}, 
		})
	});
</script>