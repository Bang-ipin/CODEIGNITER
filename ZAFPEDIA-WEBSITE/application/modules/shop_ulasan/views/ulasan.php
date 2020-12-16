<link href="<?=base_url('assets/global/plugins/rateit/src/rateit.css');?>" rel="stylesheet" type="text/css"/>
<?php if($this->session->flashdata('SUCCESSMSG')) { ?>
<div role="alert" class="alert alert-success">
	<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
	<strong>Sukses!</strong>
	<?=$this->session->flashdata('SUCCESSMSG')?>
</div>
<?php } ?>
<?php if($this->session->flashdata('GAGALMSG')) { ?>
<div role="alert" class="alert alert-danger">
	<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
	<strong>Error!</strong>
	<?=$this->session->flashdata('GAGALMSG')?>
</div>
<?php } ?>
<table id="ulasanall" class="table table-striped table-advance table-hover">
	<thead>
		<tr>
			<th>
				No
			</th>
			<th>
				Name
			</th>
			<th>
				email
			</th>
			<th>
				Review
			</th>
			<th>
				Votes
			</th>
			<th>
				Waktu
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
			foreach($dataulasan as $ulsn){
				date_default_timezone_set('Asia/Jakarta');
				$date=date('d F Y , H:i',strtotime($ulsn['tanggal']));
				if($ulsn['dibaca']=='0'){
					$status="class='unread'";
				}else{
					$status="";
				}
				
			?>
		<tr <?=$status;?> data-messageid ="<?=$ulsn['id'];?>">
			<td>
				<?=$no++;?>
			</td>
			<td class="view-message">
					<?=$ulsn['username'];?>
			</td>
			<td class="view-message">
					 <?=$ulsn['email'];?>
			</td>
			<td class="view-message">
					 <?=character_limiter($ulsn['review'],30);?>
			</td>
			<td>
				<div class="rateit" data-rateit-value="<?=$ulsn['votes'];?>" data-rateit-ispreset="true" data-rateit-readonly="true">
				</div>

			</td>
			<td class="view-message text-right">
				<?=$date;?> WIB
			</td>
			<td class="text-right">
				<a href="<?=site_url('appweb/review-product/hapus/'.$ulsn['id']);?>" class="btn btn-sm btn-danger btn-editable"  title="Delete Permanent" >
					<i class="fa fa-trash"></i> 
				</a>
				<a href="<?=site_url('appweb/review-product/trash/'.$ulsn['id'].'/3');?>" class="btn btn-sm btn-warning btn-editable" title="Move to Trash">
					<i class="fa fa-ban"></i> 
				</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<script src="<?=base_url('assets/global/plugins/rateit/src/jquery.rateit.js')?>" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			var table = $('#ulasanall');

			table.dataTable({
			"language": {
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
           
        });   
    });
	</script>
		
