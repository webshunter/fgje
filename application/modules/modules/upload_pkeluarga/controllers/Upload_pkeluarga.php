<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Upload_pkeluarga extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_pkeluarga');			
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
				$data['tampil_data_personal'] = $this->M_upload_pkeluarga->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pkeluarga'] = $this->M_upload_pkeluarga->tampil_data_pkeluarga();
				$data['namamodule'] = "upload_pkeluarga";
				$data['namafileview'] = "pkeluargaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['tampil_data_personal'] = $this->M_upload_pkeluarga->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pkeluarga'] = $this->M_upload_pkeluarga->tampil_data_pkeluarga();
				$data['namamodule'] = "upload_pkeluarga";
				$data['namafileview'] = "pkeluargaadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_pkeluarga(){
		
		$this->M_upload_pkeluarga->simpan_data_pkeluarga();

		redirect('upload_pkeluarga');
	}

	function update_data_pkeluarga() {
			$this->M_upload_pkeluarga->update_data_pkeluarga();
			redirect('upload_pkeluarga');
	}

	function hapus_data_pkeluarga() {
		$this->M_upload_pkeluarga->hapus_data_pkeluarga();
		redirect('upload_pkeluarga');
	}
}