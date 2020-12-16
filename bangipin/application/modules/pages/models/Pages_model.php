<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages_model extends CI_Model {
   
   public function get_all_pages(){
		return $this->db->order_by('id','asc')
					->get('laman')
					->result_array();
	}
	
	public function get_parent_pages(){
		return $this->db->where('id_parent',0)
						->order_by('id','asc')
						->get('laman')
						->result_array();
	}
	
	function dd_type(){
	$dd['0']= 'Primary';
	$dd['1']= 'Secondary';
	return $dd;
	}
	
	function dd_layout(){
	$dd['page_with_sidebar']	= 'Page With Sidebar';
	$dd['fullwidth']			= 'Full Width';
	return $dd;
	}
	
	public function dd_parent(){
	$this->db->where('id_parent',0);
	$this->db->order_by('id');
	$query=$this->db->get('laman');
	$dd['0']='Menu&nbsp;Root';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id]= $row->nama_laman;
			}
		}
		return $dd;
	}
	
	function add($data){
		$query=$this->db->insert('laman',$data);
		return $query;
	}
	
	function update($id,$data){
	$this->db->where('id',$id);
	$this->db->update('laman',$data);
	}
	
	function hapus($id) {
		$this->db->where('id',$id);
		$this->db->delete('laman');
	}
	
}
