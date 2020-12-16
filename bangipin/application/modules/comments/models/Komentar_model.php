<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentar_model extends CI_Model {

	public function count_all_komentar(){
		$query=$this->db->get('komentar')
						->num_rows();
		return $query;
	}
	
	function getKomentar(){
		
		return $this->db->where('status',0)
						->order_by('id','DESC')
						->get('komentar')
						->result_array();
										
	}
	function getSentKomentar(){
		
		return $this->db->where('status',1)
						->order_by('tanggal','DESC')
						->get('komentar')
						->result_array();
										
	}
	function getTrashKomentar(){
		
		return $this->db->where('status',3)
						->order_by('tanggal','DESC')
						->get('komentar')
						->result_array();
										
	}
	public function getJudulBlog($id){

		$t = "SELECT * FROM blog WHERE id='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->judul_blog;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}

	function viewKomentar($id){
	
	return $this->db->where('id',$id)
					->get('komentar')
					->result_array();
										
	}
	
	function  total_pencarian($key) {
		$query = $this->db->get('komentar');
		$this->db->or_like($key);
		return $query->num_rows();
	}
	
	public function CountKomentar(){

		$t = "SELECT count(*) as jml FROM komentar";
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
	public function add_komentar($data){
		return $this->db->insert('komentar',$data);
	}
	
	function cek_komentar($id){
		return $this->db->where('id', $id)
						->get('komentar');
	}
	
	function hapus($id){
		$this->db->where('id',$id);
	    $this->db->delete('komentar');
		
		$this->db->where('komentar_id',$id);
		$this->db->delete('komentar');
					
	}
	function hapuskomenid($id){
		return $this->db->where('komentar_id',$id)
						->delete('komentar');
	}
	function trash($id,$status){
		return $this->db->set('status', $status)
						->where('id',$id)
						->update('komentar');
	}
	function approve($id,$status) {
		$this->db->set('disetujui', $status);
		$this->db->where('id',$id);
		$query = $this->db->update('komentar');
	}
	
}