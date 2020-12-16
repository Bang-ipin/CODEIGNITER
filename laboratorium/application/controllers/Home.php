<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			
			$d['judul']="Home";
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['content']= $this->load->view('content',$d,true);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url().'index.php/login');
		}
	}
	
	public function logout(){
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'index.php/login');
		}else{
			$this->session->sess_destroy();
			header('location:'.base_url().'index.php/login');
		}
	}
	
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */