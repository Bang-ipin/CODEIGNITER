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
<table class="table table-striped table-bordered table-hover" id="listorderscancel">
	<thead>
		<tr role="row" class="heading">
			<th width="5%" >
				 No
			</th><th width="10%" >
				 Invoice
			</th>
			<th width="15%">
				 Tanggal
			</th>
			<th width="10%">
				 Nama
			</th>
			<th width="15%">
				 Total
			</th>
			<th width="15%">
				 Status
			</th>
			<th width="30%">
				 Actions
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
			foreach($dataorder as $order){
				date_default_timezone_set('Asia/Jakarta');
				$date=date('d F Y , H:i',strtotime($order['tgl_pesan']));
			?>
		<tr data-messageid ="<?=$order['id'];?>">
			<td>
				<?=$no++;?>
			</td>
			<td class="view-order">
					<?=$order['invoice'];?>
			</td>
			<td class="view-order text-right">
				<?=$date;?> WIB
			</td>
			<td class="view-order">
				<?=$order['nama_lengkap'];?>
			</td>
			<td class="view-order">
					 <?=convertrp($order['total_harga']);?>
			</td>
			<td class="view-order">
				<?php 
					if($order['status_pesanan']==0){
						$statusodr = "<span class='label label-info'>Pending</span>";
					}else if($order['status_pesanan']==1){
						$statusodr = "<span class='label label-success'>Sedang diproses</span>";
					}
					else{
						$statusodr = "<span class='label label-danger'>Cancel</span>";
					}
				?>
				<?=$statusodr;?>
			</td>
			<td class="text-right">
				<?php if ($order['status_pesanan']==1){ ?>
				<a href="<?=site_url().'appweb/orders/proccess/'.$order['id'].'/0';?>" class="btn btn-sm btn-success btn-editable"  title="On Proccess" >
					<i class="fa fa-check"></i> 
				</a>
				<?php }else{ ?>
				<a href="<?=site_url().'appweb/orders/proccess/'.$order['id'].'/1';?>" class="btn btn-sm btn-info btn-editable"  title="Pending" >
					<i class="fa fa-check"></i> 
				</a>
				<?php } ?>
				<a href="<?=site_url('appweb/orders/trash/'.$order['id'].'/2');?>" class="btn btn-sm btn-warning btn-editable" title="Cancel">
					<i class="fa fa-ban"></i> 
				</a>
				<a href="<?=site_url('appweb/order/hapus/'.$order['invoice']);?>" class="btn btn-sm btn-danger btn-editable"  title="Hapus" >
					<i class="fa fa-trash"></i> 
				</a>
				
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
	<script>
		$(document).ready(function() {
			var table = $('#listorderscancel');

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
