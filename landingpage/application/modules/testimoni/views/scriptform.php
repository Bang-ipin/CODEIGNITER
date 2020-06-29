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
			
			function responsive_filemanager_callback(field_id){
				console.log(field_id);
				var image= jQuery('#'+field_id).val();
				$('#previewimage').attr('src',image).width(200).height(150);
			}
			
			function clear_img(){
				var imagen= '<?=base_url();?>/files/images/no-image.jpg';
				$('#previewimage').attr('src',imagen);
				$('#none_img').val('');
			}
			
			function clear_editimg(){
				var imagen='<?php if (isset($image)){echo $image;}?>';
				$('#previewimage').attr('src',imagen);
				$('#none_img').val(imagen);
				
			}
		</script>