<script>
	
	$(document).ready(function(){
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
				  "url": "<?=site_url('server_side/get_kategori');?>",
				 },
				"order": [
					[1, "asc"]
				] 
			}  
		});
	});
</script>