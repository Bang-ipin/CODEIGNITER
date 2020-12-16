<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foto extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Controller untuk halaman profil
	 **/
	
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
			

			
			$d['judul']="Edit Foto";
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('foto/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$config['upload_path'] = './asset/foto_profil/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['create_thumb'] = TRUE;
		   	$config['maintain_ratio'] = TRUE;					
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('foto')){
				
				$tp=$this->upload->data();
				$res = $tp['full_path'];
				$ori = $tp['file_name'];
				
				$id['username']	= $this->session->userdata('username');
				
				$up['foto']		= $ori;
				
				$data = $this->app_model->getSelectedData("admins",$id);
				if($data->num_rows()>0){
					$this->app_model->updateData("admins",$up,$id);
					//echo 'Update data Sukses';
				}
				$this->index();
			}else{
				$error = $this->upload->display_errors();
				echo  $error;
			}
		}else{
				header('location:'.base_url());
		}
	
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */