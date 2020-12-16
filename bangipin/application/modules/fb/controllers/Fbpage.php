<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FBpage extends CI_Controller {

	public function index() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Fan Page Facebook';
			
			$config						= $this->Config_model->Get_All();
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['tema']				= $config['tema'];
			
			$fb							= $this->Fb_model->Get_fanpage();
			
			if(empty($fb['id'])){
				$data['id']				= $this->Fb_model->kode_otomatis();
			}
			else{
				$data['id']				= 1;
			}
			$data['application_id']		= $fb['application_id'];
			$data['url_fp']				= $fb['url'];
			$data['width']				= $fb['width'];
			$data['height']				= $fb['height'];
			$data['show_face']			= $fb['show_face'];
			$data['show_status']		= $fb['show_status'];
			$data['show_header_fb']		= $fb['show_header_fb'];
			$data['dd_show_face']		= $this->Site_model->dd_show_status();
			$data['dd_show_status']		= $this->Site_model->dd_show_status();
			$data['dd_show_header_fb']	= $this->Site_model->dd_show_status();
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['content']			= $this->load->view('form',$data,TRUE);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data = array(
				'application_id' 	=> $this->input->post('application_id'),
				'url' 				=> $this->input->post('url_fp'),
				'width' 			=> $this->input->post('width'),
				'height' 			=> $this->input->post('height'),
				'show_face' 		=> $this->input->post('show_face'),
				'show_status' 		=> $this->input->post('show_status'),
				'show_header_fb' 	=> $this->input->post('show_header_fb'),
			);
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('like_box_fb',array('id'=>$id));
			if($d->num_rows() > 0){
				$this->Fb_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/fanpage'));
			}
			else{
				$this->Fb_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/fanpage'));
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
}
?>