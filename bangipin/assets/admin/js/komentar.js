var AppKomentar = function () {
	
	var base_url = 'https://bangipin.com/';

	var content = $('.komentar-content');
	var loading = $('.komentar-loading');
	var listListing = '';

	var loadKomentar = function (el, name) {
		var url = base_url+'comments/comments/show_komentar';
		var title = $('.komentar-nav > li.' + name + ' a').attr('data-title');
		listListing = name;

		loading.show();
		content.html('');
		toggleButton(el);

		$.ajax({
			type: "GET",
			cache: false,
			url: url,
			dataType: "html",
			success: function(res) 
			{
				toggleButton(el);

				$('.komentar-nav > li.active').removeClass('active');
				$('.komentar-nav > li.' + name).addClass('active');
				$('.komentar-header > h1').text(title);

				loading.hide();
				content.html(res);
				if (Layout.fixContentHeight) {
					Layout.fixContentHeight();
				}
				Metronic.initUniform();
			},
			error: function(xhr, ajaxOptions, thrownError)
			{
				toggleButton(el);
			},
			async: false
		});

		$('body').on('change', '.mail-group-checkbox', function () {
			var set = $('.mail-checkbox');
			var checked = $(this).is(":checked");
			$(set).each(function () {
				$(this).attr("checked",checked);
			});
			$.uniform.update(set);
		});
	}
	var loadSent = function (el, name) {
		var url = base_url+ 'comments/comments/show_sent';
		var title = $('.komentar-nav > li.' + name + ' a').attr('data-title');
		listListing = name;

		loading.show();
		content.html('');
		toggleButton(el);

		$.ajax({
			type: "GET",
			cache: false,
			url: url,
			dataType: "html",
			success: function(res) 
			{
				toggleButton(el);

				$('.komentar-nav > li.active').removeClass('active');
				$('.komentar-nav > li.' + name).addClass('active');
				$('.komentar-header > h1').text(title);

				loading.hide();
				content.html(res);
				if (Layout.fixContentHeight) {
					Layout.fixContentHeight();
				}
				Metronic.initUniform();
			},
			error: function(xhr, ajaxOptions, thrownError)
			{
				toggleButton(el);
			},
			async: false
		});

		$('body').on('change', '.mail-group-checkbox', function () {
			var set = $('.mail-checkbox');
			var checked = $(this).is(":checked");
			$(set).each(function () {
				$(this).attr("checked",checked);
			});
			$.uniform.update(set);
		});
	}
	var loadTrash = function (el, name) {
		var url = base_url+ 'comments/comments/show_trash';
		var title = $('.komentar-nav > li.' + name + ' a').attr('data-title');
		listListing = name;

		loading.show();
		content.html('');
		toggleButton(el);

		$.ajax({
			type: "GET",
			cache: false,
			url: url,
			dataType: "html",
			success: function(res) 
			{
				toggleButton(el);

				$('.komentar-nav > li.active').removeClass('active');
				$('.komentar-nav > li.' + name).addClass('active');
				$('.komentar-header > h1').text(title);

				loading.hide();
				content.html(res);
				if (Layout.fixContentHeight) {
					Layout.fixContentHeight();
				}
				Metronic.initUniform();
			},
			error: function(xhr, ajaxOptions, thrownError)
			{
				toggleButton(el);
			},
			async: false
		});

		$('body').on('change', '.mail-group-checkbox', function () {
			var set = $('.mail-checkbox');
			var checked = $(this).is(":checked");
			$(set).each(function () {
				$(this).attr("checked",checked);
			});
			$.uniform.update(set);
		});
	}

	function loadMessage(el, name, resetMenu) {
		var url = base_url+ 'comments/comments/view_komentar';

		loading.show();
		content.html('');
		toggleButton(el);

		var message_id = el.parent('tr').attr("data-messageid");  
		
		$.ajax({
			type: "GET",
			cache: false,
			url: url,
			dataType: "html",
			data: "message_id="+message_id,
			success: function(res) 
			{
				toggleButton(el);

				if (resetMenu) {
					$('.komentar-nav > li.active').removeClass('active');
				}
				$('.komentar-header > h1').text('Lihat Komentar');

				loading.hide();
				content.html(res);
				Layout.fixContentHeight();
				Metronic.initUniform();
			},
			error: function(xhr, ajaxOptions, thrownError)
			{
				toggleButton(el);
			},
			async: false
		});
	}
	var initWysihtml5 = function () {
        $('.inbox-wysihtml5').wysihtml5({
            "stylesheets": [base_url+"assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
        });
    }
	function loadReply(el) {
		var messageid = $(el).attr("data-messageid");
		var url = base_url+ 'comments/comments/balas_komentar';
		
		loading.show();
		content.html('');
		toggleButton(el);

		// load the form via ajax
		$.ajax({
			type: "GET",
			cache: false,
			url: url,
			data: {'messageid': messageid},
			dataType: "html",
			success: function(res) 
			{
				toggleButton(el);

				$('.komentar-nav > li.active').removeClass('active');
				$('.komentar-header > h1').text('Reply');

				loading.hide();
				content.html(res);
				
				initWysihtml5();
				Layout.fixContentHeight();
				Metronic.initUniform();
			},
			error: function(xhr, ajaxOptions, thrownError)
			{
				toggleButton(el);
			},
			async: false
		});
	}

	
	function toggleButton(el) {
		if (typeof el == 'undefined') {
			return;
		}
		if (el.attr("disabled")) {
			el.attr("disabled", false);
		} else {
			el.attr("disabled", true);
		}
	}

	return {
        //main function to initiate the module
		init: function () {
			$('.komentar').on('click', '.reply-btn', function () {
				loadReply($(this));
			});

			$('.komentar-content').on('click', '.view-message', function () {
				loadMessage($(this));
			});

			$('.komentar-nav > li.komentar > a').click(function () {
				loadKomentar($(this), 'komentar');
			});

			$('.komentar-nav > li.sent > a').click(function () {
				loadSent($(this), 'sent');
			});

			$('.komentar-nav > li.trash > a').click(function () {
				loadTrash($(this), 'trash');
			});

			if (Metronic.getURLParameter("a") === "view") {
				loadMessage();
			} else if (Metronic.getURLParameter("a") === "compose") {
				loadCompose();
			} else {
			   $('.komentar-nav > li.komentar > a').click();
			}
		}
    };
}();


jQuery(document).ready(function() {    
   AppKomentar.init(); // init metronic core componets
});
