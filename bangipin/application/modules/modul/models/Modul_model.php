<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modul_model extends CI_Model {
   
	public function get_all_modul(){
		return $this->db->get("modul")
						->result_array();
	}
	
	function add($data){
		$this->db->insert("modul",$data);
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("modul",$data);
	}
	
	
	function hapus($id) {
		$this->db->where('id',$id);
		$this->db->delete('modul');
	}
	
	function dd_kategori(){
	$this->db->order_by('id','ASC');
	$query=$this->db->get('modul');
	if($query->num_rows()> 0){
		foreach($query->result() as $row){
			$dd[$row->id]= $row->nama;
			}
		}
		return $dd;
	}
}
