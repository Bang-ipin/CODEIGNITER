<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {	
    
	public function index() {	
	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$config 						= $this->Config_model->Get_All();
			$data['title']					= 'Dashboard';
			$data['situs']					= $config['nama'];
			$data['logo']					= $config['logo'];
			$data['author']					= $config['pemilik'];
			$data['favicon']				= $config['favicon'];
			$data['tema']					= $config['tema'];
			
			$data['totalartikel']			= $this->Beranda_model->totalartikel();
			$data['totalgaleri']			= $this->Beranda_model->totalgaleri();
			$data['totaldownload']			= $this->Beranda_model->totaldownload();
			$data['lastpost']				= $this->Beranda_model->lastpost();
			$data['topviewblog']			= $this->Beranda_model->topviewblog();
			$data['komentarpending']		= $this->Beranda_model->getKomentarPending();
			$data['komentarapprove']		= $this->Beranda_model->getKomentarApprove();
			$data['komentarrejected']		= $this->Beranda_model->getKomentarRejected();
			
			//STATISTIK
			$site_statics_today 			= $this->Beranda_model->get_site_data_for_today();
			$site_statics_last_week 		= $this->Beranda_model->get_site_data_for_last_week();
			$pengunjungonline        		= $this->Beranda_model->pengunjungonline();
			$data['visitor_online'] 		= isset($pengunjungonline['pengunjungonline']) ? $pengunjungonline['pengunjungonline'] : 0;
			$data['visits_today'] 			= isset($site_statics_today['visits']) ? $site_statics_today['visits'] : 0;
			$data['visits_last_week'] 		= isset($site_statics_last_week['visits']) ? $site_statics_last_week['visits'] : 0;
			$data['chart_data_today'] 		= $this->Beranda_model->get_chart_data_for_today();
			
			$data['css']					= $this->load->view('css',$data,true);
			$data['js']						= $this->load->view('js',$data,true);
			$data['script']					= $this->load->view('script',$data,true);
			
			$data['content']				= $this->load->view('list',$data,true);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	function get_chart_data() {
	    date_default_timezone_set('Asia/Jakarta');
        if (isset($_POST)) {
            if (isset($_POST['month']) && strlen($_POST['month']) && isset($_POST['year']) && strlen($_POST['year'])) {
                $month = $_POST['month'];
                $year = $_POST['year'];
                $data = $this->Beranda_model->get_chart_data_for_month_year($month, $year);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    $timestamp = mktime(0, 0, 0, $month);
                    $label = date("F", $timestamp);
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $label . '-' . $year . '"</div>';
                }
            } else if (isset($_POST['month']) && strlen($_POST['month'])) {
                $month = $_POST['month'];
                $data = $this->Beranda_model->get_chart_data_for_month_year($month);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    $timestamp = mktime(0, 0, 0, $month);
                    $label = date("F", $timestamp);
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $label . '"</div>';
                }
            } else if (isset($_POST['year']) && strlen($_POST['year'])) {
                $year = $_POST['year'];
                $data = $this->Beranda_model->get_chart_data_for_month_year(0, $year);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $year . '"</div>';
                }
            } else {
                $data = $this->Beranda_model->get_chart_data_for_month_year();
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found!</div>';
                }
            }
        }
    }
}