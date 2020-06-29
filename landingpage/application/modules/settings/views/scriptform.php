<script src="<?=base_url('asset/admin/pages/scripts/komponen.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('asset/admin/pages/scripts/validateform.js');?>" type="text/javascript"></script>
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
		</script>