<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testimoni_model extends CI_Model {
   
	public function get_all_data(){
		return $this->db->get("testimoni")
						->result_array();
	}
	
	function add($data){
		$this->db->insert("testimoni",$data);
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("testimoni",$data);
	}
	
	
	function hapus($id) {
		$this->db->where('id',$id);
		$this->db->delete('testimoni');
	}
	
	public function get_data_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('testimoni');
        return $query->result();
    }
}
