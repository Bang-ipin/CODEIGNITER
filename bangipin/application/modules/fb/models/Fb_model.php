<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Fb_model extends CI_Model{
	
	function Get_fanpage(){
		$data = array();
		$this->db->order_by("id", "DESC");
		$this->db->select("id,application_id,url,width,height,show_face,show_status,show_header_fb");
		$this->db->limit(1);
		$q = $this->db->get('like_box_fb');
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
		$this->db->insert("like_box_fb",$data);
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("like_box_fb",$data);
	}
	function kode_otomatis()
    {
        $q = $this->db->query("select MAX(RIGHT(id,1)) as kode_max from like_box_fb");
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