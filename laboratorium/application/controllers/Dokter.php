<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Controller untuk halaman profil
	 **/
	
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$cari = $this->input->post('txt_cari');
			if(empty($cari)){
				$where = ' ';
			}else{
				$where = " WHERE nama_dokter LIKE '%$cari%'";
			}
			
			$config=$this->app_model->Get_Config();
		
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
				
			
			$d['judul']="Data Dokter";
			
			//paging
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$text = "SELECT * FROM dokter $where ";		
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$d['tot_hal'] = $tot_hal->num_rows();
			
			$config['base_url'] = site_url() . '/dokter/index/';
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
			

			$text = "SELECT * FROM dokter $where 
					ORDER BY nama_dokter ASC 
					LIMIT $limit OFFSET $offset";
			$d['data'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status=1";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('dokter/view', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function tambah()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			
			$d['judul']="Data Dokter";
			
			$d['dokter']	='';
			
			$pesan1 = "SELECT * FROM antrian WHERE status=1";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('dokter/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function edit()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
				
			
			$d['judul'] = "Data Dokter";
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM dokter WHERE id_dokter='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['id_dokter']			=$id;
					$d['dokter']			=$db->nama_dokter;
				}
			}else{
					$d['id_dokter']			=$id;
					$d['dokter']			='';
				}
			$pesan1 = "SELECT * FROM antrian WHERE status=1";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();			
			$d['content'] = $this->load->view('dokter/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){			
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM dokter WHERE id_dokter='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dokter'>";			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
				
				$up['nama_dokter']			=$this->input->post('dokter');
				
				$id['id_dokter']			=$this->input->post('id_dokter');
				
				$data = $this->app_model->getSelectedData("dokter",$id);
				if($data->num_rows()>0){
					$this->app_model->updateData("dokter",$up,$id);
					echo 'Update data Sukses';
				}else{
					$this->app_model->insertData("dokter",$up);
					echo 'Simpan data Sukses';		
				}
		}else{
				header('location:'.base_url());
		}
	
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */