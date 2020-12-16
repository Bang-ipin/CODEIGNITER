<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	public function comment_blog(){
		
		date_default_timezone_set('Asia/Jakarta');
		
		$blogid			 	= $this->input->post('blogid',null,TRUE);
		$nama				= $this->input->post('nama',null,TRUE);
		$email		 		= $this->input->post('email',null,TRUE);
		$message			= $this->input->post('message',null,TRUE);
		$time				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s')); 
		
		$data['blogid']		= $blogid;
		$data['username']	= $this->db->escape_str($nama);
		$data['email']		= $this->db->escape_str($email);
		$data['review']		= htmlspecialchars(strip_tags($message));
		$data['tanggal']	= $time;
		
		$this->Site_model->komentar_blog($data);
		//$this->session->set_flashdata('SUCCESSMSG','Komentar anda sedang di moderasi!!');
	}

	public function replycomment_blog()
	{
		date_default_timezone_set('Asia/Jakarta');
		$blogid					= $this->input->post('replyblogid',null,TRUE);
		$commentid				= $this->input->post('replycommentid',null,TRUE);
		$review					= htmlspecialchars(strip_tags($this->input->post('replykomentar',null,TRUE)));
		$username				= $this->db->escape_str(htmlspecialchars(trim($this->session->userdata('nama_lengkap',null,TRUE))));
		$email					= $this->db->escape_str(htmlspecialchars(trim($this->session->userdata('email',null,TRUE))));
		$time					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s')); 
		$data = array(
				'blogid'		=>$blogid,
				'komentar_id'	=>$commentid,
				'review'		=>$review,
				'username'		=>$username,
				'email'			=>$email,
				'tanggal'		=>$time
			);			
	
		$this->Site_model->komentar_blog($data);
		$this->session->set_flashdata('SUCCESSMSG','Komentar anda sedang di moderasi!!');
		
	}
	
}