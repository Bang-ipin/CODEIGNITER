<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categoryjobs_model extends CI_Model { 

	public function get_all_kategori(){
		return $this->db->get("kategori_pekerjaan")
						->result_array();
	}
	
	function add_kategori($data){
		$this->db->insert("kategori_pekerjaan",$data);
	}
	
	function update_kategori($id,$data){
		$this->db->where("kode_kategori",$id);
		$this->db->update("kategori_pekerjaan",$data);
	}
	
	
	function hapus_kategori($id) {
		$this->db->where('kode_kategori',$id);
		$this->db->delete('kategori_pekerjaan');
	}
	
	function status_kategori($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('kode_kategori',$id);
		$query = $this->db->update('kategori_pekerjaan');
	}
	
	function lihat_sub_category($id) {
        $this->db->where('parent_id',$id);
        $query = $this->db->get('kategori_pekerjaan');
        return $query->result();
    }
	
}