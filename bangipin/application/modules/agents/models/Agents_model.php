<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agents_model extends CI_Model {
	
	public function get_all_agents(){
		return 	$this->db->get('statistik')
						 ->result_array();
	
	}
}		   
        