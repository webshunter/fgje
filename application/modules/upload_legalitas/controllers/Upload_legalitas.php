<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_legalitas extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_legalitas');			
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
				$data['tampil_data_personal'] = $this->M_upload_legalitas->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_legalitas'] = $this->M_upload_legalitas->tampil_data_legalitas($detailidnya);
				$data['hitungan'] = $this->M_upload_legalitas->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_legalitas->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_legalitas";
				$data['namafileview'] = "legalitasadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_legalitas->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_legalitas'] = $this->M_upload_legalitas->tampil_data_legalitas($detailidnya);
				$data['namamodule'] = "upload_legalitas";
				$data['namafileview'] = "legalitasadmin";
				echo Modules::run('template/legalitas_template', $data);
			}
		}	 
	}

	function simpan_data_legalitas(){
		
		$this->M_upload_legalitas->simpan_data_legalitas();

		redirect('upload_legalitas');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_legalitas";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_legalitas->simpan_foto_legalitas($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_legalitas->hapus_foto_legalitas();
	}


	function update_data_legalitas() {
			$this->M_upload_legalitas->update_data_legalitas();
			redirect('upload_legalitas');
	}

	function hapus_data_legalitas() {
		$this->M_upload_legalitas->hapus_data_legalitas();
		redirect('upload_legalitas');
	}
}