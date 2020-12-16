<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends CI_Model {
   
	public function get_all_data(){
		return $this->db->get("gallery")
						->result_array();
	}
	
	function add($data){
		$this->db->insert("gallery",$data);
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("gallery",$data);
	}
	
	
	function hapus($id) {
		$this->db->where('id',$id);
		$this->db->delete('gallery');
	}
	function dd_galeri(){
		$dd['0']= 'Foto';
		$dd['1']= 'Video';
		return $dd;
	}
	public function get_data_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('gallery');
        return $query->result();
    }
}
