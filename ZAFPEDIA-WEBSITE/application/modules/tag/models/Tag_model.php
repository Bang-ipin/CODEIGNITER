<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tag_model extends CI_Model {
	
	public function get_all_tag(){
		return $this->db->order_by('id','DESC')
					->get('tags')
					->result_array();
	}
	
	function add($data){
		return $this->db->insert('tags',$data);
		
	}
	function update($id,$data){
	$this->db->where('id',$id);
	$this->db->update('tags',$data);
	}
	
    function hapus($id){
        $this->db->where('id',$id);
        $delete = $this->db->delete('tags');
        return $delete;
    }
	
}
   