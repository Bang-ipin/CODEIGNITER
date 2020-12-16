<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Welcome extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
			$this->load->model('M_admin');
			$this->load->library('indonesia_library');
			
		}

	
	public function cek_password()
	{
		$pass		= $this->db->escape_str($this->input->post('pass_old'));
		$password 	= $this->M_admin->cek_password_admin();
		foreach($password as $passwot)
		{
			if($this->phpass->check($pass,$passwot->password))
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
	}
}
	
	