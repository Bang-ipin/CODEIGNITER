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
				$('#formadscustom').submit(function(e){
					e.preventDefault();
					$.ajax({
						url : $(this).attr('action'),
						type: "post",
						data : $(this).serialize(),
						error: function (xhr, ajaxOptions, thrownError) {
							return false;		  	
						},
						success:function(){
							 $("#formadscustom").each(function(){
								this.reset();
							});
							 
							$('#ads_nestable').load("<?=site_url('ads/advertising/tampiladsbottom');?>");
						}
					});
					
				});
			});
			
			function hapusadsid(id) {
				if(confirm('Apakah anda yakin mau menghapus data ini?')){
					$.ajax({
						type: 'POST',
						url: '<?=site_url('ads/advertising/hapusadsid');?>',
						data: 'id='+id,
						error: function (xhr, ajaxOptions, thrownError) {
							return false;		  	
						},
						success: function () {
							$('#ads_nestable').load("<?=site_url('ads/advertising/tampiladsbottom');?>");
						}
					});
				}
			};
			function responsive_filemanager_callback(field_id){
				console.log(field_id);
				var image= jQuery('#'+field_id).val();
				$('#previewimage').attr('src',image).width(200).height(150);
			}
			
			function clear_img(){
				var imagen= '<?=base_url();?>/files/images/no-image.jpg';
				$('#previewimage').attr('src',imagen);
				$('#image-ads-custom').val('');
			}
			
			function clear_editimg(){
				var imagen='<?php if (isset($image)){echo $image;}?>';
				$('#previewimage').attr('src',imagen);
				$('#image-ads-custom').val(imagen);
				
			}
			$(document).ready(function() {
				var table = $('#bottomiklanall');

				table.dataTable({
				"language": {
					/*"aria": {
						"sortAscending": ": activate to sort column ascending",
						"sortDescending": ": activate to sort column descending"
					},*/
					"emptyTable": "No data available in table",
					"info": "Showing _START_ to _END_ of _TOTAL_ records",
					"infoEmpty": "No records found",
					"infoFiltered": "(filtered1 from _MAX_ total records)",
					"lengthMenu": "Show _MENU_",
					"search": "Search:",
					"zeroRecords": "No matching records found",
					"paginate": {
						"previous":"Prev",
						"next": "Next",
						"last": "Last",
						"first": "First"
					}
				},

				"bStateSave": false, 
				"pagingType": "bootstrap_extended",

				"lengthMenu": [
					[10, 20, 50, -1],
					[10, 20, 50, "All"] 
				],
				"pageLength": 10,
				"columnDefs": [{  
				   'orderable': true,
				   'targets': [0]
				}, {
					"searchable": true,
					"targets": [0]
				}],
				/*"sorting": [
					[3, "DESC"]
				]*/
			});   
		});
		</script>