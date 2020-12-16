<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Tema_model extends CI_Model{ 
	
	function get_tema()
	{
		return $this->db->get('tema')
						->result_array();
	}
	
	function add_tema($data){
		$query=$this->db->insert('tema',$data);
		return $query;
	}
	
	function update_tema($id,$data){
	return $this->db->where('id',$id)
					->update('tema',$data);
	}
	
	function hapus_tema($id) {
		$this->db->where('id',$id);
		$this->db->delete('tema');
	}
	
	public function dd_tema(){
	$this->db->order_by('id');
	$query=$this->db->get('tema');
	$dd['0']='Pilih Tema';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->tema]= $row->tema;
			}
		}
		return $dd;
	}
	
	function update_background($id,$data){
	return $this->db->where('id_config',$id)
					->update('setting',$data);
	}
	
}