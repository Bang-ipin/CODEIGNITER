<script src="<?=base_url('assets/plugins/jquery.validate.min.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/public/js/sweetalert.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
    $('#simpanpesan').click(function(e){
		var nama					= $("#name").val();
		var email					= $("#email").val();
		var subject					= $("#subject").val();
		var pesan					= $("#pesan").val();
		
		var string = $("#contact-form").serialize();
		
		if(nama.length==0){
			$("#nama").focus();
			return false();
		}else
		if(email.length==0){
			$("#email").focus();
			return false();
		}
		else if(pesan.length==0){
			$("#pesan").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>contact/sendinbox",
			data	: string,
			cache	: false,
			success	: function(data){
				console.log(data);
                swal("Success!", "Pesan Terkirim kami akan membalas pesan anda secepatnya!", "success");
            },
                  error:function(data){
                 swal("Oops...", "Something went wrong :(", "error");
            }
		});
		 e.preventDefault(); 		
	});
	 /*===================================================================================*/
    /*  GMAP ACTIVATOR
    /*===================================================================================*/
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
        var zoom = 16;
        var latitude = <?=$latitude;?>;
        var longitude = <?=$longitude;?>;
        var mapIsNotActive = true;
        setupCustomMap();

        function setupCustomMap() {
            if ($('.map-holder').length > 0 && mapIsNotActive) {

                var styles = [
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            },
                            {
                                "color": "#E6E6E6"
                            }
                        ]
                    }, {
                        "featureType": "administrative",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "saturation": -100
                            }
                        ]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#808080"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {
                        "featureType": "water",
                        "stylers": [
                            {
                                "color": "#CECECE"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {
                        "featureType": "poi",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#E5E5E5"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {}
                ];

                var lt, ld;
                if ($('.map').hasClass('center')) {
                    lt = (latitude);
                    ld = (longitude);
                } else {
                    lt = (latitude + 0.0027);
                    ld = (longitude - 0.010);
                }

                var options = {
                    mapTypeControlOptions: {
                        mapTypeIds: ['Styled']
                    },
                    center: new google.maps.LatLng(lt, ld),
                    zoom: zoom,
                    disableDefaultUI: true,
                    scrollwheel: false,
                    mapTypeId: 'Styled'
                };
                var div = document.getElementById('map');

                var map = new google.maps.Map(div, options);

                var styledMapType = new google.maps.StyledMapType(styles, {
                    name: 'Styled'
                });

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map
                });

                map.mapTypes.set('Styled', styledMapType);

                mapIsNotActive = false;
            }

        }
    });
</script>