<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member_model extends CI_Model {
   
	public function get_all_member(){
		return $this->db->order_by('customer_id','ASC')
					->get('customer')
					->result_array();
	}
	
	function get_member_by_id($id){
		$this->db->where('customer_id',$id);
		$query=$this->db->get('customer');
		return $query->result();
	}

	function delete($id) {
		$this->db->where('customer_id',$id);
		$this->db->delete('customer');
	}
	
	function MemberStatus($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('customer_id',$id);
		$query = $this->db->update('customer');
	}
}
