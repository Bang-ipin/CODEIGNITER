<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

public function get_user($username,$password) {
		
		$user =$this->db->escape_str($username);
		$pass =$this->db->escape_str($password);
		
		$this->db->select('*');
		$this->db->from('user_akses');
		$this->db->join('usergroup','usergroup.id_usergroup=user_akses.id_usergroup');
		
		if($username !=NULL){
			$this->db->where('username',$user);
		}
		if ($password !=NULL){
			$this->db->where('password',$pass);
		}
		
        return  $this->db->get();
    }
 }	

	
