<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{		
		$d['judul'] = "ADMINISTRATOR";
		
		$config=$this->app_model->Get_Config();
			
		$d['prg']= $config['author'];
		$d['web_prg']= $config['website'];
		
		$d['nama_program']= $config['aplikasi'];
		$d['instansi']= $config['instansi'];
		$d['alamat_instansi']= $config['alamat'];
		
		
		$d['username'] = array('name' => 'username',
				'id' => 'username',
				'type' => 'text',
				'class' => 'input-teks-login',
				'autocomplete' => 'off',
				'size' =>'30',
				'placeholder' => 'Masukkan username.....'
		);
		$d['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'class' => 'input-teks-login',
				'autocomplete' => 'off',
				'size' =>'30',
				'placeholder' => 'Masukkan password.....'
		);
		$d['submit'] = array('name' => 'submit',
				'id' => 'submit',
				'type' => 'submit',
				'class' => 'easyui-linkbutton',
				'data-options' => 'iconCls:\'icon-lock_open\''
		);
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('login',$d);	
		}else
		{
			$d=$this->input->post(null,true);
			$filter = $this->security->xss_clean($d);
			$u	= $filter['username'];
			$p	= $filter['password'];
			$auth = $this->app_model->getLogin($u);
			if ($auth->num_rows()== 1 )
			{
				foreach ($auth->result() as $qad) 
				{
					if(hash_verified($p,$qad->password))
					{		
						$sess_data['logged_in'] = 'aingLoginYeuh';
						$sess_data['id'] = $qad->id;
						$sess_data['username'] = $qad->username;
						$sess_data['nama_lengkap'] = $qad->nama_lengkap;
						$sess_data['foto'] = $qad->foto;
						$sess_data['level'] = $qad->level;
						$sess_data['id_session'] = $qad->id_session;
						$this->session->set_userdata($sess_data);
					}
				}
				header('location:'.base_url().'index.php/home');
			}
			else
			{
				$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
				header('location:'.base_url().'index.php/login');
			}
		}
	} 
	
	public function logout(){
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'index.php');
		}else{
			$this->session->sess_destroy();
			header('location:'.base_url().'index.php');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/koperasi.php */