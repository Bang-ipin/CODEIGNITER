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
<table id="komentarall" class="table table-striped table-advance table-hover">
	<thead>
		<tr>
			<th class="hidden-xs">
				No
			</th>
			<th>
				Name
			</th>
			<th class="hidden-xs">
				email
			</th>
			<th>
				Review
			</th>
			<th>
				Tanggal
			</th>
			<th>
				Action
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
			foreach($datakomentar as $komentar){
				date_default_timezone_set('Asia/Jakarta');
				$date=date('d F Y , H:i',strtotime($komentar['tanggal']));
				if($komentar['dibaca']=='0'){
					$status="class='unread'";
				}else{
					$status="";
				}
				
			?>
		<tr <?=$status;?> data-messageid ="<?=$komentar['id'];?>">
			<td class="hidden-xs">
				<?=$no++;?>
			</td>
			<td class="view-message">
					<?=$komentar['username'];?>
			</td>
			<td class="view-message hidden-xs">
					 <?=$komentar['email'];?>
			</td>
			<td class="view-message">
					 <?=character_limiter($komentar['review'],30);?>
			</td>
			<td class="view-message text-right">
				<?=$date;?> WIB
			</td>
			<td class="text-right">
				<?php if ($komentar['disetujui']==0){ ?>
				<a href="<?=site_url().'appweb/comments/approve/'.$komentar['id'].'/1';?>" class="btn btn-sm btn-primary btn-editable"  title="Approve" >
					<i class="fa fa-check"></i> 
				</a>
				<?php } ?>
				<a href="<?=site_url('appweb/comments/hapus/'.$komentar['id']);?>" class="btn btn-sm btn-danger btn-editable"  title="Delete Permanent" >
					<i class="fa fa-trash"></i> 
				</a>
				<a href="<?=site_url('appweb/comments/trash/'.$komentar['id'].'/3');?>" class="btn btn-sm btn-warning btn-editable" title="Move to Trash">
					<i class="fa fa-ban"></i> 
				</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
	<script>
		$(document).ready(function() {
			var table = $('#komentarall');

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
