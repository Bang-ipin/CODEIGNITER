<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent:: __construct();
			$this->load->model('M_login');
			$this->load->library('encryption');
			
		}
		
	public function index($logout='')
	{	
		if($logout=='logout')
				$logout='Anda telah keluar dari sistem';
			$data['pesan']=$logout;
		$this->load->view('login',$data);
	}
	
	public function cek_login() {

		$username = $this->input->post('username');
		$password =sha1($this->input->post('password'));
		
		$hasil = $this->M_login->get_user($username, $password);
		if ($hasil->num_rows()==1)
			{
			foreach ($hasil->result() as $sess) {
			    $sess_data['logged_in']			= TRUE;
				$sess_data['id_admin'] 			= $sess->id_admin;
				$sess_data['password'] 			= $sess->password;
				$sess_data['username'] 			= $sess->username;
				$sess_data['nama_pengguna'] 	= $sess->nama_pengguna;
				$sess_data['usergroup'] 		= $sess->usergroup;
				$this->session->set_userdata($sess_data);
				}
				if($this->session->userdata('usergroup')=='Administrator'){
					redirect (site_url('administrator'));
				}else
				if($this->session->userdata('usergroup')=='Admin'){
					redirect (site_url('admin'));
				}
				else{
					redirect(site_url('anggota'));
				}
			}else
				{
					$this->session->set_flashdata('pesan','Maaf kombinasi Username dan Password Salah');
					redirect('login');
					
				}
			}
			
	public function logout(){
	$this->session->sess_destroy();
	redirect(site_url());
	}
}
?>
