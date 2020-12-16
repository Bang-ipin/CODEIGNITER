<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About_model extends CI_Model{
	
	function Get_Data(){
		$data = array();
		$this->db->order_by("id_about", "DESC");
		$this->db->select("id_about,deskripsi1,deskripsi2,gambar,judul1,judul2,judul3,text1,text2,text3");
		$this->db->limit(1);
		$q = $this->db->get('about');
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
		$this->db->insert("about",$data);
	}
	
	function update($id,$data){
		$this->db->where("id_about",$id);
		$this->db->update("about",$data);
	}
	
	function kode_otomatis()
    {
        $q = $this->db->query("select MAX(RIGHT(id_about,1)) as kode_max from about");
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
