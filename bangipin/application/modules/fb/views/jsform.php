<script src="<?=base_url('assets/plugins/select2/js/select2.min.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/jquery.validate.min.js');?>" type="text/javascript"  ></script>
<script src="<?=base_url('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js');?>" type="text/javascript"  ></script>
<script src="<?=base_url('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/admin/js/komponen.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/admin/js/validateform.js');?>" type="text/javascript"></script>
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