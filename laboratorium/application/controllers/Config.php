<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	
	public function index() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek))
		{
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			$d['judul'] = 'Konfigurasi Website';
			$d['list']=$config;
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			$d['content'] = $this->load->view('config/form', $d, true);		
			$d['CountBooking']= $this->app_model->CountAntrian();
			$this->load->view('home',$d);
		}
		else{
			header('location:'.base_url());
		}
	}

	public function simpan()
	{
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$data = array(
				'instansi' => ucwords($this->input->post('instansi')),
				'alamat' => $this->input->post('alamat'),
				'telp' => $this->input->post('telp'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'aplikasi' => $this->input->post('aplikasi'),
				'usaha' => $this->input->post('usaha'),
				'author' => $this->input->post('author'),
			);
			$id=$this->input->post('id');
			$this->app_model->UpdateConfig($id,$data);
			echo ' Data Berhasil di Update';
		}else{
				header('location:'.base_url());
		}
	
	}
	
	function backupdb()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek))
		{
				$this->load->dbutil();
			
			$prefs = array(
					'format'      => 'zip',
					'filename'    => 'inventory.sql',
					'newline'     => "\n"
				  );
			$backup = $this->dbutil->backup($prefs);
			
			// Load the file helper and write the file to your server
			$this->load->helper('file');
			write_file('./asset/backupdb/inventory#'.gmdate("d-m-Y", time()+60*60*7).'.zip', $backup);
			
			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('inventory#'.gmdate("d-m-Y", time()+60*60*7).'.zip', $backup); 
		}else
		{
				header('location:'.base_url());
		}
	}
}
?>