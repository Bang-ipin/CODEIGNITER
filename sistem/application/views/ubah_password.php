<?php echo form_open('change_password', array('id' => 'UbahPass')); ?>
	<div class='form-group'>
		<label>Password Lama</label>
		<input type='password' name='pass_old' id='pass_old' name='pass_old' class='form-control' placeholder='Password Lama' autofocus="autofocus">
	</div>
	<div class='form-group'>
		<label>Password Baru</label>
		<input type='password' name='pass_new' id='pass_new' class='form-control' placeholder='Password Baru'>
	</div>
	<div class='form-group'>
		<label>Ulangi Password Baru</label>
		<input type='password' name='pass_new_confirm' id='pass_new_confirm' placeholder='Konfirmasi Password Baru' class='form-control'>
	</div>
</form>
<?php echo form_close(); ?>

<div id="ResponseInput"></div>

<script>
$(document).ready( function() {
	var form = $('#UbahPass');
	var error = $('.alert-danger', form);
	var success = $('.alert-success', form);
	
	form.validate({
		doNotHideMessage: true, 
		errorElement: 'span', 
		errorClass: 'help-block help-block-error', 
		focusInvalid: false, 
		rules:{
			pass_old: {
				required: true,
				remote:{
					url:"<?=site_url('welcome/cek_password');?>",
					type:"POST",
					dataType:"json",
					data:{
						pass_old:function(){
							return $("#pass_old").val();
						}
					},
					response:function(data){
						 /* if(data.responseText =='false'){
							 messages:{
								pass_old:{
									remote:jQuery.validator.format("{0} tidak tersedia")
								}
							} 
						}  */
					}
				}
			},
			pass_new:{required: true, minlength: 5},
            pass_new_confirm:{required: true, equalTo: "#pass_new"}
		},
		messages:{
                   baru:{required: 'Password harus diisi', minlength: 'Password minimal 5 karakter'},
                   ulang:{required: 'Tidak boleh kosong', equalTo: 'Isi harus sama dengan Password'}
              },

		messages:{
			pass_old: {
				required: 'Password harus diisi',
				remote:jQuery.validator.format("{0} bukan password anda")
			},
			pass_new:{required: 'Password harus diisi', minlength: 'Password minimal 5 karakter'},
			pass_new_confirm:{required: 'Tidak boleh kosong', equalTo: 'Isi harus sama dengan Password'}
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

$(document).ready(function(){
	$('#SimpanPass').click(function(){
		$.ajax({
			url: $('#UbahPass').attr('action'),
			type: "POST",
			cache: false,
			data: $('#UbahPass').serialize(),
			dataType:'json',
			success: function(json){
				if(json.status == 1){ 
					$('#UbahPass').each(function(){
						this.reset();
					});

					$('#ResponseInput').html(json.pesan);
					setTimeout(function(){ 
				   		$('#ResponseInput').html('');
				    }, 3000);
				}
				else {
					$('#ResponseInput').html(json.pesan);
				}
			}
		});
	});
});
</script>