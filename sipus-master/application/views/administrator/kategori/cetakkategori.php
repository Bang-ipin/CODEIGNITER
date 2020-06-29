<?php inc_app('template','head_report');?>
   	<center><h3><?= $judul;?></h3></center><br/>
		<?php 	echo "<div> Data Seluruh Kategori Buku : </div>";?>
	<table id="table" class="table-bordered table-striped">
		<tr>
			<th width="5%">No</th>
			<th width="11%">Nama Kategori</th>
		</tr>
		<?php
		$no=0;
		if(!empty($query)){
			foreach($query->result() as $rows){
			?>
			<tr>
				<td align="center"><?php echo ++$no ?></td>
				<td align="center"><?php echo $rows->nama_kategori;?></td>
			</tr>
			<?php
			}
			}
			else
			{
			?>
			<tr>
				<td colspan="2" style="text-align: center; background: #49afcd"><strong>Tidak ada data</strong></td>
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
