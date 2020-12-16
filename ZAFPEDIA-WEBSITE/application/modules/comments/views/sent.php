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
<table id="sentkomentarall" class="table table-striped table-advance table-hover">
	<thead>
		<tr>
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
				Tanggal
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=0;
			foreach($datakomentar as $komentar){
				date_default_timezone_set('Asia/Jakarta');
				$date=date('d F Y , H:i',strtotime($komentar['tanggal']));
				if($komentar['dibaca']=='0'){
					$status="class='read'";
				}else{
					$status="";
				}
				
			?>
		<tr <?=$status;?> data-messageid ="<?=$komentar['id'];?>">
			<td class="view-message">
					<?=$komentar['username'];?>
			</td>
			<td class="view-message">
					 <?=$komentar['email'];?>
			</td>
			<td class="view-message">
					 <?=character_limiter($komentar['review'],30);?>
			</td>
			<td class="view-message text-right">
				<?=$date;?> WIB
			</td>
			<td class="text-right">
				<a href="<?=site_url('appweb/comments/hapus/'.$komentar['id']);?>" class="btn btn-sm btn-danger btn-editable">
				<i class="fa fa-trash"></i> </a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
	<script>
		$(document).ready(function() {
			var table = $('#sentkomentarall');

			table.dataTable({
			"language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
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

            "bStateSave": true, 
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
            "sorting": [
                [3, "DESC"]
            ]
        });   
    });
	</script>
