<script src="<?=base_url('assets/plugins/select2/js/select2.min.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/jquery.validate.min.js');?>" type="text/javascript"  ></script>
<script src="<?=base_url('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js');?>" type="text/javascript"  ></script>
<script src="<?=base_url('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/admin/js/komponen.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/admin/js/validateform.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/admin/js/tinymce.js');?>" type="text/javascript"></script>
<script>
	$("#galeri").change(function() { 

		if ( $(this).val() == "0") {

			$("#galfoto").show();
			$("#galvideo").hide();

		}
		else
		if ( $(this).val() == "1") {

			$("#galvideo").show();
			$("#galfoto").hide();
		}

		else{

			$("#galvideo").hide();

		}

	});
</script>
