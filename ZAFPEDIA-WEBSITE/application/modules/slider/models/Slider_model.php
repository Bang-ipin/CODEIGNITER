<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slider_model extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}
		
	public function get_all_slider(){
		return $this->db->order_by('id','ASC')
					->get('slider')
					->result_array();
	}
	public function get_slider_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('slider');
        return $query->result();
    }
	function dd_type(){
		$dd['']='---Type---';
		$dd['1']= 'Top';
		$dd['0']= 'Bottom';
		return $dd;
	}
	
	function add($data){
		$query=$this->db->insert('slider',$data);
		return $query;
	}
	
	function edit($id,$data){
	$this->db->where('id',$id);
	$this->db->update('slider',$data);
	}
	
	function hapus($id) {
		$this->db->where('id',$id);
		$this->db->delete('slider');
	}
	
	function SliderStatus($id,$status) {
		$this->db->set('status', $status);
		$this->db->where('id',$id);
		$query = $this->db->update('slider');
	}
}
