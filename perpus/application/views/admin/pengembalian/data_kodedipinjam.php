<script type="text/javascript">
	$(function() {
		$("#dataTable.details tr:even").addClass("stripe1");
		$("#dataTable.details tr:odd").addClass("stripe2");
		$("#dataTable.details tr").hover(
			function() {
				$(this).toggleClass("highlight");
			},
			function() {
				$(this).toggleClass("highlight");
			}
		);
	});
	function pilihkode(id){
		$("#dlgpinjam").dialog('close');
		$("#kodepinjam").val(id);
		$("#kode_buku").focus();
		CariKodePinjaman(id)
	}
	
	function CariKodePinjaman(id){
		//var kode = $("#kodepinjam").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/infokodepinjaman'); ?>",
			data	: "kode="+id,
			cache	: false,
			dataType : "json",
			success	: function(data){
				$("#kodepinjam").val(data.kodepinjam);
				$("#nis").val(data.nis);
				$("#siswa").val(data.siswa);
			}
		});
	};
</script>
<table id="dataTable" class="details" width="100%">
<tr>
	<th>No</th>
    <th>Kode Pinjaman</th>
    <th>NIS</th>
	<th>Nama Siswa</th>
    <th>Ambil</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1;
		foreach($data->result_array() as $db){  
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="100" ><?php echo $db['kode_pinjam']; ?></td>
            <td align="center" width="100" ><?php echo $db['nis']; ?></td>
			<td align="center" width="100" ><?php echo $db['nama_anggota']; ?></td>
            <td align="center" width="80">
            <a href="javascript:pilihkode('<?php echo $db['kode_pinjam'];?>')" >
        	<img src="<?php echo base_url();?>asset/image/add.png" title='Ambil'>
        	</a>
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="4" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>