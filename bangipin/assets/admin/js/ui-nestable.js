var UINestable = function () {
	var base_url = 'https://bangipin.com/';
   
   var buatMenu = function () {
				
		$('#menu_nestable').nestable({
			 maxDepth:2,
		}).on('change',function() {
			updateOutput($('#menu_nestable').data('output', $('#menu_nestable_output')));
		});
	  
		var last_touched = '';
		var updateOutput = function (e) 
		{
			var list = e.length ? e : $(e.target),
				output = list.data('output');

			if (window.JSON) {
				output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));

				$.post(base_url+'menu/update_struktur', 
					{ 'whichnest' : last_touched, 'output' : output.val() }, 
					function(data) {
						console.log('success')
					}
				);

			}
			 else {
				output.val('JSON browser support required for this demo.');
			}
		};

		$('#nestable_list_menu').on('click', function (e) {
			var target = $(e.target),
				action = target.data('action');
			if (action === 'expand-all') {
				$('.dd').nestable('expandAll');
			}
			if (action === 'collapse-all') {
				$('.dd').nestable('collapseAll');
			}
		});

	};

	var tambahTopMenu = function () {
		$('#menuprimary').submit(function(e){
			e.preventDefault();
			$.ajax({
				url : $(this).attr('action'),
				type: "post",
				data : $(this).serialize(),
				error: function (xhr, ajaxOptions, thrownError) {
					return false;		  	
				},
				success:function(){
					 $("#menuprimary").each(function(){
						this.reset();
					});
					 
					$('#menu_nestable').load(base_url+'menu/tampilprimarymenu');
				}
			});
			
		});
		$(".tambahkan-ke-menu").click(function(event){
			var	nama_menu 	=$(this).attr("data-title");
			var	url_menu  	=$(this).attr("data-url");
			var	type_menu  	=$(this).attr("data-type");
			var	opsi_menu   =$(this).attr("data-opsi");
			
			 $.ajax({
				type:"POST",
				url: base_url+'menu/insertmenu',
				data:{"nama":nama_menu,"url":url_menu,"type":type_menu,"opsi":opsi_menu},
				cache: false,
				dataType:"json",
				success: function(){
					$('#menu_nestable').load(base_url+'menu/tampilprimarymenu');
				},
				error: function(a,b,c){
					console.log(a.responseText);
					console.log(c);
				}
			});
		});
	};
	var tambahHeaderMenu = function () {
		$('#menuheader').submit(function(e){
			e.preventDefault();
			$.ajax({
				url : $(this).attr('action'),
				type: "post",
				data : $(this).serialize(),
				error: function (xhr, ajaxOptions, thrownError) {
					return false;		  	
				},
				success:function(){
					 $("#menuheader").each(function(){
						this.reset();
					});
					 
					$('#menu_nestable').load(base_url+'menu/tampilheadermenu');
				}
			});
			
		});
		$(".tambahkan-ke-menu2").click(function(event){
			var	nama_menu 	=$(this).attr("data-title");
			var	url_menu  	=$(this).attr("data-url");
			var	type_menu  	=$(this).attr("data-type");
			var	opsi_menu   =$(this).attr("data-opsi");
			
			 $.ajax({
				type:"POST",
				url: base_url+'menu/insertmenu',
				data:{"nama":nama_menu,"url":url_menu,"type":type_menu,"opsi":opsi_menu},
				cache: false,
				dataType:"json",
				success: function(){
					$('#menu_nestable').load(base_url+'menu/tampilheadermenu');
				},
				error: function(a,b,c){
					console.log(a.responseText);
					console.log(c);
				}
			});
		});
	};
	var tambahFooterMenu = function () {
		$('#menufooter').submit(function(e){
			e.preventDefault();
			$.ajax({
				url : $(this).attr('action'),
				type: "post",
				data : $(this).serialize(),
				error: function (xhr, ajaxOptions, thrownError) {
					return false;		  	
				},
				success:function(){
					 $("#menufooter").each(function(){
						this.reset();
					});
					 
					$('#menu_nestable').load(base_url+'menu/tampilfootermenu');
				}
			});
			
		});
		$(".tambahkan-ke-menu3").click(function(event){
			var	nama_menu 	=$(this).attr("data-title");
			var	url_menu  	=$(this).attr("data-url");
			var	type_menu  	=$(this).attr("data-type");
			var	opsi_menu   =$(this).attr("data-opsi");
			
			 $.ajax({
				type:"POST",
				url: base_url+'menu/insertmenu',
				data:{"nama":nama_menu,"url":url_menu,"type":type_menu,"opsi":opsi_menu},
				cache: false,
				dataType:"json",
				success: function(){
					$('#menu_nestable').load(base_url+'menu/tampilfootermenu');
				},
				error: function(a,b,c){
					console.log(a.responseText);
					console.log(c);
				}
			});
		});
	};

	
	return {

        init: function () {

			buatMenu();
			tambahTopMenu();
			tambahHeaderMenu();
			tambahFooterMenu();
	    }

    };

}();

jQuery(document).ready(function(){
    UINestable.init();
});
