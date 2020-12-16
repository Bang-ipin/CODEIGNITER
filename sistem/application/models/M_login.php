<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

// public function get_user($username,$password) {
		
// 		$user =$this->db->escape_str($username);
// 		$pass =$this->db->escape_str($password);
		
// 		$this->db->select('*');
// 		$this->db->from('admin a');
// 		$this->db->join('usergroup b','a.id_usergroup=b.id_usergroup');
		
// 		if($username !=NULL){
// 			$this->db->where('username',$user);
// 		}
// 		if ($password !=NULL){
// 			$this->db->where('password',$pass);
// 		}
		
//         return  $this->db->get();
//     }
//  }	

	// public function get_user($u) {	
	// 	$user =$this->db->escape_str($u);
	// 	return $this->db->select('*')
	// 					->from('admin a')
	// 					->join('usergroup b', 'a.id_usergroup=b.id_usergroup')
	// 					->where('username',$user)
	// 					->get();
	// }
	public function get_user($u) {	
		$user =$this->db->escape_str($u);
		return $this->db->where('username',$user)
					->get('admin');
	}
}
	
