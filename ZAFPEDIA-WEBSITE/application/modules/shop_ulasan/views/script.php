<script>
			
			jQuery(document).ready(function(){

				var content = $('.ulasan-content');
				var loading = $('.ulasan-loading');
				var listListing = '';

				var loadUlasan = function (el, name) {
					var url = '<?=site_url('shop_ulasan/ulasan_produk/show_ulasan');?>';
					var title = $('.ulasan-nav > li.' + name + ' a').attr('data-title');
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

							$('.ulasan-nav > li.active').removeClass('active');
							$('.ulasan-nav > li.' + name).addClass('active');
							$('.ulasan-header > h1').text(title);

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
					var url = '<?=site_url('shop_ulasan/ulasan_produk/show_sent');?>';
					var title = $('.ulasan-nav > li.' + name + ' a').attr('data-title');
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

							$('.ulasan-nav > li.active').removeClass('active');
							$('.ulasan-nav > li.' + name).addClass('active');
							$('.ulasan-header > h1').text(title);

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
					var url = '<?=site_url('shop_ulasan/ulasan_produk/show_trash');?>';
					var title = $('.ulasan-nav > li.' + name + ' a').attr('data-title');
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

							$('.ulasan-nav > li.active').removeClass('active');
							$('.ulasan-nav > li.' + name).addClass('active');
							$('.ulasan-header > h1').text(title);

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
					var url = '<?=site_url('shop_ulasan/ulasan_produk/view_ulasan');?>';

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
								$('.ulasan-nav > li.active').removeClass('active');
							}
							$('.ulasan-header > h1').text('Lihat Ulasan');

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

				function loadReply(el) {
					var messageid = $(el).attr("data-messageid");
					var url = '<?=site_url('shop_ulasan/ulasan_produk/balas_ulasan');?>';
					
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

							$('.ulasan-nav > li.active').removeClass('active');
							$('.ulasan-header > h1').text('Reply');

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

				$('.ulasan').on('click', '.reply-btn', function () {
					loadReply($(this));
				});

				$('.ulasan-content').on('click', '.view-message', function () {
					loadMessage($(this));
				});

				$('.ulasan-nav > li.ulasan > a').click(function () {
					loadUlasan($(this), 'ulasan');
				});

				$('.ulasan-nav > li.sent > a').click(function () {
					loadSent($(this), 'sent');
				});

				$('.ulasan-nav > li.trash > a').click(function () {
					loadTrash($(this), 'trash');
				});

				if (Metronic.getURLParameter("a") === "view") {
					loadMessage();
				} else if (Metronic.getURLParameter("a") === "compose") {
					loadCompose();
				} else {
				   $('.ulasan-nav > li.ulasan > a').click();
				}
			});
		</script>