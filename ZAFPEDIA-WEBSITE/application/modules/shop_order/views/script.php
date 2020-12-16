<script>
		jQuery(document).ready(function(){
			var content = $('.order-content');
			var loading = $('.order-loading');
			var listListing = '';

			var loadOrder = function (el, name) {
				var url = '<?=site_url('shop_order/orders/show_order');?>';
				var title = $('.order-nav > li.' + name + ' a').attr('data-title');
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

						$('.order-nav > li.active').removeClass('active');
						$('.order-nav > li.' + name).addClass('active');
						$('.order-header > h1').text(title);

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
			var loadComplete = function (el, name) {
				var url = '<?=site_url('shop_order/orders/show_complete');?>';
				var title = $('.order-nav > li.' + name + ' a').attr('data-title');
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

						$('.order-nav > li.active').removeClass('active');
						$('.order-nav > li.' + name).addClass('active');
						$('.order-header > h1').text(title);

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
			var loadPending = function (el, name) {
				var url = '<?=site_url('shop_order/orders/show_pending');?>';
				var title = $('.order-nav > li.' + name + ' a').attr('data-title');
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

						$('.order-nav > li.active').removeClass('active');
						$('.order-nav > li.' + name).addClass('active');
						$('.order-header > h1').text(title);

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
			var loadCancel = function (el, name) {
				var url = '<?=site_url('shop_order/orders/show_cancel');?>';
				var title = $('.order-nav > li.' + name + ' a').attr('data-title');
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

						$('.order-nav > li.active').removeClass('active');
						$('.order-nav > li.' + name).addClass('active');
						$('.order-header > h1').text(title);

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
			
			function viewloadOrder(el, name, resetMenu) {
				var url = '<?=site_url('shop_order/orders/view_order');?>';

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
					beforeSend: function() {
						$(this).html("<img src='<?= base_url();?>/files/images/ajax-loader.gif' />");
					},
					success: function(res) 
					{
						toggleButton(el);

						if (resetMenu) {
							$('.order-nav > li.active').removeClass('active');
						}
						$('.order-header > h1').text('View Order');

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
			$('.order-content').on('click', '.view-order', function () {
				viewloadOrder($(this));
			});

			$('.order-nav > li.order > a').click(function () {
				loadOrder($(this), 'order');
			});

			$('.order-nav > li.complete > a').click(function () {
				loadComplete($(this), 'complete');
			});

			$('.order-nav > li.pending > a').click(function () {
				loadPending($(this), 'pending');
			});

			$('.order-nav > li.reject > a').click(function () {
				loadReject($(this), 'reject');
			});
			$('.order-nav > li.cancel > a').click(function () {
				loadCancel($(this), 'cancel');
			});
			if (Metronic.getURLParameter("a") === "view") {
				viewloadOrder();
			} else {
			   $('.order-nav > li.order > a').click();
			}

		});
</script>