<script src="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')?>"></script>
<script>
    $(document).ready(function(){
		$('#destination').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
			var prov = $('#destination').val();

			$.ajax({
				type : 'GET',
				url : '<?=site_url('checkout/get_kabupaten');?>',
				data :  'prov_id=' + prov,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupatenkota").html(data);
				}
			});
		});
	});
	
	$("#berlaku").change(function()
	{
		var berlaku = $("#berlaku").val();
		var baru = $("#baru").val();
		var ulang= $("#ulang").val();
		$("#msgberlaku").html("<img src='<?=base_url();?>/files/images/load-indicator.gif'>");
		if(berlaku=='')
		{
		  $("#msgberlaku").html('<img src="<?=base_url();?>/files/images/invalid.gif" class="msgberlaku"><span class="teks">Password harus diisi</span>');
		  $("#berlaku").css('background', '#FFEBE8');
		}
		else
			$.ajax({
				type: "POST",
				url: "<?=site_url('account/cek_password');?>",
				data: "berlaku="+berlaku,
				success:function(data)
				{
				  if(data==0)
					{setTimeout(function(){
						$("#msgberlaku").html('<img src="<?=base_url();?>/files/images/invalid.gif" class="msgberlaku"><span class="teks">Password tidak cocok</span>');
						$("#berlaku").css('background', '#FFEBE8');
						},1000)
					}
					else
					{setTimeout(function(){
						$("#msgberlaku").html('<img src="<?=base_url();?>/files/images/valid.gif" class="benar"><span class="teksbenar"> Cocok </span>');
						$("#berlaku").css('background', 'white');
					},1000)
				}
			}
		});
	})

	$("#simpan").click(function()
		 {
			var berlaku = $("#berlaku").val();
			$("#berlaku").html("<img src='<?=base_url();?>/files/images/load-indicator.gif'> <span class='teks'>Cek password ...</span>");

			if(berlaku=='' || berlaku==null)
			{
			  $("#msgberlaku").html('<img src="<?=base_url();?>/files/images/invalid.gif" class="msgberlaku"><span class="teks">Password harus diisi</span>');
			  $("#berlaku").css('background', '#FFEBE8');
			  $("#berlaku").focus();
			return false;
		}

	})

	$("#formpass").validate({

			rules:{
					baru:{required: true, minlength: 5},
					ulang:{required: true, equalTo: "#baru"}
			},

		messages:{
				   baru:{required: 'Password harus diisi', minlength: 'Password minimal 5 karakter'},
				   ulang:{required: 'Tidak boleh kosong', equalTo: 'Isi harus sama dengan Password'}
			  },

		success:function(label)
		{
			setTimeout(function()
			{
				label.text('OK').addClass('valid');
			},360)
		}
	});	
</script>
