<script src="<?=base_url('assets/admin/js/datatable.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/datatables/datatables.min.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/admin/js/serverside.js');?>" type="text/javascript" ></script>
<script src="<?=base_url('assets/admin/js/komponen.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/admin/js/validateform.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/public/js/sweetalert.min.js');?>" type="text/javascript"></script>
        <script>
    	function hapusid(id) {
    			if(confirm('Apakah anda yakin mau menghapus data ini?')){
    				$.ajax({
    					type: 'POST',
    					url: "<?=site_url('appweb/level/hapus');?>",
    					data: 'id='+id,
    					success: function (data) {
    						console.log(data);
					        swal("Success!", "Data berhasil di hapus!", "success");
					        window.location.reload('<?php echo base_url('appweb/level');?>');
    					},
        					error:function(data){
        					swal("Oops...", "Something went wrong :(", "error");
        				}
    				});
    			}
    		};
    </script>
		