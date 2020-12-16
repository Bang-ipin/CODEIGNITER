<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_model extends CI_Model {
	
	public function get_all_orders(){
		return 	$this->db->get('pesanan')
						 ->result_array();
	
	}
	public function getOrderPending(){
		return 	$this->db->where('status_pesanan',0)
						 ->get('pesanan')
						 ->result_array();
	
	}
	public function getOrderComplete(){
		return 	$this->db->where('status_pembayaran',2)
						 ->where('status_pesanan',1)
						 ->get('pesanan')
						 ->result_array();
	
	}
	public function getOrderCancel(){
		return 	$this->db->where('status_pesanan',2)
						 ->get('pesanan')
						 ->result_array();
	
	}
	
	function detailOrder($id){
		return $this->db->join('detail_pesanan b','a.invoice = b.invoice')
					->where('id',$id)
					->get('pesanan a')
					->row_array();
										
	}
	function viewOrder($id){
		return $this->db->join('detail_pesanan b','a.invoice = b.invoice')
					->where('id',$id)
					->get('pesanan a')
					->result_array();
										
	}
	function hapus($id){
        $this->db->where('id',$id);
        $delete = $this->db->delete('pesanan');
        return $delete;
    }
	
	function status($id,$status) {
		$this->db->set('status_pesanan', $status);
		$this->db->set('status_pembayaran',2);
		$this->db->where('id',$id);
		$query = $this->db->update('pesanan');
	}
	function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
	 
	public function getSelectedData($table,$id)
    {
        return $this->db->get_where($table, $id);
    }
        
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
}