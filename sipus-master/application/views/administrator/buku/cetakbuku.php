<?php inc_app('template','head_report');?>
   	<center><h3><?= $judul;?></h3></center><br/>
		<?php 	echo "<div> Data Seluruh Buku di Perpustakaan : </div>";?>
	<table id="table" class="table-bordered table-striped">
		<tr>
			<th >No</th>
			<th >Kode Buku</th>
			<th >Kategori</th>
			<th >Judul Buku</th>
			<th >Nama Pengarang</th>
			<th >Penerbit</th>
			<th >Tahun terbit</th>
			<th >Lokasi Buku</th>
			
		</tr>
		<?php
		$no=0;
		if(!empty($query)){
			foreach($query->result() as $rows){
				if($rows->status_buku==0){
						$stt="Dipinjam";
					}
					else{
						$stt="Tersedia";
					}
			?>
			<tr>
				<td align="center"><?php echo ++$no ?></td>
				<td align="center"><?php echo $rows->kode_buku;?></td>
				<td align="center"><?php echo $rows->nama_kategori;?></td>
				<td align="center"><?php echo $rows->judul_buku;?></td>
				<td align="center"><?php echo $rows->nama_pengarang;?></td>
				<td align="center"><?php echo $rows->penerbit;?></td>
				<td align="center"><?php echo $rows->tahun_terbit;?></td>
				<td align="center"><?php echo $rows->nama_rak;?></td>
			</tr>
			<?php
			}
			}
			else
			{
			?>
			<tr>
				<td colspan="9" style="text-align: center; background: #49afcd"><strong>Tidak ada data</strong></td>
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
