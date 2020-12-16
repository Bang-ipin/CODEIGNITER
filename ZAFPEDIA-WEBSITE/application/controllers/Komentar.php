<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	public function comment_product(){
		
		date_default_timezone_set('Asia/Jakarta');
		
		$productid		 		= $this->input->post('produkid',null,TRUE);
		$name					= $this->db->escape_str(htmlspecialchars(trim($this->input->post('name',null,TRUE))));
		$email		 			= $this->db->escape_str(htmlspecialchars(trim($this->input->post('email',null,TRUE))));
		$review					= $this->db->escape_str(htmlspecialchars(strip_tags($this->input->post('review',null,TRUE))));
		$reviewproduk			= $this->db->escape_str(htmlspecialchars(strip_tags($this->input->post('reviewproduk',null,TRUE))));
		$votes					= $this->input->post('votes',null,TRUE);
		$time					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s')); 
		
		if (empty($this->session->userdata('customer_id'))){
			$data['produkid']	= $productid;
			$data['username']	= $name;
			$data['email']		= $email;
			$data['review']		= $review;
			$data['votes']		= $votes;
			$data['tanggal']	= $time;
		} 
		else{
			$data['produkid']	= $productid;
			$data['username']	= $this->session->userdata('nama_lengkap');
			$data['email']		= $this->session->userdata('email');
			$data['review']		= $reviewproduk;
			$data['votes']		= $votes;
			$data['tanggal']	= $time;
		}
		
		$this->Site_model->komentar_produk($data);
	}
	
	public function comment_blog(){
		
		date_default_timezone_set('Asia/Jakarta');
		
		$blogid			 	= $this->input->post('blogid',null,TRUE);
		$nama				= $this->input->post('nama',null,TRUE);
		$email		 		= $this->input->post('email',null,TRUE);
		$message			= $this->input->post('message',null,TRUE);
		$messageid			= $this->input->post('messageid',null,TRUE);
		$time				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s')); 
		
		if (empty($this->session->userdata('customer_id'))){
			$data['blogid']		= $blogid;
			$data['username']	= $this->db->escape_str($nama);
			$data['email']		= $this->db->escape_str($email);
			$data['review']		= htmlspecialchars(strip_tags($message));
			$data['tanggal']	= $time;
		} 
		else{
			$data['blogid']		= $blogid;
			$data['username']	= $this->session->userdata('nama_lengkap');
			$data['email']		= $this->session->userdata('email');
			$data['review']		= htmlspecialchars(strip_tags($messageid));
			$data['tanggal']	= $time;
		}
		
		$this->Site_model->komentar_blog($data);
		$this->session->set_flashdata('SUCCESSMSG','Komentar anda sedang di moderasi!!');
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