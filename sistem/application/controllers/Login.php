<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('M_login');
	}
	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_message('required','%s harus di isi');
			
		if($this->form_validation->run() == FALSE)
		{
			$data['title']		='.:: Panel Login Administrator ::.';
			
			$this->load->view('login',$data);
		}else
		{
			$d=$this->input->post(null,TRUE);
			$filter=$this->security->xss_clean($d);
			$username	= htmlspecialchars(trim($filter['username']));
			$password	= htmlspecialchars(trim($filter['password']));
				
			$auth		= $this->M_login->get_user($username);
			if ($auth->num_rows() == 1 )
			{
				foreach ($auth->result() as $sess) 
				{
					if($this->phpass->check($password,$sess->password))
					{		
						$sess_data['logged_in']			= TRUE;
						$sess_data['id_admin'] 			= $sess->id_admin;
						$sess_data['password'] 			= $sess->password;
						$sess_data['username'] 			= $sess->username;
						$sess_data['nama_pengguna'] 	= $sess->nama_pengguna;
						$sess_data['usergroup'] 		= $sess->id_usergroup;
						$this->session->set_userdata($sess_data);
					}
					else{
						$data['error']		='<div class="alert alert-danger alert-dismissable">
											<i class="fa fa-ban"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">×</button>
											<b>Kesalahan !</b> Periksa Kembali Username / Password Anda.
										</div>';
										
						$this->load->view('login',$data);
					}
					
				}
				if($this->session->userdata('usergroup')==1){
					redirect (site_url('administrator'));
				}else
				if($this->session->userdata('usergroup')==2){
					redirect (site_url('admin'));
				}
				else{
					redirect(site_url('sales'));
				}
				
			}else{
				$data['error']	='<div class="alert alert-danger alert-dismissable">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">×</button>
									<b>Kesalahan !</b> Periksa Kembali Username / Password Anda.
								</div>';
								
				$this->load->view('login',$data);
			}
		}
	
	}

	public function logout(){
	$this->session->sess_destroy();
	redirect(site_url());
	}
}
?>
