<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ulasan_model extends CI_Model {

	public function count_all_komentar(){
		$query=$this->db->get('ulasan')
						->num_rows();
		return $query;
	}
	
	function getUlasan(){
		
		return $this->db->where('status',0)
						->order_by('id','DESC')
						->get('ulasan')
						->result_array();
										
	}
	function getSentUlasan(){
		
		return $this->db->where('status',1)
						->order_by('tanggal','DESC')
						->get('ulasan')
						->result_array();
										
	}
	function getTrashUlasan(){
		
		return $this->db->where('status',3)
						->order_by('tanggal','DESC')
						->get('ulasan')
						->result_array();
										
	}
	public function getJudulProduk($id){

		$t = "SELECT * FROM produk WHERE id='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->produk;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}

	function viewUlasan($id){
	
	return $this->db->where('id',$id)
					->get('ulasan')
					->result_array();
										
	}
	
	function  total_pencarian($key) {
		$query = $this->db->get('ulasan');
		$this->db->or_like($key);
		return $query->num_rows();
	}
	
	public function CountUlasan(){

		$t = "SELECT count(*) as jml FROM ulasan";
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
	public function add_ulasan($data){
		return $this->db->insert('ulasan',$data);
	}
	
	function cek_ulasan($id){
		return $this->db->where('id', $id)
						->get('ulasan');
	}
	
	function hapus($id){
		$this->db->where('id',$id);
	    $this->db->delete('ulasan');
		
		$this->db->where('komentar_id',$id);
		$this->db->delete('ulasan');
					
	}
	function hapusulasanid($id){
		return $this->db->where('komentar_id',$id)
						->delete('ulasan');
	}
	function trash($id,$status){
		return $this->db->set('status', $status)
						->where('id',$id)
						->update('ulasan');
	}
}