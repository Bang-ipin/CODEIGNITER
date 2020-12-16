<?php 
$adslib = new ads_lib();
?>
<table id="bottomiklanall" class="table table-striped table-advance table-hover">
	<thead>
		<tr>
			<th>
				No
			</th>
			<th>
				Nama
			</th>
			<th>
				Image
			</th>
			<th>
				Url
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query= $adslib->getBottomIklan();
		$no=1;
		foreach ($query->result_array() as $iklan) : 
		if(!empty($iklan['image'])){
				$gambar = "<a href=".$iklan['image']." class='fancy-view'>
						   <img src=".$iklan['image']." alt='' border='0' style='height:100px;width:150px;' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('files/images/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('files/images/no-image.jpg')." class='img-responsive' style='height:100px;width:150px;' alt='' border='0'>";
			}
		?>
	<tr>
		<td>
			<?=$no++?>
		</td>
		<td>
			<?=$iklan['nama_iklan'];?>
		</td>
		<td>
			<?=$gambar;?>
		</td>
		<td>
			<?=$iklan['url'];?>
		</td>
		<td class="text-right">
			<a href="javascript:void(0)" onclick="hapusadsid('<?=$iklan['id_iklan'];?>');" class="btn btn-sm btn-danger btn-editable"><i class="fa fa-trash"></i> </a>
		</td>
	</tr>
	<?php endforeach ?>
	</tbody>
</table>
