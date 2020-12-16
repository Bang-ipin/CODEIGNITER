var KomponenAdmin = function () {
	
	var handleInputTags = function () {
		
		if (!jQuery().tagsInput) {
			return;
		}
		$('#tags_1').tagsInput({
			width: 'auto',
			'onAddTag': function () {
			//alert(1);
			},
		});
		
		$('#tags_2').tagsInput({
			width: 300
		});
	}
		
	var handleInputPickers = function () {
			
		$('.date-picker').datepicker({
			rtl: Metronic.isRTL(),
			autoclose: true
		});
			
		$('.maxlength-handler').maxlength({
			limitReachedClass: "label label-danger",
			alwaysShow: true,
			threshold: 3
		});
	}
	
	var handleInputValidasi = function () {
		
		$("#posisi").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});

		$("#telepon").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#telp").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#gajiminimum").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#gajimaksimum").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});

		$("#jumlah").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});

	};
	
	return {
        //main function to initiate the module
        init: function () {

			handleInputTags();
			handleInputPickers();
			handleInputValidasi();
			
        }

    };
	
}();


jQuery(document).ready(function() {    
   KomponenAdmin.init(); // init metronic core componets
});
