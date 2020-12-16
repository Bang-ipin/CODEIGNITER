<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model {
	
	public function get_user($u) {	
		$user =$this->db->escape_str($u);
		return $this->db->where('username',$user)
					->get('admin');
	}
	
	/* public function add_captcha($data) {
		$this->db->insert('captcha',$data);
	} */
	
	/* public function del_captcha($expiration) {
		$this->db->where('captcha_time <',$expiration)
						->delete('captcha');
	}
	//jika captcha telah ada
	public function cek_captcha($captcha) {
		$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$query=$this->db->query($sql);
		$row=$query->row();
		
			
	} */
	
}