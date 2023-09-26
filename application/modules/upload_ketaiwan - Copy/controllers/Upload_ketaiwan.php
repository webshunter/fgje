<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_ketaiwan extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_ketaiwan');			
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_ketaiwan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_ketaiwan'] = $this->M_upload_ketaiwan->tampil_data_ketaiwan($detailidnya);
				$data['namamodule'] = "upload_ketaiwan";
				$data['namafileview'] = "ketaiwanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_ketaiwan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_ketaiwan'] = $this->M_upload_ketaiwan->tampil_data_ketaiwan($detailidnya);
				$data['namamodule'] = "upload_ketaiwan";
				$data['namafileview'] = "ketaiwanadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_ketaiwan(){
		
		$this->M_upload_ketaiwan->simpan_data_ketaiwan();

		redirect('upload_ketaiwan');
	}

	function update_data_ketaiwan() {
			$this->M_upload_ketaiwan->update_data_ketaiwan();
			redirect('upload_ketaiwan');
	}

	function hapus_data_ketaiwan() {
		$this->M_upload_ketaiwan->hapus_data_ketaiwan();
		redirect('upload_ketaiwan');
	}
}