<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index(){
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(1);
		$query						= $this->Site_model->getConfig()->row_array();
		$lokasi						= $this->Site_model->getLokasi()->row_array();
		$page						= $this->Site_model->getMenu("where menu_seo='$slug' AND status=1")->row_array();
		
		$data['situs']				= strip_tags($query['nama']);
		if(!empty($page['pages'])){	
				$data['title']		= $page['laman'];
		}else{
				$data['title']		= 'Kontak';
		}
		if(!empty($page['layout'])){	
				$template			= $page['layout'];
		}else{
				$template			= 'kontak';
		}
		if(!empty($page['konten'])){	
				$data['konten']		= $page['konten'];
		}else{
				$data['konten']		= '';
		}
		
		/*---------------CONFIG---------------*/
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['youtube']			= $query['youtube'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		
		$data['latitude']           = $lokasi['lat'];
		$data['longitude']          = $lokasi['lng'];
		$data['key']                = $lokasi['key'];
		$data['namalokasi']         = $lokasi['name'];
		$data['caption']            = $lokasi['caption'];
		
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['popblogger']			= $this->Landingpage_model->get_pop_lastblog();
		$data['captcha']            = $this->recaptcha->getWidget();
		$data['scriptcaptcha']      = $this->recaptcha->getScriptTag();
		$data['jsmaps']				= $this->load->view('public/js/js-map',$data,TRUE);
		$data['konten']				= $this->load->view('public/'.$template,$data,TRUE);
		$this->load->view('public/tema',$data);
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
}