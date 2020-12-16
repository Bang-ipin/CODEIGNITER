<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			
			$config=$this->app_model->Get_Config();
		
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			
			$d['judul']="Edit Profil";
			
			$id = $this->session->userdata('username');
			
			$where = " WHERE username='$id'";

			$text = "SELECT * FROM admins $where ";
			$hasil = $this->app_model->manualQuery($text);
			$r = $hasil->num_rows();
			if($r>0){
				foreach($hasil->result() as $t){
					$d['username'] 		= $id;
					$d['nama_lengkap'] 	= $t->nama_lengkap;
					$d['password'] 		='';
					$d['id_session']	='';
					$d['foto'] 			= '';
				}
			}else{
				$d['username'] 			= $id;
				$d['nama_lengkap'] 		='';
				$d['password'] 			='';
				$d['foto'] 				= '';
				$d['id_session']		='';
			}
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('profil/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			
				
				$pwd 		= get_hash($this->input->post('pwd'));
				$nama 		= $this->input->post('nama_lengkap');
				$user		=  $this->db->escape_str($this->input->post('username'));
				$session_id	= get_hash($pwd);
				
				$up['username']		= $user;
				$up['nama_lengkap']	= $nama;
				$up['password']		= $pwd;
				$up['id_session']	= $session_id;
				
				$id['username']=$this->input->post('username');
				
				$data = $this->app_model->getSelectedData("admins",$id);
				if($data->num_rows()>0){
					if(empty($pwd)){
						$this->app_model->manualQuery("UPDATE admins SET nama_lengkap='$nama' WHERE username='$user'");
					}else{
						$this->app_model->updateData("admins",$up,$id);
					}
					echo 'Update data Sukses';
				}
		}else{
				header('location:'.base_url());
		}
	
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */