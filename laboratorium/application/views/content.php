<p>Hai, Selamat datang <b><?php echo $this->session->userdata('nama_lengkap');?></b> di Manajeman <b><?php echo $nama_program;?></b></p>
<br />
<?php 
if($this->session->userdata('level')=='01'){
?>
<table class="list" width="100%">
	<thead>
    <td class="btn" colspan="6" style="color:#fff;"><center><b>CONTROL PANEL</b></center></td>
    </thead>
    <tr>
    	<td class="btn" align="center" width="20%"><a href="<?php echo base_url();?>index.php/pengguna"><img src="<?php echo base_url();?>asset/images/admin_.png" /><br />
        <b>Data Operator</b></a>
        </td>
        <td align="center" width="20%"><a href="<?php echo base_url();?>index.php/pasien"><img src="<?php echo base_url();?>asset/images/lelang.png" /><br />
        <b>Pasien</b></a>
        </td>
        <td  class="btn" align="center" width="20%"><a href="<?php echo base_url();?>index.php/booking"><img src="<?php echo base_url();?>asset/images/surat_keputusan.png" /><br />
        <b>Pemeriksaan</b></a>
        </td>
	</tr>       
</table> 
<?php } ?>