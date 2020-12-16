(function($) {
    "use strict";

    /*===================================================================================*/
    /*  WOW
    /*===================================================================================*/

    $(document).ready(function () {
        new WOW().init();
    });

    /*===================================================================================*/
    /*  OWL CAROUSEL
    /*===================================================================================*/

    $(document).ready(function () {

        var dragging = true;
        var owlElementID = "#owl-main";

        function fadeInReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").stop().delay(800).animate({ opacity: 0 }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").css({ opacity: 0 });
            }
        }

        function fadeInDownReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").stop().delay(800).animate({ opacity: 0, top: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").css({ opacity: 0, top: "-15px" });
            }
        }

        function fadeInUpReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").stop().delay(800).animate({ opacity: 0, top: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").css({ opacity: 0, top: "15px" });
            }
        }

        function fadeInLeftReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").stop().delay(800).animate({ opacity: 0, left: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").css({ opacity: 0, left: "15px" });
            }
        }

        function fadeInRightReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").stop().delay(800).animate({ opacity: 0, left: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").css({ opacity: 0, left: "-15px" });
            }
        }

        function fadeIn() {
            $(owlElementID + " .active .caption .fadeIn-1").stop().delay(500).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-2").stop().delay(700).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-3").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInDown() {
            $(owlElementID + " .active .caption .fadeInDown-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInUp() {
            $(owlElementID + " .active .caption .fadeInUp-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInLeft() {
            $(owlElementID + " .active .caption .fadeInLeft-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInRight() {
            $(owlElementID + " .active .caption .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        $(owlElementID).owlCarousel({

            autoplay: true,
            stoponhover: true,
            nav: true,
			loop:true,
            pagination: true,
            singleItem: true,
            items: 1,
            addClassActive: true,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],



            afterInit: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            afterMove: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            afterUpdate: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            startDragging: function() {
                dragging = true;
            },

            afterAction: function() {
                fadeInReset();
                fadeInDownReset();
                fadeInUpReset();
                fadeInLeftReset();
                fadeInRightReset();
                dragging = false;
            }

        });

        if ($(owlElementID).hasClass("owl-one-item")) {
            $(owlElementID + ".owl-one-item").data('owlCarousel').destroy();
        }

        $(owlElementID + ".owl-one-item").owlCarousel({
            items: 1,
            singleItem: true,
            navigation: false,
            pagination: false
        });

        $('#transitionType li a').click(function () {

            $('#transitionType li a').removeClass('active');
            $(this).addClass('active');

            var newValue = $(this).attr('data-transition-type');

            $(owlElementID).data("owlCarousel").transitionTypes(newValue);
            $(owlElementID).trigger("owl.next");

            return false;

        });

        $("#owl-recently-viewed").owlCarousel({
            autoplay:true,
			stoponhover: true,
            rewindNav: true,
            items: 4,
			loop:true,
            pagination: false,
            itemsTablet: [768,3]
        });

        $("#owl-recently-viewed-2").owlCarousel({
            autoplay:true,
			stoponhover: true,
            rewindNav: true,
            items: 4,
			loop:true,
            pagination: false,
            itemsTablet: [768,3],
            itemsDesktopSmall: [1199,3],
        });

        $("#owl-brands").owlCarousel({
            autoplay:true,
			stoponhover: true,
            rewindNav: true,
            items: 6,
			loop:true,
            pagination: false,
            itemsTablet : [768, 4]
        });

        $('#owl-single-product').owlCarousel({
            items: 1,
            singleItem: true,
            pagination: false
        });

        $('#owl-single-product-thumbnails').owlCarousel({
            items: 6,
			loop:true,
            pagination: false,
            rewindNav: true,
            itemsTablet : [768, 4]
        });

        $('#owl-recommended-products').owlCarousel({
            autoplay:true,
			stoponhover: true,
            rewindNav: true,
            items: 4,
			loop:true,
            pagination: false,
            itemsTablet: [768, 3],
            itemsDesktopSmall: [1199,3],
        });

        $('#best-seller-single-product-slider').owlCarousel({
            items: 1,
            singleItem: true,
            pagination: false
        });

        $(".slider-next").click(function () {
            var owl = $($(this).data('target'));
            owl.trigger( 'next.owl.carousel' );
            return false;
        });

        $(".slider-prev").click(function () {
            var owl = $($(this).data('target'));
            owl.trigger( 'prev.owl.carousel' );
            return false;
        });

        $('.single-product-gallery .horizontal-thumb').click(function(){
            var $this = $(this), owl = $($this.data('target')), slideTo = $this.data('slide');
            owl.trigger('to.owl.carousel', slideTo);
            $this.addClass('active').parent().siblings().find('.active').removeClass('active');
            return false;
        });

    });

    /*===================================================================================*/
    /*  STAR RATING
    /*===================================================================================*/

    /*$(document).ready(function () {

        if ($('.star').length > 0) {
            $('.star').each(function(){
                    var $star = $(this);

                    if($star.hasClass('big')){
                        $star.raty({
                            starOff: 'assets/frontend/images/star-big-off.png',
                            starOn: 'assets/frontend/images/star-big-on.png',
                            space: false,
                            score: function() {
                                return $(this).attr('data-score');
                            }
                        });
                    }else{
                     $star.raty({
                        starOff: './assets/frontend/images/star-off.png',
                        starOn: './assets/frontend/images/star-on.png',
                        space: false,
                        score: function() {
                            return $(this).attr('data-score');
                        }
                    });
                }
            });
        }
    });
	*/
    /*===================================================================================*/
    /*  SHARE THIS BUTTONS
    /*===================================================================================*/

    /*$(document).ready(function () {
        if($('.social-row').length > 0){
            stLight.options({publisher: "2512508a-5f0b-47c2-b42d-bde4413cb7d8", doNotHash: false, doNotCopy: false, hashAddressBar: false});
        }
    });*/
	
	 /*===================================================================================*/
    /*  ITEM CARTS
    /*===================================================================================*/

	$(document).ready(function () {
		$('#itemcart').submit(function(e){
			var qty = $("#qty").val();
			var stok = $("#stok").val();
			if(qty=='' || qty==null){
				alert('Quantity null');
				$('#qty').focus();
				return false;
			}else 
			if(Number(qty) > Number(stok)){
				alert('Stok Tidak Tersedia');
				$('#qty').val('0');
				$('#qty').focus();
				return false;
			}else
			if(qty=="0")
			{
				alert('Quantity Tidak Boleh 0');
				$('#qty').val('0');
				$('#qty').focus();
				return false;
			}else{
				$.ajax({
					url : $(this).attr('action'),
					type: "post",
					data : $(this).serialize(),
					error: function (xhr, ajaxOptions, thrownError) {
						return false;		  	
					},
					success:function(){ 
						window.location.reload('');
					}
				});
			}
			e.preventDefault();
		});
		
	});
	
	$(document).ready(function () {
		$('#updatecart').submit(function(){
			$.ajax({
				url : $(this).attr('action'),
				type: "post",
				data : $(this).serialize(),
				error: function (xhr, ajaxOptions, thrownError) {
					return exit;		  	
				},
				success:function(){ 
					window.location.reload();
				}
			});
		
		});
	});

