<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Change_password extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('level')==01) {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Administrator');
		redirect(site_url('admin'));
		
		}
	}

		
	public function index()
	{
		$config=$this->Config_model->Get_All();
		$data=array(
			'logo'=>$config['logo'],
			'author'=>$config['pemilik'],
			'favicon'=>$config['favicon'],
			'tema'	=> $config['tema'],
			'title'=>'Ganti Password',
		);
		$this->load->view('ganti_password',$data);
	}
	
	function simpan_password() 
	{
	if($this->input->post('submit',null,TRUE))
		{
			$berlaku=$this->input->post('berlaku',null,TRUE);
			$ulang=$this->input->post('ulang',null,TRUE);
			
			$cek=$this->Admin_model->cek_password($berlaku)->num_rows();
			if(empty($berlaku)){
				echo "<div class='peringatan'><b>ERROR : </b> Password Harus Di Isi ! </div>";
			}else
			if($cek > 0 )
			{
				$update=$this->Admin_model->update_password($ulang);
				if ($update)
				{
					$this->session->set_userdata('password',sha1($ulang));
					$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Ditambahkan 
					<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
					redirect(base_url('change_password'));
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-warning"> Data Gagal Ditambahkan 
					<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
					redirect(base_url('change_password'));
				}
			}else
			{
				echo " Password Tidak Terdaftar";
			}
		}
	}
	
	public function cek_password()
	{
		$pass=$this->input->post('berlaku',null,TRUE);
		$cek_user = $this->Admin_model->cek_password($pass);
		if($cek_user->num_rows() > 0)
		{
			echo $cek_user;
		}
	}
}