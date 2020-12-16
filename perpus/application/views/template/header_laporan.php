<div class="container">
	<div class="row-fluid">
		<div class="span12">
			<table width="100%" border="0" class="mytable">
				<tr>
					<!--<td width="11%" height="162" align="center"><!--<img src="<?=config_item('asset');?>/image/favicon.png" /></td>-->
					<td width="77%" align="center"><h2> <?php echo $this->session->userdata('name')?></h2>
						<p align="center">Alamat : <?php echo $this->session->userdata('alamat')?></p>
						<p align="center">Email : <?php echo $this->session->userdata('email')?></p>
						<p align="center">Web : <?php echo $this->session->userdata('website')?></p>
						<p align="center">Telp : <?php echo $this->session->userdata('telp')?></p>
						<p align="center"><strong>===========================================================================</strong></p></td>
					<!--<td width="12%" align="center"><img src="<?=config_item('asset');?>/image/favicon.png"/></td>-->
				</tr>
			</table>
		</div>
	</div>