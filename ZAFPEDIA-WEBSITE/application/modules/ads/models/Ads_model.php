<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ads_model extends CI_Model {
  
	public function get_all_ads_parent(){
		return $this->db->order_by('id','asc')
					->get('iklan')
					->result_array();
	}
	public function get_all_iklan(){
		return $this->db->order_by('id_iklan','asc')
					->get('iklan_child')
					->result_array();
	}
	
	public function dd_parent(){
	$this->db->where('id_parent',0);
	$this->db->order_by('id_iklan');
	$query=$this->db->get('iklan_child');
	$dd['0']='Iklan&nbsp;Root';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_iklan]= $row->nama_iklan;
			}
		}
		return $dd;
	}
	
	function add($data){
		$query=$this->db->insert('iklan_child',$data);
		return $query;
	}
	
	function update($id,$data){
	$this->db->where('id_iklan',$id);
	$this->db->update('iklan_child',$data);
	}
	
	function hapus($id) {
		$this->db->where('id_iklan',$id);
		$this->db->delete('iklan_child');
	}
	
	function updateposisi($id) {
		$this->db->where('iklan_parent',$id);
		$this->db->set('iklan_parent',0);
		$this->db->update('iklan_child');
	}
	
	public function get_all_kategori_blog(){
		return $this->db->get("cms_category")
						->result_array();
	}
	public function get_all_kategori_produk(){
		return $this->db->where('parent_id',0)
						->where('status',1)
						->get("cms_shop_category")
						->result_array();
	}
	public function get_all_pages(){
		return $this->db->order_by('id','asc')
					->get('cms_pages')
					->result_array();
	}
}
