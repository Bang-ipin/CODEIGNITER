<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Change_password extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('usergroup')==""){
			$this->session->set_flashdata('pesan','Anda Harus Login Dahulu');
			redirect(base_url());
		}
			$this->load->model('M_administrator');
			$this->load->model('M_anggota');
			$this->load->library('form_validation');		
	}
		
	public function index()
	{
		$this->form_validation->set_rules('pass_old','Password Lama','trim|required|max_length[60]|callback_check_pass[pass_old]');
		$this->form_validation->set_rules('pass_new','Password Baru','trim|required|max_length[60]');
		$this->form_validation->set_rules('pass_new_confirm','Ulangi Password Baru','trim|required|max_length[60]|matches[pass_new]');
		$this->form_validation->set_message('required','%s harus diisi !');
		$this->form_validation->set_message('check_pass','%s anda salah !');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('ubah_password');
		}else
		{
			$pass_new 	= $this->input->post('pass_new');
			$update 	= $this->M_administrator->update_password($pass_new);
			if($update)
			{
				$this->session->set_userdata('password', sha1($pass_new));
				echo json_encode(array(
					'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> Password berhasil diupdate.</div>"
				));
			}
			else
			{
				$this->query_error();
			}
		}
	}		
	
	public function check_pass($pass)
	{
		$cek_user = $this->M_administrator->cek_password($pass);

		if($cek_user->num_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	public function ganti_pass()
	{
		$this->form_validation->set_rules('pass_old','Password Lama','trim|required|max_length[60]|callback_check_pass_anggota[pass_old]');
		$this->form_validation->set_rules('pass_new','Password Baru','trim|required|max_length[60]');
		$this->form_validation->set_rules('pass_new_confirm','Ulangi Password Baru','trim|required|max_length[60]|matches[pass_new]');
		$this->form_validation->set_message('required','%s harus diisi !');
		$this->form_validation->set_message('check_pass_anggota','%s anda salah !');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('ubah_password_anggota');
		}else
		{
			$pass_new 	= $this->input->post('pass_new');
			$update 	= $this->M_anggota->update_password($pass_new);
			if($update)
			{
				$this->session->set_userdata('password', sha1($pass_new));
				echo json_encode(array(
					'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> Password berhasil diupdate.</div>"
				));
			}
			else
			{
				$this->query_error();
			}
		}
	}		
	
	public function check_pass_anggota($pass)
	{
		$cek_user = $this->M_anggota->cek_password($pass);

		if($cek_user->num_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
}