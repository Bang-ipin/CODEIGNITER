<script src="<?=base_url('assets/plugins/jquery-nestable/jquery.nestable.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/admin/js/ui-nestable.js');?>" type="text/javascript" ></script>
<script>
	function hapusmenuid(id) {
			if(confirm('Apakah anda yakin mau menghapus data ini?')){
				$.ajax({
					type: 'POST',
					url: "<?=site_url('menu/hapusmenuid');?>",
					data: 'id='+id,
					error: function (xhr, ajaxOptions, thrownError) {
						return false;		  	
					},
					success: function () {
						$('#menu_nestable').load("<?=site_url('menu/tampilprimarymenu');?>");
					}
				});
			}
		};
</script>