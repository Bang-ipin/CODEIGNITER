<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Change_password extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->model('Admin_model');
	}
		
	public function ubah_password()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->load->library('form_validation');
				$this->form_validation->set_rules('pass_old','Password Lama','trim|required|max_length[60]|callback_check_pass[pass_old]');
				$this->form_validation->set_rules('pass_new','Password Baru','trim|required|max_length[60]');
				$this->form_validation->set_rules('pass_new_confirm','Ulangi Password Baru','trim|required|max_length[60]|matches[pass_new]');
				$this->form_validation->set_message('required','%s harus diisi !');
				$this->form_validation->set_message('check_pass','%s anda salah !');

				if($this->form_validation->run() == TRUE)
				{
					$pass_new 	= $this->input->post('pass_new');

					$update 	= $this->Admin_model->update_password($pass_new);
					if($update)
					{
						$this->session->set_userdata('password', sha1($pass_new));

						echo json_encode(array(
							//'status'=>1,
							'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> Password berhasil diupdate.</div>"
						));
					}
					else
					{
						$this->query_error();
					}
				}
				else
				{
					$this->input_error();
				}
			}
			else
			{
				$this->load->view('ubah_password');
			}
		}
	}

	public function check_pass($pass)
	{
		$cek_user = $this->Admin_model->cek_password($pass);

		if($cek_user->num_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
}