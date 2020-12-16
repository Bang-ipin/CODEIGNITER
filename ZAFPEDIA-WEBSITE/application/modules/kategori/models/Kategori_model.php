<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kategori_model extends CI_Model {
   
	public function get_all_kategori(){
		return $this->db->get("kategori")
						->result_array();
	}
	
	function add($data){
		$this->db->insert("kategori",$data);
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("kategori",$data);
	}
	
	
	function hapus($id) {
		$this->db->where('id',$id);
		$this->db->delete('kategori');
	}
	
	function status_kategori($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('id',$id);
		$query = $this->db->update('kategori');
	}
	
	function lihat_sub_category($id) {
        $this->db->where('parent_id',$id);
        $query = $this->db->get('kategori');
        return $query->result();
    }
	
	function dd_status(){
		$dd['']='---Status---';
		$dd['1']= 'Publish';
		$dd['0']= 'Not&nbsp;Publish';
		return $dd;
	}
	public function dd_parent_kategori(){
	$this->db->where('parent_id',0);
	$this->db->order_by('kode_kategori');
	$query=$this->db->get('kategori_produk');
	$dd['0']='Menu&nbsp;Root';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->kode_kategori]= $row->kategori;
			}
		}
		return $dd;
	}
	
	function dd_kategori(){
	$this->db->order_by('id','ASC');
	$query=$this->db->get('kategori');
	if($query->num_rows()> 0){
		foreach($query->result() as $row){
			$dd[$row->id]= $row->kategori;
			}
		}
		return $dd;
	}
	
	function dd_subkategori_produk($id){
	$this->db->where('parent_id',$id);
	$this->db->where('status',1);
	$query=$this->db->get('kategori_produk');
	$dd[]='Select Sub Kategori';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->kode_kategori]= $row->kategori;
			}
		}
		return $dd;
	}
}
