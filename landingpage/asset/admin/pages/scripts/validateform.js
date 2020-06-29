var FormValidation = function () {

	 var formTema = function() {
		 
			var form = $('#formtema');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					themes: {
						required: true
					},
					status: {
						required: true,
					}
				},
				
				messages:{
					themes:  {
						required: 'username harus diisi',
					},
					status:{
						required: 'Status Harus diisi'
					}
				},
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			
			$('.select2me', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            $("#select2_tags").change(function() {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });

			
		}
		var formUser = function() {
		 
			var form = $('#formuser');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					username: {
						minlength: 5,
						required: true
					},
					password: {
						minlength: 5,
					},
					alamat: {
						required: true,
					},
					email: {
						required: true,
						email: true
					},
					telepon: {
						required: true,
						number: true
					},
					user: {
						required: true,
					},
					status: {
						required: true,
					},
					level: {
						required: true,
					}
				},
				
				messages:{
					username:  {
						required: 'username harus diisi',
						minlength: 'Username minimal 5 karakter'
					},
					password:{
						minlength: 'Password minimal 5 karakter'
					},
					email: {
						required: 'Email harus diisi',
					},
					alamat: {
						required: 'Alamat harus diisi',
					},
					telepon: {
						required: 'Telepon harus diisi',
					},
					user: {
						required: 'Nama Lengkap harus diisi',
					},
					status: {
						required: 'Status harus diisi',
					},
					level: {
						required: 'Level harus diisi',
					}
				},
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			
			$('.select2me', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            $("#select2_tags").change(function() {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });

			
		}
		
		var formConfig = function() {
			 
			var form = $('#formconfig');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					judul_situs: {
						maxlength: 70,
						required: true
					},
					email: {
						required:true,
						email: true
					},
					telepon: {
						number: true
					},
					url: {
                        url: true
                    },
					
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			
			$('.select2me', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            $("#select2_tags").change(function() {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });

		}
		
		var formLevel = function() {
			 
			var form = $('#formlevel');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					id: {
						minlength: 2,
						maxlength: 2,
						required: true,
						number	:true
					},
					level: {
						required: true,
					}
				},
				
				messages:{
					id: {
						required: 'Status harus diisi',
						minlength: 'Minimal 2 Karakter',
						minlength: 'Maximal 2 Karakter',
						number: 'Gunakan Angka',
					},
					level: {
						required: 'Level harus diisi',
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
					form[0].submit(); // submit the form
				},
			});
		}
		
		 var formKategori = function() {
			
			var form = $('#formkategori');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					nama: {
						required: true,
					},
					status: {
						required: true,
					}
				},
				
				messages:{
					nama: {
						required: 'Nama Kategori harus diisi',
					},
					status: {
						required: 'Parent Kategori harus diisi',
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
					form[0].submit(); // submit the form
				},
			});
		}
		var formKategoriProduk = function() {
			
			var form = $('#formkategoriproduk');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					nama: {
						required: true,
					},
					root: {
						required: true,
					},
					status: {
						required: true,
					}
				},
				
				messages:{
					nama: {
						required: 'Nama Kategori harus diisi',
					},
					root: {
						required: 'Parent Kategori harus diisi',
					},
					status: {
						required: 'Parent Kategori harus diisi',
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
					form[0].submit(); // submit the form
				},
			});
		}
		
		var formProduk = function() {
			
			var form = $('#formproduk');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					product_name: {
						required: true,
					},
					product_singkat: {
						required: true,
					},
					kategori: {
						required: true,
					},
					jumlah: {
						required: true,
						number:true
					},
					price: {
						required: true,
						number:true
					},
					status: {
						required: true,
					},
				},
				
				messages:{
					product_name: {
						required: 'Nama Produk harus diisi',
					},
					kategori: {
						required: 'Kategori harus diisi',
					},
					jumlah: {
						required: 'Jumlah harus diisi',
					},
					price: {
						required: 'Harga harus diisi',
					},
					status: {
						required: 'Status belum dipilih',
					}
				},
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            $("#select2_tags").change(function() {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });
			
		}
		
		var formArtikel = function() {
			
			var form = $('#formartikel');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					judul_blog: {
						required: true,
					},
					kategori: {
						required: true,
					},
					status: {
						required: true,
						number:true
					}
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            $("#select2_tags").change(function() {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });
			
		}
		
		
		var formAtribut = function() {
			
			var form = $('#formatribut');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					label: {
						required: true,
					},
					keterangan: {
						required: true,
					},
					status: {
						required: true,
					}
				},
				
				messages:{
					label: {
						required: 'Label harus diisi',
					},
					keterangan: {
						required: 'Keterangan harus diisi',
					},
					status: {
						required: 'Status Belum di pilih',
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		
		var formTags = function() {
			 
			var form = $('#form_tag');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					tags: {
						required: true,
					},
					relasi: {
						required: true,
					},
				},
				
				messages:{
					tags: {
						required: 'Tag harus diisi',
					},
					relasi: {
						required: 'Kategori Tag harus pilih',
					},
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
				
			});
			
			$('.select2me', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            $("#select2_tags").change(function() {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });
		}
		
		var formSupplier = function() {
			
			var form = $('#formsupplier');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					nama: {
						required: true,
					},
					alamat: {
						required: true,
					},
					telepon: {
						required: true,
						number:true
					},
					status: {
						required: true,
					},
				},
				
				messages:{
					nama: {
						required: 'Nama Supplier harus diisi',
					},
					alamat: {
						required: 'Alamat harus diisi',
					},
					telepon: {
						required: 'Telepon harus diisi',
					},
					status: {
						required: 'Status belum dipilih',
					}
				},
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		
		var formPayment = function() {
			 
			var form = $('#formpayment');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					name: {
						required: true,
					},
					caption: {
						required: true,
					},
					status: {
						required: true,
					},
					posisi: {
						required: true,
					},
				},
				
				messages:{
					name: {
						required: 'Nama Bank harus diisi',
					},
					caption: {
						required: 'Caption belum dipilih',
					},
					status: {
						required: 'Status belum dipilih',
					},
					posisi: {
						required: 'Posisi harus diisi',
					},
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		
		 var formShipping = function() {
			 
			var form = $('#formshipping');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					name: {
						required: true,
					},
					status: {
						required: true,
					},
					posisi: {
						required: true,
					},
				},
				
				messages:{
					name: {
						required: 'Nama Ekspedisi harus diisi',
					},
					status: {
						required: 'Status belum dipilih',
					},
					posisi: {
						required: 'Posisi harus diisi',
					},
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		
		 var formSlider = function() {
			 
			var form = $('#formslider');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					name: {
						required: true,
					},
					status: {
						required: true,
					},
					type: {
						required: true,
					},
				},
				
				messages:{
					name: {
						required: 'Nama harus diisi',
					},
					status: {
						required: 'Status belum dipilih',
					},
					type: {
						required: 'Tipe belum dipilih',
					},
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		
		var formSliderProduk = function() {
			 
			var form = $('#formsliderproduk');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					name: {
						required: true,
					},
					status: {
						required: true,
					},
					type: {
						required: true,
					},
				},
				
				messages:{
					name: {
						required: 'Nama harus diisi',
					},
					status: {
						required: 'Status belum dipilih',
					},
					type: {
						required: 'Tipe belum dipilih',
					},
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		
		 var formLokasi = function() {
			 
			var form = $('#formlokasi');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					name: {
						required: true,
					},
					caption: {
						required: true,
					},
					lat: {
						required: true,
					},
					lng: {
						required: true,
					},
					status: {
						required: true,
					},
					posisi: {
						required: true,
					},
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		
		var formMenu = function() {
			 
			var form = $('#formmenu');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					menu: {
						required: true,
					},
					status: {
						required: true,
					},
					posisi: {
						required: true,
					},
					root: {
						required: true,
					},
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		var formDownload = function() {
			 
			var form = $('#formdownload');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					judul: {
						required: true,
					}
					
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		}
		
		var formPages = function() {
			
			var form = $('#formpages');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			
			form.validate({
				doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules:{
					pages: {
						required: true,
					},
					status: {
						required: true,
					},
					posisi: {
						required: true,
					},
					
				},
				
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
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
					form[0].submit(); // submit the form
				},
			});
			$('.select2me',form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		};
		
	return {
        //main function to initiate the module
        init: function () {

			formTema();
			formUser();
			formConfig();
			formLevel();
			formKategori();
			formKategoriProduk();
			formProduk();
			formArtikel();
			formAtribut();
			formDownload();
			formTags();
			formSupplier();
			formPayment();
			formShipping();
			formSlider();
			formSliderProduk();
			formLokasi();
			formMenu();
			formPages();
			
        }

    };
		
}();
jQuery(document).ready(function(){
	FormValidation.init();
});
