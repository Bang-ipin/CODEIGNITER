<?php inc_app('template','head_report');?>
<?php//  include_once(APPPATH.'views/template/header_laporan.php');?>
   	<center><h3><?= $title;?></h3></center><br/>
		<?php if(isset($dari)){
					echo "<div> Data Pengunjung Perpustakaan dari tanggal ".$dari." sampai dengan tanggal ".$sampai." :</div></br>";
				}else{
					echo "<div> Data Seluruh Pengunjung Perpustakaan : </div>";
				}
			?>
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
				<td align="center"><?php echo $this->M_admin->tgl_indo($rows->tgl_kunjungan);?></td>
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
<?php inc_app('template','ttd');?>
