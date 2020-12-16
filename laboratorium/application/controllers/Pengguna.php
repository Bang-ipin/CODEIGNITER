<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$cari = $this->input->post('txt_cari');
			if(empty($cari)){
				$where = ' ';
			}else{
				$where = " WHERE username LIKE '%$cari%' OR nama_lengkap LIKE '%$cari%'";
			}
			
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			
			$d['judul']="Pengguna";
			
			//paging
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$text = "SELECT * FROM admins $where ";		
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$d['tot_hal'] = $tot_hal->num_rows();
			
			$config['base_url'] = site_url() . '/pengguna/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['next_link'] = 'Lanjut &raquo;';
			$config['prev_link'] = '&laquo; Kembali';
			$config['last_link'] = '<b>Terakhir &raquo; </b>';
			$config['first_link'] = '<b> &laquo; Pertama</b>';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['hal'] = $offset;
			

			$text = "SELECT * FROM admins $where 
					ORDER BY username ASC 
					LIMIT $limit OFFSET $offset";
			$d['data'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('pengguna/view', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function tambah()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			

			$d['judul']="Pengguna";
			
			$d['username']		='';
			$d['nama_lengkap']	='';
			$d['pwd']			='';
			$d['level']			='';
			
			$text = "SELECT * FROM level";
			$d['l_level'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('pengguna/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function edit()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			
			$d['judul'] = "Pengguna";
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM admins WHERE username='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['username']		=$id;
					$d['nama_lengkap']	=$db->nama_lengkap;
					$d['pwd']			='';
					$d['level']			=$db->level;
					$d['id_session']	='';
				}
			}else{
					$d['username']		=$id;
					$d['nama_lengkap']	='';
					$d['pwd']			='';
					$d['level']			='';
					$d['id_session']	='';
			}
			
			$text = "SELECT * FROM level";
			$d['l_level'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('pengguna/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){			
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM admins WHERE username='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/pengguna'>";			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
				
				$pwd 		= get_hash($this->input->post('pwd'));
				$nama 		= $this->input->post('nama_lengkap');
				$level		= $this->input->post('level');
				$user		= $this->db->escape_str($this->input->post('username'));
				$session_id	=get_hash($pwd);
				
				$up['username']		= $user;
				$up['nama_lengkap']	= $nama;
				$up['password']		= $pwd;
				$up['level']		= $level;
				$up['id_session']	= $session_id;
				
				$id['username']=$this->input->post('username');
				
				$data = $this->app_model->getSelectedData("admins",$id);
				if($data->num_rows()>0){
					if(empty($pwd)){
						$this->app_model->manualQuery("UPDATE admins SET nama_lengkap='$nama',level='$level',toko='$toko' WHERE username='$user'");
					}else{
						$this->app_model->updateData("admins",$up,$id);
					}
					echo 'Update data Sukses';
				}else{
					$this->app_model->insertData("admins",$up);
					echo 'Simpan data Sukses';		
				}
		}else{
				header('location:'.base_url());
		}
	
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */