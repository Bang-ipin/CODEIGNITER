<?php inc_app('template','head_report');?>
<?php//  include_once(APPPATH.'views/template/header_laporan.php');?>
   	<center><h3><?= $title;?></h3></center><br/>
		<?php if(isset($dari)){
					echo "<div> Data Peminjaman Buku Perpustakaan dari tanggal ".$dari." sampai dengan tanggal ".$sampai." :</div></br>";
				}else{
					echo "<div> Data Seluruh Peminjaman Buku Perpustakaan : </div>";
				}
			?>
	<table id="table" class="table-bordered table-striped">
		<tr>
			<th>No</th>
			<th>Kode Pinjam</th>
			<th>Nama</th>
			<th>NIS</th>
			<th>Kode Buku</th>
			<th>Judul</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tgl Pinjam</th>
			<th>Tgl Kembali</th>
			<th>Denda</th>
		</tr>
		<?php
		$no=0;
		if(!empty($query)){
			foreach($query as $rows){
				$tglpinjam 		= $rows->tanggal_pinjam;
				$tempo 			= $this->M_administrator->CariTempo($rows->kode_pinjam);
				$nominaldenda 	= $this->M_administrator->CariDenda($rows->id_denda);
				$tglkembali 	= $rows->tgl_kembali;
				$carihari 		= abs(strtotime($tglpinjam)- strtotime($tglkembali));
				$hitung_hari	= floor($carihari/(60*60*24));
				if($hitung_hari > $tempo){
					$telat		= $hitung_hari - $tempo;
					$denda		= $nominaldenda * $telat;
				}else{
					$telat		= 0;
					$denda		= 0;
				}
				
			?>
		<tr>
			<td align="center"><?php echo ++$no ?></td>
			<td align="center"><?php echo $rows->kode_pinjam;?></td>
			<td align="center"><?php echo $rows->nama_anggota;?></td>
			<td align="center"><?php echo $rows->nis;?></td>
			<td align="center"><?php echo $rows->kode_buku;?></td>
			<td align="center"><?php echo $rows->judul_buku;?></td>
			<td align="center"><?php echo $rows->nama_pengarang;?></td>
			<td align="center"><?php echo $rows->penerbit;?></td>
			<td align="center"><?php echo $this->M_administrator->tgl_str($rows->tanggal_pinjam);?></td>
			<td align="center"><?php echo $this->M_administrator->tgl_str($rows->tgl_kembali);?></td>
			<td align="center">Rp <?php echo number_format($denda);?></td>
		</tr>
		<?php
			}
		}else{
		?>
		<tr>
			<td colspan="12" style="text-align: center; background: #49afcd"><strong>Tidak ada data</strong></td>
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