/*===================================================================================*/
    
    /*===================================================================================*/
    /*  SCROOL TO TOP
    /*===================================================================================*/

	/*===================================================================================*/
    /*  CUSTOM CONTROLS
    /*===================================================================================*/

    $(document).ready(function () {

        // Select Dropdown
        if($('.le-select').length > 0){
            $('.le-select select').customSelect({customClass:'le-select-in'});
        }

        // Checkbox
        if($('.le-checkbox').length>0){
            $('.le-checkbox').after('<i class="fake-box"></i>');
        }

        //Radio Button
        if($('.le-radio').length>0){
            $('.le-radio').after('<i class="fake-box"></i>');
        }

        // Buttons
        $('.le-button.disabled').click(function(e){
            e.preventDefault();
        });

        // Quantity Spinner
        $('.le-quantity a').click(function(e){
            e.preventDefault();
            var currentQty= $(this).parent().parent().find('input').val();
            if( $(this).hasClass('minus') && currentQty>0){
                $(this).parent().parent().find('input').val(parseInt(currentQty, 10) - 1);
            }else{
                if( $(this).hasClass('plus')){
                    $(this).parent().parent().find('input').val(parseInt(currentQty, 10) + 1);
                }
            }
        });

        // Price Slider
        if ($('.price-slider').length > 0) {
            $('.price-slider').slider({
                min: 100,
                max: 700,
                step: 10,
                value: [100, 400],
                handle: "square"

            });
        }

        $(document).ready(function(){
            $('select.styled').customSelect();
        });

        // Data Placeholder for custom controls

        $('[data-placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('data-placeholder')) {
                input.val('');

            }
        }).blur(function() {
            var input = $(this);
            if (input.val() === '' || input.val() == input.attr('data-placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('data-placeholder'));
            }
        }).blur();

        $('[data-placeholder]').parents('form').submit(function() {
            $(this).find('[data-placeholder]').each(function() {
                var input = $(this);
                if (input.val() == input.attr('data-placeholder')) {
                    input.val('');
                }
            });
        });

    });

    /*===================================================================================*/
    /*  LIGHTBOX ACTIVATOR
    /*===================================================================================*/
    $(document).ready(function(){
        if ($('a[data-rel="prettyphoto"]').length > 0) {
            //$('a[data-rel="prettyphoto"]').prettyPhoto();
        }
    });


    /*===================================================================================*/
    /*  SELECT TOP DROP MENU
    /*===================================================================================*/
    $(document).ready(function() {
        $('.top-drop-menu').change(function() {
            var loc = ($(this).find('option:selected').val());
            window.location = loc;
        });
    });

    /*===================================================================================*/
    /*  LAZY LOAD IMAGES USING ECHO
    /*===================================================================================*/
    $(document).ready(function(){
        echo.init({
            offset: 100,
            throttle: 250,
            unload: false
        });
    });

	$(document).ready(function(){
		var form = $('#guestform');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

		form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules: {
				//profile
				fullname: {
					required: true
				},
				telepon: {
					required: true
				},
				gender: {
					required: true
				},
				address: {
					required: true
				},
				country: {
					required: true
				},
				destinasi: {
					required: true
				},
				kabupaten: {
					required: true
				},
				zip_code: {
					required: true
				},
				//payment
				payment: {
					required: true,
					minlength: 1
				},
				tujuan: {
					required: true,
					minlength: 1
				},
				kurir: {
					required: true,
					minlength: 1
				},
				servis: {
					required: true,
					minlength: 1
				},
				
			},
			
			messages: { // custom messages for radio buttons and checkboxes
				'gender': {
					required: "Pilih gender salah satu ",
					minlength: jQuery.validator.format("Please select at least one option")
				},
				'payment': {
					required: "Pilih salah satu opsi pembayaran",
					minlength: jQuery.validator.format("Please select at least one option")
				},
				'tujuan': {
					required: "Pilih salah satu rekening tujuan",
					minlength: jQuery.validator.format("Please select at least one option")
				},
				'kurir': {
					required: "Pilih salah satu Opsi Pengiriman",
					minlength: jQuery.validator.format("Please select at least one option")
				},
				'servis': {
					required: "Pilih salah satu Opsi layanan",
					minlength: jQuery.validator.format("Please select at least one option")
				}
			},
			/* errorPlacement: function (error, element) { // render error placement for each input type
				if (element.attr("data-error-container")) { 
					error.appendTo(element.attr("data-error-container"));
				}else {
					error.insertAfter(element); // for other inputs, just perform default behavior
				}
			}, */
			errorPlacement: function (error, element) { // render error placement for each input type
				if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
					error.insertAfter("#form_gender_error");
				} 
				else if (element.attr("name") == "payment") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_payment_error");
				} 
				else if (element.attr("name") == "tujuan") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_tujuan_error");
				}
				else if (element.attr("name") == "kurir") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_kurir_error");
				}
				else if (element.attr("name") == "servis") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_pilihlayanan_error");
				} else {
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
				if (label.attr("for") == "gender" || label.attr("for") == "payment[]" || label.attr("for") == "tujuan[]") { // for checkboxes and radio buttons, no need to show OK icon
					label
						.closest('.form-group').removeClass('has-error').addClass('has-success');
					label.remove(); // remove error label here
				} else { // display success icon for other inputs
					label
						.addClass('valid') // mark the current input as valid and display OK icon
					.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
				}
			},

		});
		var displayConfirm = function() {
			$('#tab4 .form-control-static', form).each(function(){
				var input = $('[name="'+$(this).attr("data-display")+'"]', form);
				
				if (input.is(":radio")) {
					input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
				}
				if (input.is(":text") || input.is("textarea")) {
					$(this).html(input.val());
				}
				else if (input.is("select")) {
					$(this).html(input.find('option:selected').text());
				}
				else if (input.is(":radio") && input.is(":checked")) {
					$(this).html(input.attr("data-title"));
				}
				else if ($(this).attr("data-display") == 'payment[]') {
					var payment = [];
					$('[name="payment[]"]:checked', form).each(function(){ 
						payment.push($(this).attr('data-title'));
					});
					$(this).html(payment.join("<br>"));
				}
				else if ($(this).attr("data-display") == 'tujuan[]') {
					var tujuan = [];
					$('[name="tujuan[]"]:checked', form).each(function(){ 
						tujuan.push($(this).attr('data-title'));
					});
					$(this).html(tujuan.join("<br>"));
				}
				else if ($(this).attr("data-display") == 'kurir') {
					var kurir = [];
					$('[name="kurir"]:checked', form).each(function(){ 
						kurir.push($(this).attr('data-title'));
					});
					$(this).html(kurir.join("<br>"));
				}
			});
		}
		
		var handleTitle = function(tab, navigation, index) {
			var total = navigation.find('li').length;
			var current = index + 1;
			// set wizard title
			$('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
			// set done steps
			jQuery('li', $('#form_wizard_1')).removeClass("done");
			var li_list = navigation.find('li');
			for (var i = 0; i < index; i++) {
				jQuery(li_list[i]).addClass("done");
			}

			if (current == 1) {
				$('#form_wizard_1').find('.button-previous').hide();
			} else {
				$('#form_wizard_1').find('.button-previous').show();
			}

			if (current >= total) {
				$('#form_wizard_1').find('.button-next').hide();
				$('#form_wizard_1').find('.button-submit').show();
				displayConfirm();
			} else {
				$('#form_wizard_1').find('.button-next').show();
				$('#form_wizard_1').find('.button-submit').hide();
			}
			Metronic.scrollTo($('.page-title'));
		}

		// default form wizard
		$('#form_wizard_1').bootstrapWizard({
			'nextSelector': '.button-next',
			'previousSelector': '.button-previous',
			onTabClick: function (tab, navigation, index, clickedIndex) {
				return false;
				/*
				success.hide();
				error.hide();
				if (form.valid() == false) {
					return false;
				}
				handleTitle(tab, navigation, clickedIndex);
				*/
			},
			onNext: function (tab, navigation, index) {
				success.hide();
				error.hide();

				if (form.valid() == false) {
					return false;
				}

				handleTitle(tab, navigation, index);
			},
			onPrevious: function (tab, navigation, index) {
				success.hide();
				error.hide();

				handleTitle(tab, navigation, index);
			},
			onTabShow: function (tab, navigation, index) {
				var total = navigation.find('li').length;
				var current = index + 1;
				var $percent = (current / total) * 100;
				$('#form_wizard_1').find('.progress-bar').css({
					width: $percent + '%'
				});
			}
		});

		$('#form_wizard_1').find('.button-previous').hide();
		$('#form_wizard_1 .button-submit').submit(function (e) {
			$.ajax({
				url :  $(this).attr('action'),
				type: "post",
				data : $(this).serialize(),
				error: function (xhr, ajaxOptions, thrownError) {
					return false;		  	
				},
				success:function(){ 
					window.location.reload('<?=site_url()?>');
				}
			});
			e.preventDefault();
		}).hide();
	
		$('.select2me',form).change(function () {
			form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
		});
		
	});
	
	$(document).ready(function(){
		var form = $('#member_form');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);

		form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules: {
				//account
				fullname: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				gender: {
					required: true
				},
				telepon: {
					maxlength:13,
					required: true
				},
				perusahaan: {
					required: true
				},
				//profile
				alamat: {
					required: true
				},
				kabupaten: {
					required: true
				},
				destinasi: {
					required: true
				},
				negara: {
					required: true
				},
				kode_pos: {
					required: true
				},
				//payment
				bank: {
					required: false
				},
				card_name: {
					required: false
				},
				card_number: {
					maxlength: 16,
					required: false
				},
				'kebijakan': {
					required: true,
				},
				'syaratketentuan': {
					required: true,
				},
				'payment': {
					required: true,
					minlength: 1
				},
				'tujuan': {
					required: true,
					minlength: 1
				},
				'servis': {
					required: true,
					minlength: 1
				}
			},
			
			messages: { // custom messages for radio buttons and checkboxes
				'kebijakan': {
					required: "Kebijakan Pribadi harus di ceklist",
				},
				'syaratketentuan': {
					required: "Syarat dan ketentuan harus di ceklist",
				},
				'payment': {
					required: "Pilih salah satu opsi pembayaran",
					minlength: jQuery.validator.format("Please select at least one option")
				},
				'tujuan': {
					required: "Pilih salah satu rekening tujuan",
					minlength: jQuery.validator.format("Please select at least one option")
				},
				'servis': {
					required: "Pilih salah satu opsi layanan",
					minlength: jQuery.validator.format("Please select at least one option")
				}
			},
			
			errorPlacement: function (error, element) { // render error placement for each input type
				if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
					error.insertAfter("#form_gender_error");
				} else if (element.attr("name") == "kebijakan") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_kebijakan_error");
				} else if (element.attr("name") == "syaratketentuan") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_syaratketentuan_error");
				} else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_payment_error");
				} else if (element.attr("name") == "tujuan[]") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_tujuan_error");
				} else if (element.attr("name") == "servis") { // for uniform checkboxes, insert the after the given container
					error.insertAfter("#form_pilihlayanan_error");
				} else {
					error.insertAfter(element); // for other inputs, just perform default behavior
				}
			},

			invalidHandler: function (event, validator) { //display error alert on form submit   
				success.hide();
				error.show();
				Metronic.scrollTo(error, -100);
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
				if (label.attr("for") == "gender" || label.attr("for") == "kebijakan" || label.attr("for") == "syaratketentuan" || label.attr("for") == "payment[]" || label.attr("for") == "tujuan[]") { // for checkboxes and radio buttons, no need to show OK icon
					label
						.closest('.form-group').removeClass('has-error').addClass('has-success');
					label.remove(); // remove error label here
				} else { // display success icon for other inputs
					label
						.addClass('valid') // mark the current input as valid and display OK icon
					.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
				}
			},
		});
		var displayConfirm = function() {
			$('#tab4 .form-control-static', form).each(function(){
				var input = $('[name="'+$(this).attr("data-display")+'"]', form);
				if (input.is(":radio")) {
					input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
				}
				if (input.is(":text") || input.is("textarea")) {
					$(this).html(input.val());
				} else if (input.is("select")) {
					$(this).html(input.find('option:selected').text());
				} else if (input.is(":radio") && input.is(":checked")) {
					$(this).html(input.attr("data-title"));
				} else if ($(this).attr("data-display") == 'payment[]') {
					var payment = [];
					$('[name="payment[]"]:checked', form).each(function(){ 
						payment.push($(this).attr('data-title'));
					});
					$(this).html(payment.join("<br>"));
				} else if ($(this).attr("data-display") == 'tujuan[]') {
					var tujuan = [];
					$('[name="tujuan[]"]:checked', form).each(function(){ 
						tujuan.push($(this).attr('data-title'));
					});
					$(this).html(tujuan.join("<br>"));
				}
				else if ($(this).attr("data-display") == 'gender') {
					var gender = '';
					$('[name="gender"]:checked', form).each(function(){ 
						gender.push($(this).attr('data-title'));
					});
					$(this).html(gender.join("<br>"));
				}
			});
		}
		
		var handleTitle = function(tab, navigation, index) {
			var total = navigation.find('li').length;
			var current = index + 1;
			// set wizard title
			$('.step-title', $('#form_wizard_2')).text('Step ' + (index + 1) + ' of ' + total);
			// set done steps
			jQuery('li', $('#form_wizard_2')).removeClass("done");
			var li_list = navigation.find('li');
			for (var i = 0; i < index; i++) {
				jQuery(li_list[i]).addClass("done");
			}

			if (current == 1) {
				$('#form_wizard_2').find('.button-previous').hide();
			} else {
				$('#form_wizard_2').find('.button-previous').show();
			}

			if (current >= total) {
				$('#form_wizard_2').find('.button-next').hide();
				$('#form_wizard_2').find('.button-submit').show();
				displayConfirm();
			} else {
				$('#form_wizard_2').find('.button-next').show();
				$('#form_wizard_2').find('.button-submit').hide();
			}
			Metronic.scrollTo($('.page-title'));
		}

		// default form wizard
		$('#form_wizard_2').bootstrapWizard({
			'nextSelector': '.button-next',
			'previousSelector': '.button-previous',
			onTabClick: function (tab, navigation, index, clickedIndex) {
				return false;
				},
			onNext: function (tab, navigation, index) {
				success.hide();
				error.hide();

				if (form.valid() == false) {
					return false;
				}

				handleTitle(tab, navigation, index);
			},
			onPrevious: function (tab, navigation, index) {
				success.hide();
				error.hide();

				handleTitle(tab, navigation, index);
			},
			onTabShow: function (tab, navigation, index) {
				var total = navigation.find('li').length;
				var current = index + 1;
				var $percent = (current / total) * 100;
				$('#form_wizard_2').find('.progress-bar').css({
					width: $percent + '%'
				});
			}
		});

		$('#form_wizard_2').find('.button-previous').hide();
		$('#form_wizard_2 .button-submit').submit(function (e) {
			$.ajax({
				url :  $(this).attr('action'),
				type: "post",
				data : $(this).serialize(),
				error: function (xhr, ajaxOptions, thrownError) {
					return false;		  	
				},
				success:function(){ 
					window.location.reload('<?=site_url()?>');
				}
			});
			e.preventDefault();
		}).hide();

		
	})
	
	$(document).ready(function(){
		
		var form = $('#formkontakform');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);
		
		form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules:{
				name: {
					minlength: 5,
					required: true
				},
				email: {
					required: true,
					email: true
				},
				pesan: {
					required: true
				}
			},
				
			messages:{
				name: {
					required: 'Nama harus diisi',
					minlength: 'Nama minimal 5 karakter'
				},
				email: {
					required: 'Email harus diisi',
				},
				pesan: {
					required: 'Pesan harus diisi',
				}
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

			
		})
		
	});
	
	$(document).ready(function(){
		
		var form = $('#formreviewproduk');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);
		
		form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules:{
				name: {
					minlength: 5,
					required: true
				},
				email: {
					required: true,
					email: true
				},
				review: {
					required: true
				}
			},
				
			messages:{
				name: {
					required: 'Nama harus diisi',
					minlength: 'Nama minimal 5 karakter'
				},
				email: {
					required: 'Email harus diisi',
				},
				review: {
					required: 'Review harus diisi',
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
				Metronic.scrollTo(error, 1000);
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
			
		})
		
	});
	$(document).ready(function(){
		
		var form = $('#formkomentarblog');
		var error = $('.alert-danger', form);
		var success = $('.alert-success', form);
		
		form.validate({
			doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules:{
				nama: {
					minlength: 5,
					required: true
				},
				email: {
					required: true,
					email: true
				},
				message: {
					required: true
				}
			},
				
			messages:{
				nama: {
					required: 'Nama harus diisi',
					minlength: 'Nama minimal 5 karakter'
				},
				email: {
					required: 'Email harus diisi',
				},
				message: {
					required: 'Review harus diisi',
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
				Metronic.scrollTo(error, 1000);
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
			
		})
		
	});
	
        /*===================================================================================*/
        /*  Yamm Dropdown
        /*===================================================================================*/
        $(document).on('click', '.yamm .dropdown-menu', function(e) {
          e.stopPropagation()
        });

})(jQuery);
