<?php inc_app('template','head_report');?>
		<?php if(isset($dari)){
					$title = "<div> Data Pemesanan Buku Perpustakaan dari tanggal ".$dari." sampai dengan tanggal ".$sampai." :</div></br>";
				}else{
					$title = "<div> Data Seluruh Pemesanan Buku Perpustakaan : </div>";
				}
			?>
   		<center><h1><?= $title;?></h1></center><br/>
	<table id="table" class="table-bordered table-striped">
		<tr>
			<th>No</th>
			<th>Kode Pemesanan</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>Judul Buku</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Keterangan</th>
		</tr>
		<?php
		$no=1;
		if(!empty($query)){
			foreach($query as $rows){
				if ($rows->status_booking ==1){
				$stt="<label class='label label-success'>Dalam Proses</label>";
				}
				else if($rows->status_booking==2){
				$stt="<label class='label label-danger'>Di Tolak</label>";	
				}
				else{
					$stt="<label class='label label-info'>Sudah Tersedia</label>";	
				}
			?>
		<tr>
			<td align="center"><?php echo $no++;?></td>
			<td align="center"><?php echo $rows->kode_booking;?></td>
			<td align="center"><?php echo $rows->nis;?></td>
			<td><?php echo $rows->nama;?></td>
			<td align="center"><?php echo $rows->judul_buku;?></td>
			<td align="center"><?php echo $rows->pengarang;?></td>
			<td align="center"><?php echo $rows->penerbit;?></td>
			<td align="center"><?php echo $this->M_administrator->tgl_indo($rows->tgl_pesan);?></td>
			<td align="center"><?php echo $stt;?></td>
			<td align="center"><?php echo $rows->keterangan;?></td>	
		</tr>
		<?php
			}
		}else{
		?>
		<tr>
			<td colspan="10" style="text-align: center; background: #49afcd"><strong>Tidak ada data</strong></td>
		</tr>
		<?php
		}
		?>
	</table>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<table width="100%" border="0">
				 <tr>
					<td width="56%">&nbsp;</td>
					<td width="44%">
						 <center> 
							Yogyakarta <?=converttgl(date("Y-m-d"));?><br />    
							<p>Kepala Perpustakaan SMK PIRI Sleman</p><br />
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							( <?=strtoupper($kepalaperpus);?> )	
						</center>
					</td>
				  </tr>
			</table>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
	</body>
</html>
