<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kategori_model extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}
	public function get_all_kategori(){
		return $this->db->order_by('kode_kategori','asc')
					->get('master_kategori')
					->result();
	}
		
	
	function get_kategori_by_id($id){
		$this->db->where('kode_kategori',$id);
		$query=$this->db->get('master_kategori');
		return $query->result();
		}
	function tambah_kategori($data){
		$query=$this->db->insert('master_kategori',$data);
		return $query;
	}
	function update_kategori($id,$data){
	$this->db->where('kode_kategori',$id);
	$this->db->update('master_kategori',$data);
	}
	
    function delete_kategori($id){
        $this->db->where('kode_kategori',$id);
        $delete = $this->db->delete('master_kategori');
        return $delete;
    }
}
