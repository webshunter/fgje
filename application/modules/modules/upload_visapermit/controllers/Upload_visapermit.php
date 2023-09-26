<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Upload_visapermit extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_visapermit');			
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
			//user sudah login
				$data['tampil_data_personal'] = $this->M_upload_visapermit->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_visapermit'] = $this->M_upload_visapermit->tampil_data_visapermit();
				$data['namamodule'] = "upload_visapermit";
				$data['namafileview'] = "visapermitadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['tampil_data_personal'] = $this->M_upload_visapermit->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_visapermit'] = $this->M_upload_visapermit->tampil_data_visapermit();
				$data['namamodule'] = "upload_visapermit";
				$data['namafileview'] = "visapermitadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_visapermit(){
		
		$this->M_upload_visapermit->simpan_data_visapermit();

		redirect('upload_visapermit');
	}

	function update_data_visapermit() {
			$this->M_upload_visapermit->update_data_visapermit();
			redirect('upload_visapermit');
	}

	function hapus_data_visapermit() {
		$this->M_upload_visapermit->hapus_data_visapermit();
		redirect('upload_visapermit');
	}
}