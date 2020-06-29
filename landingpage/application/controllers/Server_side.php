<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Server_side extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
		
		if (!$this->session->userdata('level')==01) {
			$this->session->set_flashdata('pesan','Maaf Anda Bukan Administrator');
			redirect(site_url('administrator'));
			
		}
	}

	public function get_user()
	{
		$total=$this->db->count_all_results("admin");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("username",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('username','DESC');
		$query=$this->User_model->get_all_user();

		if($search!=""){
		$this->db->like("username",$search);
		$jum=$this->db->get('admin');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $user) {
			if(!empty($user['foto'])){
				$gambar = "<a href=".base_url('files/media/'.$user['foto'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$user['foto'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('files/images/blank.png')." class='fancy-view'>
						  <img src=".base_url('files/images/blank.png')." class='img-responsive' alt='' border='0'>";
			}
			$output['data'][]=
					array(
						$no,
						$user['username'],
						$user['email'],
						$user['nama_lengkap'],
						$user['telepon'],
						$user['level'],
						$user['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-success">Aktif</span>',
						$gambar,
						"<a href=".site_url('administrator/user/edit/'.$user['username'])." class='btn btn-xs btn-primary btn-editable'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('administrator/user/hapus/'.$user['username'])." class='btn btn-xs btn-danger btn-editable'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_level(){
		$total=$this->db->count_all_results("level");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("level",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id_level','DESC');
		$query=$this->Level_model->get_all_level();

		if($search!=""){
		$this->db->like("level",$search);
		$jum=$this->db->get('level');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $level) {
			if($level['id_level']=='1'){
				$group = "<a href=".site_url('administrator/level/edit/'.$level['id_level'])." class='btn btn-xs btn-primary btn-editable'><i class='fa fa-pencil'></i> </a>";
			}else{
				$group = "<a href=".site_url('administrator/level/edit/'.$level['id_level'])." class='btn btn-xs btn-primary btn-editable'><i class='fa fa-pencil'></i> </a>
						 <a href=".site_url('administrator/level/hapus/'.$level['id_level'])." class='btn btn-xs btn-danger btn-editable'><i class='fa fa-trash'></i> </a>";
			
			}
			$output['data'][]=
					array(
						$no,
						$level['id_level'],
						$level['level'],
						$group,
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_gallery()
	{
		$total=$this->db->count_all_results("gallery");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("judul",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Landingpage_model->get_all_gallery();

		if($search!=""){
		$this->db->like("judul",$search);
		$jum=$this->db->get('gallery');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $gal) {
			if(!empty($gal['gambar'])){
				$gambar = "<a href=".base_url('files/gallery/'.$gal['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/gallery/'.$gal['gambar'].'')." alt='' border='0' class='img-responsive' style='width:300px;height:200px;'>";
			}else{
				$gambar = "<a href=".base_url('files/images/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('files/images/no-image.jpg')." class='img-responsive' alt='' border='0' style='width:300px;height:200px;'>";
			}
			
			$output['data'][]=
					array(
						$no,
						$gal['judul'],
						$gambar,
						"<a href=".site_url('administrator/landingpage-gallery/edit/'.$gal['id'])." class='btn btn-xs btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('administrator/landingpage-gallery/hapus/'.$gal['id'])." class='btn btn-xs btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_testimoni()
	{
		$total=$this->db->count_all_results("testimoni");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("namaclient",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Landingpage_model->get_all_testimoni();

		if($search!=""){
		$this->db->like("judul",$search);
		$jum=$this->db->get('testimoni');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $test) {
			$output['data'][]=
					array(
						$no,
						$test['namaclient'],
						$test['emailclient'],
						$test['testimoni'],	
						"<a href=".site_url('administrator/landingpage-testimoni/edit/'.$test['id'])." class='btn btn-xs btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('administrator/landingpage-testimoni/hapus/'.$test['id'])." class='btn btn-xs btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}

	public function get_inboxall()
	{
		$total=$this->db->count_all_results("kontak");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->db->query("SELECT * FROM kontak")->result_array();

		if($search!=""){
		$this->db->like("nama",$search);
		$jum=$this->db->get('kontak');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $inbox) {
			//$date=date('d, H:i:s',strtotime($inbox['date']));
			if($inbox['dibaca']=='0'){
				$dibaca="unread";
			}else{
				$dibaca="read";
			}
			if($inbox['favorit']=='1'){
				$favorit="<i class='fa fa-star inbox-started'></i>";
			}else{
				$favorit="<i class='fa fa-star'></i>";
			}
			
			$output['data'][]=
					array(
						"<tr class='".$dibaca."' data-messageid='".$no."'>
							<td class='inbox-small-cells'>
								<input type='checkbox' class='mail-checkbox'>
						</td>
						<td class='inbox-small-cells'>
								".$favorit."
							</td>
					 	<td class='view-message'>
								".$inbox['nama']."
							</td>
					 	<td class='view-message'>
								 ".$inbox['pesan']."
							</td>
						<td class='view-message inbox-small-cells'>
								<i class='fa fa-paperclip'></i>
							</td>
					 	<td class='view-message text-right'>
								".$inbox['tanggal']."
						</td>"
						
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
}