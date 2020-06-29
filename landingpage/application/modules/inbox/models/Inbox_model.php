<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox_model extends CI_Model {

	public function count_all_inbox(){
		$query=$this->db->get('kontak')
						->num_rows();
		return $query;
	}
	
	function getInbox(){
		
		return $this->db->order_by('id','DESC')
						->get('kontak')
						->result_array();
										
	}
	function getInboxs($limit=null,$offset=null,$key=null){
		
		$this->db->select('*');
		$this->db->from('kontak');
		$this->db->order_by('id','ASC');
		if($limit !=null){
			$this->db->limit($limit,$offset);
		}
		
		if ($key !=null){
			$this->db->or_like($key);
		}
		
		$query=$this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		else{
			return NULL;
		}						
										
	}
	
	function viewInbox($id){
	
	return $this->db->where('id',$id)
					->get('kontak')
					->result_array();
										
	}
	
	function  total_pencarian($key) {
		$query = $this->db->get('kontak');
		$this->db->or_like($key);
		return $query->num_rows();
	}
	
	public function CountMessage(){

		$t = "SELECT count(*) as jml FROM kontak WHERE status=0";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r > 0){
			foreach($d->result() as $h){
				$hasil = $h->jml;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function add_inbox($data){
		return $this->db->insert('kontak',$data);
	}
	
	function cek_inbox($email,$pesan){
		return $this->db->where('pesan',$pesan)
						->where('email', $email)
						->get('kontak');
	}
	function hapus($id){
		return $this->db->where('id',$id)
						->delete('kontak');
	}
}