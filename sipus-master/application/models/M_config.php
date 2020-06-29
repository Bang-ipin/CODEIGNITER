<?php
class M_config extends CI_Model
{
	
	function Get_All()
	{
		$data = array();
		$this->db->order_by("id_config", "DESC");
		$this->db->select("id_config, name, depan, belakang,pemilik, alamat, telp, Email, website, komentar");
		$this->db->limit(1);
		$q = $this->db->get('config');
		  if($q->num_rows() > 0)
		  {
		  	$data = $q->row_array();
		  }
		$q->free_result();
		return $data;
	}
	
	function Update()
	{
		$data = array(
			'name' => strtoupper($this->input->post('name')),
			'depan' => strtoupper($this->input->post('first')),
			'belakang' => strtoupper($this->input->post('last')),
			'pemilik' => strtoupper($this->input->post('pemilik')),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'Email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
			'komentar' => $this->input->post('komentar')
		);
		$this->db->where('id_config', $this->input->post('id'));
		$this->db->update('config', $data);
		
		$data = array(
					'name_toko' => strtoupper($this->input->post('name')),
				);
		$this->session->set_userdata($data);
	}
}
?>