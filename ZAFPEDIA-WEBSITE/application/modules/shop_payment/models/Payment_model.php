<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment_model extends CI_Model {
	
	public function get_all_payment(){
		return $this->db->order_by('id','ASC')
					->get('metode_pembayaran')
					->result_array();
	}
	function add_payment($data){
		$query=$this->db->insert('metode_pembayaran',$data);
		return $query;
	}
	
	function update_payment($id,$data){
	$this->db->where('id',$id);
	$this->db->update('metode_pembayaran',$data);
	}
	
	function hapus_payment($id) {
		$this->db->where('id',$id);
		$this->db->delete('metode_pembayaran');
	}
	
	function PaymentStatus($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('id',$id);
		$query = $this->db->update('metode_pembayaran');
	}

}