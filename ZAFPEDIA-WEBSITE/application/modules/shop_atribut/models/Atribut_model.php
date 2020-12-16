<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atribut_model extends CI_Model {
   
  public function get_all_atribut(){
		return $this->db->order_by('id_atribut','DESC')
					->get('atribut')
					->result_array();
	}
	
	function add_atribut($data){
		$query=$this->db->insert('atribut',$data);
		return $query;
	}
	
	function update_atribut($id,$data){
	$this->db->where('id_atribut',$id);
	$this->db->update('atribut',$data);
	}
	
	function hapus_atribut($id) {
		$this->db->where('id_atribut',$id);
		$this->db->delete('atribut');
	}
        
	function AtributStatus($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('id_atribut',$id);
		$query = $this->db->update('atribut');
	}

	function lihat_sub_atribut($id) {
		$this->db->where('parent_id',$id);
		$query = $this->db->get('atribut');
		return $query->result();
	}

}