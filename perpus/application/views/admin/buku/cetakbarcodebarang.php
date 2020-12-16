<?php inc_app('template','head_report');?>
	<center><h1><?php echo $judul;?></h1></center>
	<table width="100%" align="center" border="1" cellpadding="15" cellspacing="5">
		<?php 
			$text 				= "SELECT * FROM buku";
			$query				= $this->db->query($text);
				
			$data				= [];
			$i					= 1;
			$no					= 0;
			
			foreach ($query->result_array() as $row ){	
				if(($i-1) % 3 ==0){
					$no++;
				}
				$data[$no][]	= $row['kode_buku'];
					$i++;
				}
			foreach ($data as $rows): 
		?>
		<tr>
			<?php foreach ($rows as $item): ?>
				<td class="barcode" align="center">
					<img src="<?=site_url('admin/generate/'.$item.'');?>">
				</td>
			<?php endforeach;?>
		</tr>
		<?php endforeach;?>
	</table>
</body>
	