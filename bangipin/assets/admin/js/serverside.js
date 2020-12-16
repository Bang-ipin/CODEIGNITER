var PanelDatatable = function () {
	var base_url = 'https://bangipin.com/';
	
	var datatableIklan = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listiklan"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+ 'server_side/get_iklan',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	
	var datatableArtikel = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listartikel"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				"url": base_url+'server_side/get_blog',
				},
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableBerita = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listnews"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				"url": base_url+'server_side/get_berita',
				},
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableAgents = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listagents"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+ 'server_side/get_agents',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableDownloads = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listdownloads"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_download',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableFaq = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listfaq"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url +'server_side/get_faq',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	
	var datatableGalleri = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listgallery"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_gallery',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableKategori = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listkategori"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_kategori',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableLevel = function () {
		var grid = new Datatable();
		grid.init({
			src: $("#listlevel"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_level',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	
	var datatableMenu = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listmenu"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_menu',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatablePages = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#listpages"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_pages',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableSlider = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listslider"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+ 'server_side/get_slider',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableTag = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listtag"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_tag',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableTema = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listtema"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_tema',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableTestimoni = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listtestimoni"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_testimoni',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableUser = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listuser"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_user',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableModul = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listmodul"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_modul',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatableKategoriPekerjaan = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listkategoripekerjaan"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_jobs_category',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatablePekerjaan = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listpekerjaan"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_pekerjaan',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	var datatablePendidikan = function () {
		var grid = new Datatable();

		grid.init({
			src: $("#listpendidikan"),
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
					[10, 20, 50, 100, 150]  
				],
				"pageLength": 10, 
				"ajax": {
				  "url": base_url+'server_side/get_pendidikan',
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	}
	return {

        init: function () {

			datatableIklan();
			datatableArtikel();
			datatableBerita();
			datatableAgents();
			datatableDownloads();
			datatableFaq();
			datatableGalleri();
			datatableKategori();
			datatableLevel();
			datatableMenu();
			datatablePages();
			datatableSlider();
			datatableTag();
			datatableTema();
			datatableTestimoni();
			datatableUser();
			datatableModul();
			datatableKategoriPekerjaan();
			datatablePekerjaan();
			datatablePendidikan();
        }

    };
		
}();


jQuery(document).ready(function() {    
	PanelDatatable.init(); 
});
