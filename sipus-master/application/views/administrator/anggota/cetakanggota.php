<?php inc_app('template','head_report');?>
   	<center><h3><?= $judul;?></h3></center><br/>
		<?php 	echo "<div> Data Seluruh Pengunjung Perpustakaan : </div>";?>
	<table id="table" class="table-bordered table-striped">
		<tr>
			<th width="5%">No</th>
			<th width="12%">NIS</th>
			<th width="11%">Nama Anggota</th>
			<th width="10%">Jenis Kelamin</th>
			<th width="10%">Terdaftar</th>
		</tr>
		<?php
		$no=0;
		if(!empty($query)){
			foreach($query->result() as $rows){
				if($rows->jenis_kelamin==0){
						$sex="Laki-Laki";
					}
					else{
						$sex="Perempuan";
					}
			?>
			<tr>
				<td align="center"><?php echo ++$no ?></td>
				<td align="center"><?php echo $rows->nis;?></td>
				<td align="center"><?php echo $rows->nama_anggota;?></td>
				<td align="center"><?php echo $sex;?></td>
				<td align="center"><?php echo date("d M Y",strtotime($rows->tgl_daftar));?></td>
			</tr>
			<?php
			}
			}
			else
			{
			?>
			<tr>
				<td colspan="5" style="text-align: center; background: #49afcd"><strong>Tidak ada data</strong></td>
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
