<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shipping_model extends CI_Model { 
	
	public function get_all_shipping(){
		return $this->db->order_by('id','ASC')
						->get('ekspedisi')
						->result_array();
	}
	public function get_shipping_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('ekspedisi');
        return $query->result();
    }
	function add_shipping($data){
		$query=$this->db->insert('ekspedisi',$data);
		return $query;
	}
	
	function update_shipping($id,$data){
	$this->db->where('id',$id);
	$this->db->update('ekspedisi',$data);
	}
	
	function hapus_shipping($id) {
		$this->db->where('id',$id);
		$this->db->delete('ekspedisi');
	}
	
	function ShippingStatus($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('id',$id);
		$query = $this->db->update('ekspedisi');
	}
	
}