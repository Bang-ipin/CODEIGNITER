<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function profile()
	{
		$id 									= $this->uri->segment(4);
		$cek = $this->session->userdata('level')==05 && $this->session->userdata('username')==$id;
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$query					= $this->Site_model->getConfig()->row_array();
			$data['produsen']		= $this->Site_model->getProdusen();
			$data['featured']		= $this->Site_model->getFeaturedProduk();
			$data['populer'	]		= $this->Site_model->getPopulerProduk();
			$data['payment']		= $this->Site_model->getPayment();
			$data['bank'	]		= $this->Site_model->getBank();
			$data['item']			= $this->Site_model->getAllProduk();
			$data['produk']			= $this->Site_model->getAllProduk();
			$data['dd_gender']		= $this->Site_model->dd_gender();
			$data['dd_kotakab']		= $this->Site_model->get_city();
			$data['dd_province']	= $this->Site_model->get_province();
			$data['customer'] 		= $this->Site_model->_get_customer_by_id($id)->result_array();
			
			$data['title'] 			= 'Profil&nbsp;Saya';
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
			$data['cssprofile']     =$this->load->view('css/css-profile',$data,TRUE);
			$data['jsprofile']      =$this->load->view('js/js-profile',$data,TRUE);
			$data['konten']=$this->load->view('member',$data,TRUE);
			$this->load->view('tema',$data);
		}
		else{
			redirect(site_url('member/login'));
		}
	}
		
	
	public function personal()
	{
		$username			= $this->input->post('username',null,TRUE);
		$fullname			= $this->input->post('fullname',null,TRUE);
		$web				= $this->input->post('website',null,TRUE);
		$data = array(
			'nama_lengkap' 	=> $fullname,
			'jenis_kelamin'	=> $this->input->post('gender',null,TRUE),
			'telepon'   	=> $this->input->post('phone',null,TRUE),
			'hobi'   		=> $this->input->post('hobi',null,TRUE),
			'pekerjaan'  	=> $this->input->post('pekerjaan',null,TRUE),
			'bio'  			=> $this->input->post('bio',null,TRUE),
			'facebook'		=> $this->input->post('facebook',null,TRUE),
			'twitter'  		=> $this->input->post('twitter',null,TRUE),
			'perusahaan'	=> $this->input->post('perusahaan',null,TRUE),
			'website'   	=> $web,
			);

		$update=$this->Site_model->UpdateCustomer($username,$data);
		if ($update){
				$this->session->set_userdata('nama_lengkap',$fullname);
				$this->session->set_userdata('website',$web);
				$this->session->set_flashdata('SUCCESSMSG','Data Updated Successfully');
				redirect(site_url('member/account/profile/'.$username.''));
			}else{
				$this->session->set_flashdata('GAGAL','Data Updated Unsuccessfully');
				redirect(site_url('member/account/profile/'.$username.''));
			}
			$this->session->set_flashdata('SUCCESSMSG','Data Updated Successfully');
			redirect(site_url('member/account/profile/'.$username.''));
	}
	
	public function alamat()
	{
		$id				 			= $this->input->post('idalamat',null,TRUE);
		$data = array(
			'alamat1'	 			=> $this->input->post('alamat1',null,TRUE),
			'alamat2'   			=> $this->input->post('alamat2',null,TRUE),
			'negara'				=> $this->input->post('negara',null,TRUE),
			'provinsi'			   	=> $this->input->post('province',null,TRUE),
			'kota'   				=> $this->input->post('kotakab',null,TRUE),
			'kode_pos'   			=> $this->input->post('kodepos',null,TRUE),
			);

		$this->Site_model->UpdateCustomer($id,$data);
		$this->session->set_flashdata('SUCCESSMSG','Data Updated Successfully');
		redirect(site_url('member/account/profile/'.$id.''));
		
	}
	
	public function avatar() {
		$path							='./files/customer/';
		$nm_img							='ava-'.trim(substr(md5(rand()),0,4));
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['file_name']            = $nm_img;
		$config['max_size']             = 2048;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;
		$config['overwrite']            = TRUE;
		
		$this->upload->initialize($config);
		
		$id 		= $this->input->post('idavatar',null,TRUE);
		$img_lama	= $this->input->post('imglama',null,TRUE);

		$check_file_upload= FALSE;
		if (isset($_FILES['avatar']['error'])&& $_FILES['avatar']['error'] != 4){
			$check_file_upload = TRUE;
		}
		if($check_file_upload && !$this->upload->do_upload('avatar')) {
			$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
			redirect(site_url('member/account/profile/'.$id.''));
		} else {
			if(!$this->upload->do_upload('avatar'))
			{
				$data=array(
					'foto_member'   => $img_lama,
					);
			} else {
			$file_img=$this->upload->data();
			$img_name=$file_img['file_name'];
			$data = array(
				'foto_member'   => $img_name,
				);
			@unlink('./files/customer/'.$img_lama);
			}
			$update=$this->Site_model->UpdateCustomer($id,$data);
			if ($update){
				$this->session->set_userdata('fotomember',$img_name);
				$this->session->set_flashdata('SUCCESSMSG','Data Updated Successfully');
				redirect(site_url('member/account/profile/'.$id.''));
			}else{
				$this->session->set_flashdata('GAGAL','Data Updated Unsuccessfully');
				redirect(site_url('member/account/profile/'.$id.''));
			}
		}
	}
	
	function password() {
		if($this->input->post('submit'))
		{
			$id 		= $this->input->post('idpassword',null,TRUE);
			$berlaku=$this->input->post('berlaku',null,TRUE);
			$ulang=$this->input->post('ulang',null,TRUE);
			
			$cek=$this->Site_model->cek_password($berlaku)->num_rows();
			if(empty($berlaku)){
				echo "<div class='peringatan'><b>ERROR : </b> Password Harus Di Isi ! </div>";
			}else
			if($cek > 0 )
			{
				$update=$this->Site_model->update_password($ulang);
				if ($update)
				{
					$this->session->set_userdata('password',sha1($ulang));
					$this->session->set_flashdata('SUCCESSMSG','Data Updated Successfully');
					redirect(site_url('member/account/profile/'.$id.''));
				}else{
					$this->session->set_flashdata('GAGAL','Data Updated Unsuccessfully');
					redirect(site_url('member/account/profile/'.$id.''));
				}
			}else
			{
				echo " Password Tidak Terdaftar";
				redirect(site_url('member/account/profile/'.$id.''));
			}
		}
	}
	
	public function cek_password()
	{
		$pass=$this->input->post('berlaku',null,TRUE);
		$cek_user = $this->Site_model->cek_password($pass);
		if($cek_user->num_rows() > 0)
		{
			echo $cek_user;
		}
	}
	
}