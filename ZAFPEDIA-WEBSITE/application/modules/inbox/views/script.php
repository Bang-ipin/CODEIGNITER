<script>
	
	jQuery(document).ready(function(){
		var content = $('.inbox-content');
		var loading = $('.inbox-loading');
		var listListing = '';

		var loadInbox = function (el, name) {
			var url = '<?=site_url('inbox/show_inbox');?>';
			var title = $('.inbox-nav > li.' + name + ' a').attr('data-title');
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

					$('.inbox-nav > li.active').removeClass('active');
					$('.inbox-nav > li.' + name).addClass('active');
					$('.inbox-header > h1').text(title);

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
			var url = '<?=site_url('inbox/view_inbox');?>';

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
						$('.inbox-nav > li.active').removeClass('active');
					}
					$('.inbox-header > h1').text('View Message');

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
		
		function initWysihtml5() {
			$('.inbox-wysihtml5').wysihtml5({
				"stylesheets": ["<?=base_url('assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css');?>"]
			});
		}

		function initFileupload() {

			$('#fileupload').fileupload({
				url: '<?=base_url('assets/global/plugins/jquery-file-upload/');?>',
				autoUpload: true
			});

			if ($.support.cors) {
				$.ajax({
					url: '<?=base_url('assets/global/plugins/jquery-file-upload/');?>',
					type: 'HEAD'
				}).fail(function () {
					$('<span class="alert alert-error"/>')
						.text('Upload server currently unavailable - ' +
						new Date())
						.appendTo('#fileupload');
				});
			}
		}

		function loadCompose (el) {
			var url = '<?=site_url('inbox/tulis_pesan');?>';

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

					$('.inbox-nav > li.active').removeClass('active');
					$('.inbox-header > h1').text('Compose');

					loading.hide();
					content.html(res);

					initFileupload();
					initWysihtml5();

					$('.inbox').focus();
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

		function loadReply(el) {
			var messageid = $(el).attr("data-messageid");
			var url = '<?=site_url('inbox/balas_pesan');?>';
			
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

					$('.inbox-nav > li.active').removeClass('active');
					$('.inbox-header > h1').text('Reply');

					loading.hide();
					content.html(res);
					$('[name="message"]').val($('#reply_email_content_body').html());

					initFileupload();
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

		function loadSearchResults (el) {
			var url = '<?=site_url('appweb/inbox/cari_pesan');?>';

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

					$('.inbox-nav > li.active').removeClass('active');
					$('.inbox-header > h1').text('Search');

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

		function handleCCInput() {
			var the = $('.inbox-compose .mail-to .inbox-cc');
			var input = $('.inbox-compose .input-cc');
			the.hide();
			input.show();
			$('.close', input).click(function () {
				input.hide();
				the.show();
			});
		}

		function handleBCCInput () {

			var the = $('.inbox-compose .mail-to .inbox-bcc');
			var input = $('.inbox-compose .input-bcc');
			the.hide();
			input.show();
			$('.close', input).click(function () {
				input.hide();
				the.show();
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

		$('.inbox').on('click', '.compose-btn a', function () {
			loadCompose($(this));
		});

		$('.inbox').on('click', '.inbox-discard-btn', function(e) {
			e.preventDefault();
			loadInbox($(this), listListing);
		});

		$('.inbox').on('click', '.reply-btn', function () {
			loadReply($(this));
		});

		$('.inbox-content').on('click', '.view-message', function () {
			loadMessage($(this));
		});

		$('.inbox-nav > li.inbox > a').click(function () {
			loadInbox($(this), 'inbox');
		});

		$('.inbox-nav > li.sent > a').click(function () {
			loadInbox($(this), 'sent');
		});

		$('.inbox-nav > li.draft > a').click(function () {
			loadInbox($(this), 'draft');
		});

		$('.inbox-nav > li.trash > a').click(function () {
			loadInbox($(this), 'trash');
		});

		$('.inbox-content').on('click', '.mail-to .inbox-cc', function () {
			handleCCInput();
		});

		$('.inbox-content').on('click', '.mail-to .inbox-bcc', function () {
			handleBCCInput();
		});

		if (Metronic.getURLParameter("a") === "view") {
			loadMessage();
		} else if (Metronic.getURLParameter("a") === "compose") {
			loadCompose();
		} else {
		   $('.inbox-nav > li.inbox > a').click();
		}
	});

</script>