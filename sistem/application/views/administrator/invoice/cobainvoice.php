<script type="text/javascript">
    $(function() {
        $("#dataTable.detail tr:even").addClass("stripe1");
        $("#dataTable.detail tr:odd").addClass("stripe2");
        $("#dataTable.detail tr").hover(
            function() {
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });
</script>

<table id="dataTable" class="detail" width="100%">
<tr>
	<th>No</th>
    <th>Invoice</th>
    <th>Email</th>
    <th>Telepon</th>
    <th>Paket</th>
    <th>Pembayaran</th>
    <th>Nominal</th>
</tr>
@php
	if($data->count() > 0){
		foreach($data () as $db){  
			if (($db->paket)==1){
				$paket =" Paket Basic";
			}else
			if (($db->paket)==2){
				$paket ="Paket Premium";
			}
            else 
            if(($db->paket)==3){
				$paket = " Paket Pro";
			}
			else{
				$paket = "Paket Special";
			}
			if (($db->pembayaran)==1){
				$bayar =" Bank BCA";
			}else
			if (($db->pembayaran)==2){
				$bayar ="Paket BNI";
			}
			else if(($db->pembayaran)==3){
				$bayar = " Bank BRI";
			}
			else{
				$bayar = "Undefined";
			}
		@endphp 
    	<tr>
			<td align="center" width="20">{{ $loops->iteration }} </td>
            <td align="center" width="100" >{{ $db->kodeinvoice }}</td>
            <td align="center" width="100" >{{ $db->email }}</td>
            <td align="center" width="100" >{{ $db->telepon }}</td>
            <td align="center" width="100" >{{ $paket }}</td>
            <td align="center" width="100" >{{ $bayar }}</td>
            <td align="center" width="100" >{{ $db->nominal }}</td>
        </tr>
		@php }
	}else{
	@endphp
    	<tr>
        	<td colspan="5" align="center" >Tidak Ada Data</td>
        </tr>
    @php	
	}
@endphp
</table>