<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('login/M_login');
	}
	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_message('required','%s harus di isi');
			
		if($this->form_validation->run() == FALSE)
		{
			$config = $this->Config_model->Get_All();
			$data['situs']		= $config['nama'];
			$data['logo'] 		= $config['logo'];
			$data['favicon'] 	= $config['favicon'];
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
						$sess_data['password'] 			= $sess->password;
						$sess_data['email'] 			= $sess->email;
						$sess_data['username'] 			= $sess->username;
						$sess_data['nama_lengkap'] 		= $sess->nama_lengkap;
						$sess_data['status'] 			= $sess->status;
						$sess_data['foto'] 				= $sess->foto;
						$sess_data['level'] 			= $sess->level;
						$this->session->set_userdata($sess_data);
					}
					else{
						$config = $this->Config_model->Get_All();
						$data['situs']		= $config['nama'];
						$data['logo'] 		= $config['logo'];
						$data['favicon'] 	= $config['favicon'];
						$data['title']		='.:: Panel Login Administrator ::.';
						$data['error']		='<div class="alert alert-danger alert-dismissable">
											<i class="fa fa-ban"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">×</button>
											<b>Kesalahan !</b> Periksa Kembali Username / Password Anda.
										</div>';
										
						$this->load->view('login',$data);
					}
					
				}
				if($this->session->userdata('level')	==01){
						redirect (site_url('appweb/home'));
				}
				
			}else{
				$config = $this->Config_model->Get_All();
				$data['situs']			= $config['nama'];
				$data['logo'] 			= $config['logo'];
				$data['favicon'] 	= $config['favicon'];
				$data['title']			='.:: Panel Login Administrator ::.';
				$data['error']			='<div class="alert alert-danger alert-dismissable">
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
