<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Inbox extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'				=>$config['logo'],
				'situs'				=>$config['nama'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'tema'				=> $config['tema'],
				'title'				=> 'List Inbox',
			);
			
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['script']			= $this->load->view('script',$data,true);
			$data['content']		= $this->load->view('list',$data,TRUE);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function show_inbox()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['datainbox'] 			= $this->Inbox_model->getInbox();
			$this->load->view('inbox',$data,'refresh');
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function tulis_pesan()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->load->view('compose','refresh');
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function view_inbox()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$id=$this->input->get('message_id');
			$data['viewinbox'] 			= $this->Inbox_model->viewInbox($id);
			$this->load->view('view',$data,'refresh');
		
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function view_pesan()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$id=$this->input->get('message_id');
			$data['viewinbox'] 			= $this->Inbox_model->viewInbox($id);
			$this->load->view('view',$data);
		
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function balas_pesan()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$id=$this->input->get('messageid');
			$data['viewinbox'] 			= $this->Inbox_model->viewInbox($id);
			$this->load->view('reply',$data,'refresh');
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function sendinbox(){
		
		date_default_timezone_set('Asia/Jakarta');
	
		$nama					= $this->input->post('name',null,TRUE);
		$email					= $this->db->escape_str($this->input->post('email',null,TRUE)); 
		$subjek					= htmlspecialchars(strip_tags($this->input->post('subjek',null,TRUE))); 
		$pesan					= htmlspecialchars(strip_tags($this->input->post('pesan',null,TRUE))); 
		$date					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
		$data['nama']			= $nama;
		$data['email']			= $email;
		$data['subjek']			= $subjek;
		$data['pesan']			= $pesan;
		$data['tanggal']		= $date;
		
		$cek=$this->Inbox_model->cek_inbox($email,$pesan)->num_rows();
		if(empty($cek)) {
		     // validasi form
            $this->form_validation->set_rules('name', ' ', 'trim|required');
            $this->form_validation->set_rules('email', ' ', 'trim|required');
            $this->form_validation->set_rules('pesan', ' ', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		    $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
	            redirect(site_url('contact'));
            }else{
            	$this->Inbox_model->add_inbox($data);
	        	$this->session->set_flashdata('SUCCESSMSG','Pesan anda berhasil terkirim. Kami akan membalas pesan anda secepatnya.');
            }
        
		}
		else {
			$this->session->set_flashdata('GAGALMSG', 'Anda sudah mengirim pesan ini sebelumnya');
		}
		redirect(site_url('contact'));
	}
	
	public function sendemail(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			
			$config = [
               'useragent' 		=> 'CodeIgniter',
               'protocol' 	 	=> 'smtp',
               'mailpath'  		=> '/usr/sbin/sendmail',
               'smtp_host' 		=> 'ssl://smtp.gmail.com',
               'smtp_user' 		=> 'bangsoftware123@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' 		=> 'semangatmuda123',             // Password gmail Anda.
               'smtp_port' 		=> 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' 	=> 'SSL',
               'wordwrap'  		=> TRUE,
               'wrapchars' 		=> 80,
               'mailtype' 		=> 'html',
               'charset'   		=> 'utf-8',
               'validate'  		=> TRUE,
               'crlf'      		=> "\r\n",
               'newline'   		=> "\r\n",
           ];
 
			$this->email->initialize($config);
		
			$to						= $this->input->post('to');
			$cc						= $this->input->post('cc'); 
			$bcc					= $this->input->post('bcc'); 
			$subject				= $this->input->post('subject'); 
			$message				= $this->input->post('message'); 
			$attach					= $this->input->post('files'); 
			$from					= "no-reply@lapakparfum.com";
			$name					= "lapakparfum.com";
			
			if(!empty($cc)){
				$cc_id = implode(",", $cc);
			}else{
				$cc_id = '';
			}
			if(!empty($bcc)){
				$bcc_id = implode(",", $bcc);
			}else{
				$bcc_id = '';
			}
			
			$this->email->from($from,$name);
			$this->email->to($to);
			$this->email->cc($cc_id);
			$this->email->bcc($bcc_id);
			$this->email->subject($subject);
			$this->email->message($message);
			foreach($attach as $ulang){
				$this->email->attach($ulang);
			}
			if($this->email->send()) {
				$this->session->set_flashdata('SUCCESSMSG','Email berhasil terkirim ke alamat <strong>'.$to.'</strong>');
			}
			else {
				$this->session->set_flashdata('GAGALMSG', 'Terjadi kesalahan. Harap ulangi kembali');
			}
			redirect(site_url('appweb/inbox'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$this->Inbox_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Pesan Berhasil Dihapus'); 
			redirect(site_url('appweb/inbox'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	