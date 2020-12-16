<?php inc_app('template','head_report');?>
   		<?php if(isset($dari)){
					$title= "<div> Data Pengunjung Perpustakaan dari tanggal ".$dari." sampai dengan tanggal ".$sampai." :</div></br>";
				}else{
					$title="<div> Data Seluruh Pengunjung Perpustakaan : </div>";
				}
			?>
			<center><h1><?= $title;?></h1></center><br/>
	<table id="table" class="table-bordered table-striped">
		<tr>
			<th width="5%">No</th>
			<th width="12%">NIS</th>
			<th width="11%">Nama Anggota</th>
			<th width="10%">Tgl Kunjungan</th>
		</tr>
		<?php
		$no=0;
		if(!empty($query)){
			foreach($query as $rows){
			?>
			<tr>
				<td align="center"><?php echo ++$no ?></td>
				<td align="center"><?php echo $rows->nis;?></td>
				<td align="center"><?php echo $rows->nama_anggota;?></td>
				<td align="center"><?php echo date("d M Y",strtotime($rows->tgl_kunjungan));?></td>
			</tr>
			<?php
			}
			}
			else
			{
			?>
			<tr>
				<td colspan="4" style="text-align: center; background: #49afcd"><strong>Tidak ada data</strong></td>
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