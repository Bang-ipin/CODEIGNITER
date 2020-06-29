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

		$(".datetime-picker").datetimepicker({
			isRTL: Metronic.isRTL(),
			autoclose: true,
			todayBtn: true,
			pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left"),
			minuteStep: 10
		});
			
		$('.maxlength-handler').maxlength({
			limitReachedClass: "label label-danger",
			alwaysShow: true,
			threshold: 5
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
		$("#price").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#harga").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});

		$("#jumlah").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});

		$("#diskon").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#panjang").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});$("#lebar").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#tinggi").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});
		$("#berat").keypress(function(data){
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
