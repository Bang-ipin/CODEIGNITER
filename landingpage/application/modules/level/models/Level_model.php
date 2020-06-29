<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Level_model extends CI_Model {
	
	public function get_all_level(){
		return 	$this->db->order_by('id_level','DESC')
						 ->get('level')
						 ->result_array();
	
	}

	public function add_level($data){
		$query= $this->db->insert('level', $data);
		return $query;
	}
	
	public function update_level($id, $data){
		$this->db->where('id_level', $id);
		$update=$this->db->update('level',$data);
		return $update;
	}
	
	public function delete_level($id){
		$this->db->where('id_level', $id);
		$query= $this->db->delete('level');
		return $query;
	}
	
	public function get_option(){
		$this->db->select('*');
		$this->db->from('level');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function dd_level(){
	$this->db->order_by('id_level');
	$query=$this->db->get('level');
	$dd['']='---Select level---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_level]= $row->level;
			}
		}
		return $dd;
	}
}