<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Download_model extends CI_Model {
   
	public function get_all_data(){
		return $this->db->get("download")
						->result_array();
	}
	
	function add($data){
		$this->db->insert("download",$data);
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("download",$data);
	}
	
	
	function hapus($id) {
		$this->db->where('id',$id);
		$this->db->delete('download');
	}
	
	function status($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('id',$id);
		$query = $this->db->update('download');
	}
	public function get_data_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('download');
        return $query->result();
    }
}
