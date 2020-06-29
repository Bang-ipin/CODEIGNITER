<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config_model extends CI_Model{
	
	function Get_All(){
		$data = array();
		$this->db->order_by("id_config", "DESC");
		$this->db->select("id_config,nama,slogan,deskripsi_situs,meta_deskripsi,meta_keyword,telepon,alamat,email_website,pemilik,website,logo,favicon,facebook,twitter,instagram,linkedin,hak_cipta");
		$this->db->limit(1);
		$q = $this->db->get('setting');
		  if($q->num_rows() > 0)
		  {
		  	$data = $q->row_array();
		  }else{
			  $data = $q->free_result();
		  }
		$q->free_result();
		return $data;
	}
	
	function add($data){
		$this->db->insert("setting",$data);
	}
	
	function update($id,$data){
		$this->db->where("id_config",$id);
		$this->db->update("setting",$data);
	}
	
	function kode_otomatis()
    {
        $q = $this->db->query("select MAX(RIGHT(id_config,1)) as kode_max from setting");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kode_max)+1;
                $kd = sprintf("%01s", $tmp);
            }
        }
        else
        {
            $kd = "1";
        }
		return $kd;
		
    }
	
}
