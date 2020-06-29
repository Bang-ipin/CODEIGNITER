var PanelDatatable = function () {
	
	var datatableProduk = function () {
		
		$("#listproduk").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+ 'admin/server_side/get_produk',
			  type:'POST',
			}
		});
	}
		
	var datatableArtikel = function () {

		$("#listartikel").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_blog',
			  type:'POST',
			}
		});
	}
		
	var datatableKategori = function () {

		$("#listkategori").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_kategori',
			  type:'POST',
			}
		});
	}
		
	var datatableTema = function () {

		$("#listtema").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_tema',
			  type:'POST',
			}
		});
	}
		
	var datatableShipping = function () {

		$("#listshipping").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_shipping',
			  type:'POST',
			}
		});
	}
		
	var datatableUser = function () {

		$("#listuser").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_user',
			  type:'POST',
			}
		});
	}
		
	var datatableMember = function () {

		$("#listmember").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_member',
			  type:'POST',
			}
		});
	}
		
	var datatableLevel = function () {

		$("#listlevel").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_level',
			  type:'POST',
			}
		});
	}
		
	var datatableSlider = function () {

		$("#listslider").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_slider',
			  type:'POST',
			}
		});
	}
	
	var datatableSliderProduk = function () {
			
		$("#listsliderproduk").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_shop_slider',
			  type:'POST',
			}
		});
	}
		
	var datatablePayment = function () {

		$("#listpayment").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_payment',
			  type:'POST',
			}
		});
	}
		
	var datatableAtribut = function () {

		$("#listatribut").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_atribut',
			  type:'POST',
			}
		});
	}
		
	var datatableKategoriProduk = function () {

		$("#listkategoriproduk").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_shop_kategori',
			  type:'POST',
			}
		});
	}
		
	var datatableMenu = function () {

		$("#listmenu").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_menu',
			  type:'POST',
			}
		});
	}
		
	var datatablePages = function () {

		$("#listpages").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: base_url+ 'admin/server_side/get_pages',
			  type:'POST',
			
			}
		});
	}
		
	var datatableProdusen = function () {

		$("#listprodusen").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_produsen',
			  type:'POST',
			}
		});
	}
		
	var datatableTags = function () {

		$("#listtag").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_tag',
			  type:'POST',
			}
		});
	}
	
	var datatableTagsProduk = function () {

		$("#listtagproduk").DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			ajax: {
			  url: site_url+'admin/server_side/get_tag_produk',
			  type:'POST',
			}
		});
	}
		
	/* 	//Datatable Slider
		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo 
				$this->security->get_csrf_hash(); ?>";
				
			grid.init({
				src: $("#listsliders"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_slider');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		//Datatable payment
		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#listpayments"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_payment');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		//Datatable Shipping
		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#listshippings"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { 

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_shipping');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 
		});

		//Datatable Produk Barang
		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#produks"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_produk');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});
			
		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#atributs"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_atribut');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#kategoris"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_kategori');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#listmenus"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_menu');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#produsens"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_produsen');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#usergroups"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_usergroup');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#listusers"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_user');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#listmembers"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_member');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		});

		$(document).ready(function(){
			var grid = new Datatable();
			var csrfData = {};
				csrfData["<?php echo $this->security->get_csrf_token_name(); ?>"] = "<?php echo
				$this->security->get_csrf_hash(); ?>";
			grid.init({
				src: $("#tagss"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error  
				},
				loadingMessage: 'Loading...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
					// So when dropdowns used the scrollable div should be removed. 
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

					"lengthMenu": [
						[10, 20, 50, 100, 150],
						[10, 20, 50, 100, 150] // change per page values here 
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url":"<?=site_url('admin/server_side/get_tag');?>", // ajax source
						"data":csrfData
					},
					"order": [
						[1, "asc"]
					] // set first column as a default sort by asc
				}
			});
			 // handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Please select an action',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					Metronic.alert({
						type: 'danger',
						icon: 'warning',
						message: 'No record selected',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		}); */
	
	return {

        init: function () {

			datatableArtikel();
			datatableAtribut();
			datatableKategori();
			datatableKategoriProduk();
			datatableLevel();
			datatableMember();
			datatableMenu();
			datatablePages();
			datatablePayment();
			datatableProduk();
			datatableProdusen();
			datatableShipping();
			datatableSlider();
			datatableSliderProduk();
			datatableTags();
			datatableTagsProduk();
			datatableTema();
			datatableUser();
			
        }

    };
		
}();


jQuery(document).ready(function() {    
	PanelDatatable.init(); // init metronic core componets
});
