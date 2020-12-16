<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categoryproduk_model extends CI_Model { 

	public function get_all_kategori(){
		return $this->db->get("kategori_produk")
						->result_array();
	}
	
	function add_kategori($data){
		$this->db->insert("kategori_produk",$data);
	}
	
	function update_kategori($id,$data){
		$this->db->where("kode_kategori",$id);
		$this->db->update("kategori_produk",$data);
	}
	
	
	function hapus_kategori($id) {
		$this->db->where('kode_kategori',$id);
		$this->db->delete('kategori_produk');
	}
	
	function status_kategori($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('kode_kategori',$id);
		$query = $this->db->update('kategori_produk');
	}
	
	function lihat_sub_category($id) {
        $this->db->where('parent_id',$id);
        $query = $this->db->get('kategori_produk');
        return $query->result();
    }
}