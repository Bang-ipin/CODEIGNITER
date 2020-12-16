<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model {
   
	public function get_all_blog(){
		return 	$this->db->order_by('id','desc')
						 ->get('blog')
						 ->result_array();
	
	}
	public function get_blog_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('blog');
        return $query->result();
    }
    function add($data){
        $query = $this->db->insert('blog',$data);
        return $query;
    }
	
    function update($id,$data){
        $this->db->where('id',$id);
        $update = $this->db->update('blog',$data);
        return $update;
    }

    function hapus($id){
        $this->db->where('id',$id);
        $delete = $this->db->delete('blog');
        return $delete;
    }
	
	function dd_kategori(){
	$this->db->order_by('id');
	$query=$this->db->get('kategori');
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->kategori_seo]= $row->kategori;
			}
		}
		return $dd;
	}
	
	function dd_tag(){
	$this->db->order_by('id','ASC');
	$query=$this->db->get('tags');
	$dd[]='';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id]= $row->tag;
			}
		}
		return $dd;
	}
		
	public function tags(){
		return 	$this->db->order_by('id','DESC')
						 ->get('tags')
						 ->result_array();
	
	}
}
