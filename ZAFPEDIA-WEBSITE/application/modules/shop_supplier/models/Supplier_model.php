<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Supplier_model extends CI_Model { 
	
	public function get_all_produsen(){
	return $this->db->order_by('id','asc')
					->get('supplier')
					->result_array();
	}
	public function get_supplier_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('supplier');
        return $query->result();
    }
	function add_produsen($data){
		$query=$this->db->insert('supplier',$data);
		return $query;
	}
	function update_produsen($id,$data){
	$this->db->where('id',$id);
	$this->db->update('supplier',$data);
	}
	
    function hapus_produsen($id){
        $this->db->where('id',$id);
        $delete = $this->db->delete('supplier');
        return $delete;
    }
	
}