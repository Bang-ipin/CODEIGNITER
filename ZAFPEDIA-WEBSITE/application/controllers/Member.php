<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('text');
	}
	
	public function login()
	{
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_message('required','%s harus di isi');
			
		if($this->form_validation->run() == FALSE)
		{
			date_default_timezone_set('Asia/Jakarta');
			$query						= $this->Site_model->getConfig()->row_array();
			$data['situs']				= strip_tags($query['nama']);
			$data['produsen']			= $this->Site_model->getProdusen();
			$data['featured']			= $this->Site_model->getFeaturedProduk();
			$data['newitem']			= $this->Site_model->getNewProduk();
			$data['populer']			= $this->Site_model->getPopulerProduk();
			$data['bestseller']			= $this->Site_model->getBestProduk();
			$data['onsale']				= $this->Site_model->getOnSale();
			$data['toprate']			= $this->Site_model->getTopRateProduct();
			$data['item']				= $this->Site_model->getAllProduk();
			$data['sidebarcategory']	= $this->Site_model->getSidebarCategoryProduk();
			$data['tags']				= $this->Site_model->produk_tags();
			$data['payment']			= $this->Site_model->getPayment();
			$data['bank']				= $this->Site_model->getBank();
			
			$data['title'] 				= 'Login';
			$data['telp']				= strip_tags($query['telepon']);
			$data['email']				= strip_tags($query['email_website']);
			$data['alamat']				= strip_tags($query['alamat']);
			$data['author'	]			= strip_tags($query['pemilik']);
			$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
			$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
			$data['meta_keyword']		= strip_tags($query['meta_keyword']);
			$data['website']			= $query['website'];
			$data['tema']				= $query['tema'];
			$data['hak_cipta']			= $query['hak_cipta'];
			$data['facebook']			= $query['facebook'];
			$data['instagram']			= $query['instagram'];
			$data['twitter'	]			= $query['twitter'];
			$data['googleplus']			= $query['googleplus'];
			$data['tumblr']				= $query['tumblr'];
			$data['vimeo']				= $query['vimeo'];
			$data['youtube']			= $query['youtube'];
			$data['skype'	]			= $query['skype'];
			$data['linkedin']			= $query['linkedin'];
			$data['logo']				= $query['logo'];
			$data['favicon'	]			= $query['favicon'];
			$data['javascript_header']	= $query['javascript_header'];
            $data['javascript_footer']	= $query['javascript_footer'];
	    	//$data['header']				= 1;
			$data['jsregister']         =$this->load->view('js/js-register',$data,TRUE);
			$data['konten']=$this->load->view('authentication',$data,TRUE);
			$this->load->view('tema',$data);
		}else{
			$d						= $this->input->post(null,TRUE);
			$filter					= $this->security->xss_clean($d);
			$email					= $filter['email'];
			$password				= sha1($filter['password']);
			
			$auth					= $this->Site_model->auth_cust($email,$password);
			if($auth->num_rows() > 0)
			{
				foreach ($auth->result() as $sess) {
					$sess_data['customer_id'] 		= $sess->customer_id;
					$sess_data['level'] 			= $sess->level;
					$sess_data['username'] 			= $sess->username;
					$sess_data['nama_lengkap'] 		= $sess->nama_lengkap;
					$sess_data['password'] 			= $sess->password;
					$sess_data['fotomember']		= $sess->foto_member;
					$sess_data['status'] 			= $sess->status;
					$sess_data['telepon'] 			= $sess->telepon;
					$sess_data['email'] 			= $sess->email;
					$sess_data['perusahaan'] 		= $sess->perusahaan;
					$sess_data['alamat1'] 			= $sess->alamat1;
					$sess_data['alamat2'] 			= $sess->alamat2;
					$sess_data['kota'] 				= $sess->kota;
					$sess_data['provinsi'] 			= $sess->provinsi;
					$sess_data['negara'] 			= $sess->negara;
					$sess_data['kode_pos'] 			= $sess->kode_pos;
					$this->session->set_userdata($sess_data);
				}
				if($this->session->userdata('level')==$sess_data['level']){
					redirect (site_url());
				}	
			}
			else{
				date_default_timezone_set('Asia/Jakarta');
				$query					= $this->Site_model->getConfig()->row_array();
				$data['situs']				= strip_tags($query['nama']);
				$data['produsen']			= $this->Site_model->getProdusen();
				$data['featured']			= $this->Site_model->getFeaturedProduk();
				$data['newitem']			= $this->Site_model->getNewProduk();
				$data['populer']			= $this->Site_model->getPopulerProduk();
				$data['bestseller']			= $this->Site_model->getBestProduk();
				$data['onsale']				= $this->Site_model->getOnSale();
				$data['toprate']			= $this->Site_model->getTopRateProduct();
				$data['item']				= $this->Site_model->getAllProduk();
				$data['sidebarcategory']	= $this->Site_model->getSidebarCategoryProduk();
				$data['tags']				= $this->Site_model->produk_tags();
				$data['payment']			= $this->Site_model->getPayment();
				$data['bank']				= $this->Site_model->getBank();
				
				$data['title'] 				= 'Login';
				$data['telp']				= strip_tags($query['telepon']);
				$data['email']				= strip_tags($query['email_website']);
				$data['alamat']				= strip_tags($query['alamat']);
				$data['author'	]			= strip_tags($query['pemilik']);
				$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
				$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
				$data['meta_keyword']		= strip_tags($query['meta_keyword']);
				$data['website']			= $query['website'];
				$data['tema']				= $query['tema'];
				$data['hak_cipta']			= $query['hak_cipta'];
				$data['facebook']			= $query['facebook'];
				$data['instagram']			= $query['instagram'];
				$data['twitter'	]			= $query['twitter'];
				$data['googleplus']			= $query['googleplus'];
				$data['tumblr']				= $query['tumblr'];
				$data['vimeo']				= $query['vimeo'];
				$data['youtube']			= $query['youtube'];
				$data['skype'	]			= $query['skype'];
				$data['linkedin']			= $query['linkedin'];
				$data['logo']				= $query['logo'];
				$data['favicon'	]			= $query['favicon'];
				$data['javascript_header']	= $query['javascript_header'];
                $data['javascript_footer']	= $query['javascript_footer'];
		       //$data['header']				= 1;
				$data['error']			= '<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">×</button>
							<b>Kesalahan !</b> Periksa Kembali Email / Password  Anda.
						</div>';
		
				$data['jsregister']=$this->load->view('js/js-register',$data,TRUE);
				$data['konten']=$this->load->view('authentication',$data,TRUE);
				$this->load->view('tema',$data);
			}	
		}
	}
	
	public function register()
	{
		date_default_timezone_set('Asia/Jakarta');
		$query						= $this->Site_model->getConfig()->row_array();
		$data['situs']				= strip_tags($query['nama']);
		$data['produsen']			= $this->Site_model->getProdusen();
		$data['featured']			= $this->Site_model->getFeaturedProduk();
		$data['newitem']			= $this->Site_model->getNewProduk();
		$data['populer']			= $this->Site_model->getPopulerProduk();
		$data['bestseller']			= $this->Site_model->getBestProduk();
		$data['onsale']				= $this->Site_model->getOnSale();
		$data['toprate']			= $this->Site_model->getTopRateProduct();
		$data['item']				= $this->Site_model->getAllProduk();
		$data['sidebarcategory']	= $this->Site_model->getSidebarCategoryProduk();
		$data['tags']				= $this->Site_model->produk_tags();
		$data['payment']			= $this->Site_model->getPayment();
		$data['bank']				= $this->Site_model->getBank();
		$data['tema']				= $query['tema'];
		
		$data['title'] 				= 'Daftar';
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['hak_cipta']			= $query['hak_cipta'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['googleplus']			= $query['googleplus'];
		$data['tumblr']				= $query['tumblr'];
		$data['vimeo']				= $query['vimeo'];
		$data['youtube']			= $query['youtube'];
		$data['skype'	]			= $query['skype'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		//$data['header']			= 1;
		$data['jsregister']         =$this->load->view('js/js-register',$data,TRUE);
		$data['konten']=$this->load->view('authentication',$data,TRUE);
		$this->load->view('tema',$data);
	}

	
	public function save()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data=array(
			'username'		=>$this->db->escape_str(trim($this->input->post('username',null,TRUE))),
			'nama_lengkap'	=>$this->input->post('fullname',null,TRUE),
			'email'			=>$this->db->escape_str(strtolower($this->input->post('email1',null,TRUE))),
			'password'		=>$this->db->escape_str(htmlspecialchars(trim(sha1($this->input->post('passwordregister',null,TRUE))))),
			'status'		=>1,
			'tgl_dibuat'	=>$this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s')),
			'level'			=>'05',
		);
		$this->Site_model->add_cust($data);
		$this->session->set_flashdata('SUCCESSMSG','Berhasil mendaftar');
		redirect(site_url('member/login'));
	}
	
	public function cek_email()
	{
		$email=$this->db->escape_str($this->input->post('email'));
		$cek_email = $this->Site_model->cek_email($email);
		if($cek_email->num_rows() == 0)
		{
			echo "true";
		
		}
		else
		{
			echo "false";
		}
	}
	
	public function cek_username()
	{
		$username=$this->db->escape_str(trim($this->input->post('username')));
		$cek_username = $this->Site_model->cek_username($username);
		if($cek_username->num_rows() == 0)
		{
			echo "true";
		
		}
		else
		{
			echo "false";
		}
	}
	
	public function lupa_password()
	{
		date_default_timezone_set('Asia/Jakarta');
		$query					= $this->Site_model->getConfig()->row_array();
		$data['produsen']		= $this->Site_model->getProdusen();
		$data['featured']		= $this->Site_model->getFeaturedProduk();
		$data['populer'	]		= $this->Site_model->getPopulerProduk();
		$data['payment']		= $this->Site_model->getPayment();
		$data['bank'	]		= $this->Site_model->getBank();
		$data['item']			= $this->Site_model->getAllProduk();
		$data['produk']			= $this->Site_model->getAllProduk();
			
		$data['title'] 			= 'Lupa Password';
		$data['situs']			= strip_tags($query['nama']);
		$data['deskripsi_web']	= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']	= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']	= strip_tags($query['meta_keyword']);
		$data['telp']			= strip_tags($query['telepon']);
		$data['email']			= strip_tags($query['email_website']);
		$data['alamat']			= strip_tags($query['alamat']);
		$data['author'	]		= strip_tags($query['pemilik']);
		$data['website']		= $query['website'];
		$data['logo']			= $query['logo'];
		$data['favicon']		= $query['favicon'];
		$data['tema']			= $query['tema'];
		$data['hak_cipta']		= $query['hak_cipta'];
		$data['facebook']		= $query['facebook'];
		$data['instagram']		= $query['instagram'];
		$data['twitter'	]		= $query['twitter'];
		$data['googleplus']		= $query['googleplus'];
		$data['tumblr'	]		= $query['tumblr'];
		$data['vimeo'	]		= $query['vimeo'];
		$data['youtube'	]		= $query['youtube'];
		$data['skype'	]		= $query['skype'];
		$data['linkedin']		= $query['linkedin'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		
		$data['konten']=$this->load->view('page-forgotton-password',$data,TRUE);
		$this->load->view('tema',$data);
	
	}
	
	public function logout(){
	$this->session->sess_destroy();
	redirect(site_url());
	}
	
	
}