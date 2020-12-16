<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('menu/Menu_model');
		$this->load->model('settings/Config_model');
	}
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data['logo']			=  $config['logo'];
			$data['situs']			=  $config['nama'];
			$data['author']			=  $config['pemilik'];
			$data['favicon']		=  $config['favicon'];
			$data['tema']			=  $config['tema'];
			$data['title']			=  "Semua Menu";
			
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			
			$data['content']		=  $this->load->view('list',$data,true);
			$this->load->view('admin/template',$data);
		}	
		else{
			redirect(site_url('appweb'));
		}
	}
	public function primary(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data['logo']			=  $config['logo'];
			$data['situs']			=  $config['nama'];
			$data['author']			=  $config['pemilik'];
			$data['favicon']		=  $config['favicon'];
			$data['tema']			=  $config['tema'];
			$data['title']			=  "Top Menu";
			$data['querypages']		=  $this->Menu_model->get_all_pages();
			$data['kategoriblog']	=  $this->Menu_model->get_all_kategori();
			$data['modul']			=  $this->Menu_model->get_all_modul();
		
			$data['css']			= $this->load->view('primary/css',$data,true);
			$data['js']				= $this->load->view('primary/js',$data,true);
			
			$data['tampilmenu']		=  $this->load->view('primary/tampilmenu',$data,true);
			$data['content']		=  $this->load->view('primary/primary',$data,true);
			$this->load->view('admin/template',$data);
		}	
		else{
			redirect(site_url('appweb'));
		}
	}
	public function header(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data['logo']			=  $config['logo'];
			$data['situs']			=  $config['nama'];
			$data['author']			=  $config['pemilik'];
			$data['favicon']		=  $config['favicon'];
			$data['tema']			=  $config['tema'];
			$data['title']			=  "Header Menu";
			$data['querypages']		=  $this->Menu_model->get_all_pages();
			$data['kategoriblog']	=  $this->Menu_model->get_all_kategori();
			$data['modul']			=  $this->Menu_model->get_all_modul();
			
			$data['css']			= $this->load->view('header/css',$data,true);
			$data['js']				= $this->load->view('header/js',$data,true);
			
			$data['tampilmenu']		=  $this->load->view('header/tampilmenu',$data,true);
			$data['content']		=  $this->load->view('header/header',$data,true);
			$this->load->view('admin/template',$data);
		}	
		else{
			redirect(site_url('appweb'));
		}
	}
	public function footer(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data['logo']			=  $config['logo'];
			$data['situs']			=  $config['nama'];
			$data['author']			=  $config['pemilik'];
			$data['favicon']		=  $config['favicon'];
			$data['tema']			=  $config['tema'];
			$data['title']			=  "Footer Menu";
			$data['querypages']		=  $this->Menu_model->get_all_pages();
			$data['kategoriblog']	=  $this->Menu_model->get_all_kategori();
			$data['modul']			=  $this->Menu_model->get_all_modul();
		
			$data['css']			= $this->load->view('footer/css',$data,true);
			$data['js']				= $this->load->view('footer/js',$data,true);
			
			$data['tampilmenu']		=  $this->load->view('footer/tampilmenu',$data,true);
			$data['content']		=  $this->load->view('footer/footer',$data,true);
			$this->load->view('admin/template',$data);
		}	
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Menu_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Menu Deleted Successfully!!');
			redirect(site_url('admin/menu'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}	
	public function hapusmenuid() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){

			$id=$this->input->post('id');
			$this->Menu_model->hapus($id);
			$this->Menu_model->updateposisi($id);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}	

	public function update_struktur()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			if(isset($_POST['output']))
			{
				$this->menu_lib->updatestructure();
			}
			else {
			    echo "ERROR!";
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	function insertmenu(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){

			$menu 		= $this->input->post("nama");
			$type 		= $this->input->post("type");
			$url 		= $this->input->post("url");
			$opsi 		= $this->input->post("opsi");
			$menu_seo 	= slug($menu);
			
			if($this->db->query("INSERT INTO menu(nama_menu,type,url,opsi,menu_seo) VALUES ('$menu','$type','$url','$opsi','$menu_seo')"))
			{
				echo json_encode(array("nama_menu"=>$menu,"type"=>$type,"url"=>$url,"opsi"=>$opsi));
			} 
			else {
				echo $this->db->error();
			}
		}
		else{
			redirect(site_url('appweb'));
		}
		
	}

	public function addmenucustom(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){

			$nama 		=$this->input->post("nama-menu-custom");
			$url 		=$this->input->post("url-menu-custom");
			$type 		=$this->input->post("type-menu-custom");
			$option 	=$this->input->post("option-menu-custom");
			
			$data['nama_menu']	=ucwords($nama);
			$data['type']		=$type;
			$data['menu_seo']	=slug($nama);
			$data['opsi']		=$option;
			if(empty($url)){
				$data['url']		= '';
			}else{
				$data['url']		= $url;
			}
			$this->Menu_model->add($data);

		}
		else{
			redirect(site_url('appweb'));
		}
		
	}

	function tampilprimarymenu(){
		$this->load->view('primary/tampilmenu');
	}
	function tampilheadermenu(){
		$this->load->view('header/tampilmenu');
	}
	function tampilfootermenu(){
		$this->load->view('footer/tampilmenu');
	}
	
}