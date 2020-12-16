
<script>
    $(document).ready(function(){
				$('#destinasi').change(function(){

					//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
					var prov = $('#destinasi').val();

					$.ajax({
						type : 'GET',
						url : '<?=site_url('checkout/get_kabupaten');?>',
						data :  'prov_id=' + prov,
							success: function (data) {

							//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
							$("#kabupaten").html(data);
						}
					});
				});
				
				$('input[name=kurir]').change(function(){
					var origin = $('#origin').val();
					var provinsi = $('#destinasi').val();
					var kab = $('#kabupaten').val();
					var kurir = $("input[name='kurir']:checked").val();
					var berat = $('#berat').val();
					$.ajax({
						type : 'POST',
						dataType : 'html',
						url : '<?=site_url('checkout/insert_ongkir')?>',
						data :  {'origin' : origin, 'kab_id' : kab, 'kurir' : kurir, 'berat' : berat},
							success: function (data) {

							//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
							$("#ongkos").show();
							$("#ongkos").html(data);
						}
					});
				});
				
			});
</script>
		