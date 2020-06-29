<script>
function jam(){
				var waktu = new Date();
				var jam = waktu.getHours();
				var menit = waktu.getMinutes();
				var detik = waktu.getSeconds();
				 
				if (jam < 10){ jam = "0" + jam; }
				if (menit < 10){ menit = "0" + menit; }
				if (detik < 10){ detik = "0" + detik; }
				var jam_div = document.getElementById('jam');
				jam_div.innerHTML = jam + ":" + menit + ":" + detik;
				setTimeout("jam()", 1000);
			} jam();
			
$(document).ready(function(){
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
			  "url": "<?=site_url('server_side/get_user');?>",
			 },
			"order": [
				[1, "asc"]
			] 
		}  
	});
});
</script>